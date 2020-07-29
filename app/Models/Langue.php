<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Langue
 * @package App\Models
 * @version July 1, 2020, 3:41 pm UTC
 *
 * @property string $name
 * @property string $level
 * @property string $etat_civil_id
 */
class Langue extends Model
{
    use SoftDeletes;

    public $table = 'langues';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'level',
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
        'level' => 'string',
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
