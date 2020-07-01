<?php

namespace App\Repositories;

use App\Models\Skills;
use App\Repositories\BaseRepository;

/**
 * Class SkillsRepository
 * @package App\Repositories
 * @version July 1, 2020, 1:54 pm UTC
*/

class SkillsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'etat_civil_id',
        'start',
        'end',
        'lieu',
        'function'
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
        return Skills::class;
    }
}
