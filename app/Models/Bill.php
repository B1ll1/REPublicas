<?php

namespace Republicas\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Bill extends Model implements Transformable
{
    use TransformableTrait;

    protected $tables = 'bills';

    protected $fillable = [
    	'republic_id',
    	'user_id',
    	'billtype_id',
		'name',
		'value',
		'is_paid',
		'due_date'
	];

	protected $dates = ['created_at', 'updated_at', 'due_date'];

	protected $casts = [
		'is_paid' => 'boolean',
	];

	/**
	 * Relationships
	 */
	public function republic()
	{
		return $this->belongsTo(Republic::class);
	}

	public function responsible()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function billtype()
	{
		return $this->belongsTo(BillType::class, 'billtype_id');
	}

	/**
	 * Accessors
	 */
	public function getValueAttribute($value)
	{
		return number_format($value, 2, ',', '.');
	}
}
