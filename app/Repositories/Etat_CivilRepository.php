<?php

namespace App\Repositories;

use App\Models\Etat_Civil;
use App\Repositories\BaseRepository;

/**
 * Class Etat_CivilRepository
 * @package App\Repositories
 * @version July 1, 2020, 2:32 pm UTC
*/

class Etat_CivilRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Etat_Civil::class;
    }
}
