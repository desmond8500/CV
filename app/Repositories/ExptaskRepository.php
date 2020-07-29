<?php

namespace App\Repositories;

use App\Models\Exptask;
use App\Repositories\BaseRepository;

/**
 * Class ExptaskRepository
 * @package App\Repositories
 * @version July 1, 2020, 5:44 pm UTC
*/

class ExptaskRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'exp_id',
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
        return Exptask::class;
    }
}
