<?php

namespace App\Models;

use App\Models\Organization\Organization;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static role($role)
 * @method static create(array $array)
 * @method static updateOrCreate(string[] $array, string[] $array1)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
    ];

    /**
     * @param Builder $query
     * @param $role
     * @return Builder
     */
    public static function scopeRole(Builder $query, $role): Builder
    {
        return $query->where('role', $role);
    }

    /**
     * @return HasOne
     */
    public function organization(): HasOne
    {
        return $this->hasOne(Organization::class);
    }
}
