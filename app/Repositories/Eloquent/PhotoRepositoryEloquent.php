<?php

namespace Republicas\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Republicas\Contracts\Repositories\PhotosRepository;
use Republicas\Models\Photo;
use Republicas\Validators\PhotosValidator;

/**
 * Class PhotosRepositoryEloquent
 * @package namespace Republicas\Repositories\Eloquent;
 */
class PhotoRepositoryEloquent extends BaseRepository implements PhotosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Photo::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
