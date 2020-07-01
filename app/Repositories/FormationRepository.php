<?php

namespace App\Repositories;

use App\Models\Formation;
use App\Repositories\BaseRepository;

/**
 * Class FormationRepository
 * @package App\Repositories
 * @version July 1, 2020, 2:03 pm UTC
*/

class FormationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'etat_civil_id',
        'start',
        'end',
        'lieu',
        'diplome',
        'school'
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
        return Formation::class;
    }
}
