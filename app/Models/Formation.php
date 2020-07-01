<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Formation
 * @package App\Models
 * @version July 1, 2020, 2:03 pm UTC
 *
 * @property string $etat_civil_id
 * @property string $start
 * @property string $end
 * @property string $lieu
 * @property string $diplome
 * @property string $school
 */
class Formation extends Model
{
    use SoftDeletes;

    public $table = 'formations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'etat_civil_id',
        'start',
        'end',
        'lieu',
        'diplome',
        'school'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'etat_civil_id' => 'string',
        'start' => 'string',
        'end' => 'string',
        'lieu' => 'string',
        'diplome' => 'string',
        'school' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
