<?php

namespace App\Repositories;

use App\Models\Interet;
use App\Repositories\BaseRepository;

/**
 * Class InteretRepository
 * @package App\Repositories
 * @version July 1, 2020, 1:59 pm UTC
*/

class InteretRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'etat_civil_id'
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
        return Interet::class;
    }
}
