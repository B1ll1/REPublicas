<?php

namespace Republicas\Models;

use Illuminate\Auth\Authenticatable;
use Republicas\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'telephone',
        'password',
        'photo',
        'room_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /*
     * Relationships
     */
    public function republic()
    {
        return $this->hasOne(Republic::class);
    }

    public function republics()
    {
        return $this->belongsToMany(Republic::class, 'republic_users');
    }

    public function notices()
    {
        return $this->hasMany(Notice::class);
    }

    public function room()
    {
        return $this->belongsToOne( Room::class );
    }
    /**
     * Sets the default photo.
     */
    public function setDefaultPhoto()
    {
        $this->photo = 'users/avatar.png';
    }
}