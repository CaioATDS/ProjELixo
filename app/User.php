<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Input;
use Redirect;
use Validator;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

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
    protected $fillable = [ 'name', 'lastname', 'email', 'password', 'user_roles', ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    static function hasemail($email)
    {
        $user = self::where('email', $email)->first();
        return $user ? true : false;
    }
    // validar campos do formulario
    static function validar()
    {

        $validar = Validator::make(Input::all(), [
            'name'                  => 'required|alpha',
            'email'                 => 'required|email',
            'password'              => 'required|min:5',
            'password_confirmation' => 'required|min:5',
        ]);

        return $validar;

    }

    //validar campos trocar senha
    static function validarsenha()
    {

        $validar = Validator::make(Input::all(),[
            'password'              => 'required|min5',
            'password_confirmation' => 'required|min:5',
        ]);

        return $validar;

    }
}
