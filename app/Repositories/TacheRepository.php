<?php

namespace App\Repositories;

use App\Models\Tache;
use App\Repositories\BaseRepository;

/**
 * Class TacheRepository
 * @package App\Repositories
 * @version July 1, 2020, 2:00 pm UTC
*/

class TacheRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'skill_id',
        'name'
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
        return Tache::class;
    }
}
