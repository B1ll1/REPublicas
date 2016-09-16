<?php

namespace Republicas\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Room extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'republic_id',
        'num_beds',
        'type',
        'price',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function republic()
    {
        return $this->belongsTo(Republic::class);
    }

}
