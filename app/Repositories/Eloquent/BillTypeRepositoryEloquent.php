<?php

namespace Republicas\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Republicas\Contracts\Repositories\BillTypeRepository;
use Republicas\Models\BillType;
use Republicas\Validators\BillTypeValidator;

/**
 * Class BillTypeRepositoryEloquent
 * @package namespace Republicas\Repositories\Eloquent;
 */
class BillTypeRepositoryEloquent extends BaseRepository implements BillTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BillType::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getGeneralTypes()
    {
        return $this->model->whereIn('id', [1, 2, 3, 4, 5]);
    }
}
