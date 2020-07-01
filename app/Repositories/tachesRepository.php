<?php

namespace App\Repositories;

use App\Models\taches;
use App\Repositories\BaseRepository;

/**
 * Class tachesRepository
 * @package App\Repositories
 * @version July 1, 2020, 1:23 pm UTC
*/

class tachesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return taches::class;
    }
}
