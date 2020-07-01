<?php

namespace App\Repositories;

use App\Models\Competence;
use App\Repositories\BaseRepository;

/**
 * Class CompetenceRepository
 * @package App\Repositories
 * @version July 1, 2020, 2:05 pm UTC
*/

class CompetenceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'etat_civil_id',
        'name',
        'level'
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
        return Competence::class;
    }
}
