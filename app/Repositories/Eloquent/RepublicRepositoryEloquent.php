<?php

namespace Republicas\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Republicas\Contracts\Repositories\RepublicRepository;
use Republicas\Models\Republic;
use Republicas\Validators\RepublicValidator;

/**
 * Class RepublicRepositoryEloquent
 * @package namespace Republicas\Repositories\Eloquent;
 */
class RepublicRepositoryEloquent extends BaseRepository implements RepublicRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Republic::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
