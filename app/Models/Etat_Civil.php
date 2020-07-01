<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Etat_Civil
 * @package App\Models
 * @version July 1, 2020, 2:32 pm UTC
 *
 * @property string $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $function
 * @property string $address
 * @property string $email
 * @property string $tel
 * @property string $linkedin
 * @property string $description
 * @property string $birthday
 */
class Etat_Civil extends Model
{
    use SoftDeletes;

    public $table = 'etat__civils';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'function',
        'address',
        'email',
        'tel',
        'linkedin',
        'description',
        'birthday'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'string',
        'firstname' => 'string',
        'lastname' => 'string',
        'function' => 'string',
        'address' => 'string',
        'email' => 'string',
        'tel' => 'string',
        'linkedin' => 'string',
        'description' => 'string',
        'birthday' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
