<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Interet
 * @package App\Models
 * @version July 1, 2020, 1:59 pm UTC
 *
 * @property string $name
 * @property string $etat_civil_id
 */
class Interet extends Model
{
    use SoftDeletes;

    public $table = 'interets';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'etat_civil_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'etat_civil_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
