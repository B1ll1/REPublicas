<?php

namespace Republicas\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Republic extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'user_id',
        'name',
        'telephone',
        'simple_rooms',
        'suite_rooms',
        'vacancy',
        'street',
        'neighbourhood',
        'city',
        'state'
    ];

    /*
     * RELATIONS
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'republic_users');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function billtypes()
    {
        return $this->hasMany(BillType::class);
    }

    /*
     * METHODS
     */
    public function getNumberOfRooms()
    {
        return $this->simple_rooms + $this->suite_rooms;
    }

    public function getNumberOfMembers()
    {
        if($this->users->isEmpty())
            return 0;
        else
            return count($this->users);
    }

    public function getRentValue()
    {
        $rent = 0.00;

        foreach ($this->rooms as $key => $room) {
            $rent += $room->price;
        }

        return $rent;
    }

    public function getMonthlyCosts()
    {
        $total = 0.00;

        $total += $this->getRentValue();

        return $total;
    }

    public function getMonthlyCostsPerMember()
    {
        return $this->getMonthlyCosts() / $this->getNumberOfMembers();
    }

    public function getCurrentMonth()
    {
        $date = Carbon::now()->month;

        switch($date)
        {
            case 1:
                return 'Janeiro';
            case 2:
                return 'Fevereiro';
            case 3:
                return 'Março';
            case 4:
                return 'Abril';
            case 5:
                return 'Maio';
            case 6:
                return 'Junho';
            case 7:
                return 'Julho';
            case 8:
                return 'Agosto';
            case 9:
                return 'Setembro';
            case 10:
                return 'Outubro';
            case 11:
                return 'Novembro';
            case 12:
                return 'Dezembro';
        }
    }
}
