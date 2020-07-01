<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tache
 * @package App\Models
 * @version July 1, 2020, 2:00 pm UTC
 *
 * @property string $skill_id
 * @property string $name
 */
class Tache extends Model
{
    use SoftDeletes;

    public $table = 'taches';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'skill_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'skill_id' => 'string',
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
