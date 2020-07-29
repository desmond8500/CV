<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Exptask
 * @package App\Models
 * @version July 1, 2020, 5:44 pm UTC
 *
 * @property string $exp_id
 * @property string $name
 */
class Exptask extends Model
{
    use SoftDeletes;

    public $table = 'exptasks';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'exp_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'exp_id' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
