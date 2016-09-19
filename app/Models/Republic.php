<?php

namespace Republicas\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Republicas\Models\BillType;

class Republic extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
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
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function billtypes()
    {
        return $this->hasMany(BillType::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
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
            return 1;
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

        foreach ($this->bills as $key => $bill) {
            // Se o mês da data de vencimento for igual mês atual, adiciona ao total
            $bill->due_date->format('m/Y') == Carbon::now()->format('m/Y') ? $total += $bill->value : $total += 0;
        }

        // Soma o aluguel
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

    public function getArrayBillsGroupedByTypeAndMonth()
    {
        $array = [];
        $arrayData = [];
        $billtypes = BillType::where('republic_id', $this->id)->orWhere('republic_id', null)->get();

        foreach ($billtypes as $key => $billtype) {
            array_push($array, [
                'name' => $billtype->name,
                'data' => $billtype->getAllBills($this->id)
            ]);
        }

        return $array;
    }

    public function getArrayBillDates()
    {
        $dates = [];

        foreach ($this->bills->sortBy('due_date') as $key => $bill) {
            array_push($dates, $bill->due_date->format('M/Y'));
        }

        return array_values(array_unique($dates));
    }
}
