<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'invitation_code',
        'avatar',
        'Coins'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims():array
    {
        return [];
    }

    //relationships
    public function invitedUsers()
    {
        return $this->hasMany(InviterUser::class, 'inviter_id');
    }

    public function invitingUsers()
    {
        return $this->hasMany(InviterUser::class, 'user_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'user_id');
    }

    public function sentOrders()
    {
        return $this->hasMany(Orders::class, 'customer_id');
    }

    public function receivedOrders()
    {
        return $this->hasMany(Orders::class, 'owner_id');
    }

}
