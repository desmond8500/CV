<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Skills
 * @package App\Models
 * @version July 1, 2020, 1:54 pm UTC
 *
 * @property string $etat_civil_id
 * @property string $start
 * @property string $end
 * @property string $lieu
 * @property string $function
 */
class Skills extends Model
{
    use SoftDeletes;

    public $table = 'skills';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'etat_civil_id',
        'start',
        'end',
        'lieu',
        'function'
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
        'function' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
