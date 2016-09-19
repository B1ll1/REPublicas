<?php
namespace Republicas\Repositories\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Republicas\Models\Republic;

class ByRepublic implements CriteriaInterface {

    protected $republic;

    /**
     * ByRepublic constructor.
     * @param republic $republic
     */
    public function __construct(Republic $republic)
    {
        $this->republic = $republic;
    }

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if(!isset($this->republic)){
            return $model;
        }
        $model = $model->where('republic_id', '=', $this->republic->id);

        return $model;
    }
}
