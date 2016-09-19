<?php

namespace Republicas\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Republicas\Contracts\Repositories\BillRepository;
use Republicas\Models\Bill;
use Republicas\Validators\BillValidator;

/**
 * Class BillRepositoryEloquent
 * @package namespace Republicas\Repositories\Eloquent;
 */
class BillRepositoryEloquent extends BaseRepository implements BillRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bill::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getByRepublicOrderedBy($republicId, $field = null)
    {
        is_null($field) ? $field = 'id' : $field = $field;

        return $this->model->where('republic_id', $republicId)->orderBy($field);
    }
}
