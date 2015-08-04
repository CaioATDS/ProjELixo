<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Input;
use Redirect;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;
use Validator;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use SyncableGraphNodeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'lastname', 'email', 'password', 'user_roles', 'enable', ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected static $graph_node_field_aliases = [
        'id' => 'facebook_user_id',
    ];

    static function hasemail($email)
    {
        $user = (bool) self::where('email', $email)->first();
        return $user;
    }
    // validar campos do formulario
    static function validar($edit = null)
    {
        $required = is_null($edit) ? 'required|min:5' : 'min:5';

        $validar = Validator::make(Input::all(), [
            'name'                  => 'required|alpha',
            'email'                 => 'required|email',
            'password'              => $required,
            'password_confirmation' => $required,
        ]);

        return $validar;

    }

    //validar campos trocar senha
    static function validarsenha()
    {

        $validar = Validator::make(Input::all(),[
            'password'              => 'required|min:5',
            'password_confirmation' => 'required|min:5',
        ]);

        return $validar;

    }
}
