<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Competence
 * @package App\Models
 * @version July 1, 2020, 2:05 pm UTC
 *
 * @property string $etat_civil_id
 * @property string $name
 * @property string $level
 */
class Competence extends Model
{
    use SoftDeletes;

    public $table = 'competences';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'etat_civil_id',
        'name',
        'level'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'etat_civil_id' => 'string',
        'name' => 'string',
        'level' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
