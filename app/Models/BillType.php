<?php

namespace Republicas\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class BillType extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'billtypes';

    protected $fillable = [
        'republic_id',
        'name',
        'description',
    ];

    /*
     * RELATIONS
     */
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function republic()
    {
        return $this->belongsTo(Republic::class);
    }

    /*
     * METHODS
     */

    /**
     * Get the billtype icon.
     * @return string
     */
    public function getIcon()
    {
        $type = $this->id;

        switch ($type) {
            case 1:
                return 'bolt';
                break;
            case 2:
                return 'tint';
                break;
            case 3:
                return 'feed';
                break;
            case 4:
                return 'user';
                break;
            case 5:
                return 'shopping-cart';
                break;
            default:
                return 'money';
                break;
        }
    }

    /**
     * Get the billtype color.
     * @return string
     */
    public function getColor()
    {
        $type = $this->id;

        switch ($type) {
            case 1:
                return 'yellow';
                break;
            case 2:
                return 'blue';
                break;
            case 3:
                return 'green';
                break;
            case 4:
                return 'red';
                break;
            case 5:
                return 'orange';
                break;
            default:
                return 'default';
                break;
        }
    }
}
