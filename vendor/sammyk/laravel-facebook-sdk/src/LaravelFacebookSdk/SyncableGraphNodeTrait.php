<?php namespace SammyK\LaravelFacebookSdk;

use App\Http\Controllers\Services\EmailController;
use App\Providers\ConstantesProvider;
use App\User;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Facebook\GraphNodes\GraphObject;
use Facebook\GraphNodes\GraphNode;

trait SyncableGraphNodeTrait
{
    /*
     * List of Facebook field names and their corresponding
     * column names as they exist in the local database.
     *
     * protected static $graph_node_field_aliases = [];
     */

    /**
     * Inserts or updates the Graph node to the local database
     *
     * @param array|GraphObject|GraphNode $data
     *
     * @return Model
     *
     * @throws \InvalidArgumentException
     */
    public static function createOrUpdateGraphNode($data)
    {
        // @todo this will be GraphNode soon
        if ($data instanceof GraphObject || $data instanceof GraphNode) {
            $array = $data->asArray();
            $data  = [ // rename o array, vindo do facebook, para coincidir com o banco de dados local.
                'id'                    => $array['id'],
                'name'                  => $array['first_name'],
                'lastname'              => $array['last_name'],
                'email'                 => $array['email'],
                'picture'               => $array['picture'],
                'gender'                => $array['gender'],
                'facebook_profile_link' => $array['link'],
            ];
        }

        if (! isset($data['id'])) {
            throw new \InvalidArgumentException('Graph node id is missing');
        }

        // se o perfil já existe mas não possui um facebook associado, atualize
        $profile = User::where('email', $data['email'])->whereNull('facebook_user_id')->first();
        if($profile)
        {

            $graph_node          = $profile;
            $graph_node->picture = $data['picture']['url'];
            $graph_node->fill($data);
            $graph_node->save();

        }
        else // criar novo perfil ou atualize
        {
            $attributes = [static::getGraphNodeKeyName() => $data['id']];

            $graph_node = static::firstOrNewGraphNode($attributes);

            static::mapGraphNodeFieldNamesToDatabaseColumnNames($graph_node, $data);

            $hasKey = (bool) User::where('facebook_user_id', $data['id'])->first(); // check se está sendo feito um update ou um create user.

            $graph_node->picture=$data['picture']['url'];
            $graph_node->save();

            if(!$hasKey) // se um novo perfil foi criado, envie email
                try
                {
                    $email           = new EmailController(); // enviar email
                    $email->assunto  = 'Bem-vindo ao ' .ConstantesProvider::SiteName. '!‏'; // define o titulo
                    $email->mensagem = view('email.bemvindo', [ 'email' => $graph_node->email, 'password'  => 'Você ainda precisa criar sua senha.', ])->render();
                    $email->enviar($graph_node->name, $graph_node->lastname, $graph_node->email, $email->assunto, $email->mensagem);
                }catch (Exception $e) {
                    throw new \InvalidArgumentException('Email não pôde ser enviado' . $e->getMessage());
                }

        }

        return $graph_node;
    }

    /**
     * Like static::firstOrNew() but without mass assignment
     *
     * @param array $attributes
     *
     * @return Model
     */
    public static function firstOrNewGraphNode(array $attributes)
    {
        if (is_null($facebook_object = static::firstOrNew($attributes))) {
            $facebook_object = new static();
        }

        return $facebook_object;
    }

    /**
     * Convert a Graph node field name to a database column name
     *
     * @param string $field
     *
     * @return string
     */
    public static function fieldToColumnName($field)
    {
        $model_name = get_class(new static());
        if (property_exists($model_name, 'graph_node_field_aliases')
            && isset(static::$graph_node_field_aliases[$field])) {
            return static::$graph_node_field_aliases[$field];
        }

        return $field;
    }

    /**
     * Get db column name of primary Graph node key
     *
     * @return string
     */
    public static function getGraphNodeKeyName()
    {
        return static::fieldToColumnName('id');
    }

    /**
     * Map Graph-node field names to local database column name
     *
     * @param Model $object
     * @param array $fields
     */
    public static function mapGraphNodeFieldNamesToDatabaseColumnNames(Model $object, array $fields)
    {
        foreach ($fields as $field => $value) {
            $object->{static::fieldToColumnName($field)} = $value;
        }
    }
}
