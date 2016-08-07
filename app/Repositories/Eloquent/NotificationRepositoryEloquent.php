<?php

namespace Republicas\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Republicas\Contracts\Repositories\NotificationRepository;
use Republicas\Models\Notification;
use Republicas\Validators\NotificationValidator;

/**
 * Class NotificationRepositoryEloquent
 * @package namespace Republicas\Repositories\Eloquent;
 */
class NotificationRepositoryEloquent extends BaseRepository implements NotificationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Notification::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
