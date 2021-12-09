<?php

namespace App\Models\Organization;

use App\Models\Employer\Employer;
use App\Models\User;
use Database\Factories\OrganizationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed $id
 * @method static create(array $validated)
 */
class Organization extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'address',
        'email',
        'website',
        'phone',
    ];

    /**
     * @return HasMany
     */
    public function employers(): HasMany
    {
        return $this->hasMany(Employer::class);
    }

    /**
     * @param $employerId
     * @return mixed
     */
    public function findEmployer($employerId)
    {
        return $this->employers()->whereId($employerId)->firstOrFail();
    }

    /**
     * @return BelongsTo
     */
    public function director(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return OrganizationFactory
     */
    public static function newFactory(): OrganizationFactory
    {
        return OrganizationFactory::new();
    }
}
