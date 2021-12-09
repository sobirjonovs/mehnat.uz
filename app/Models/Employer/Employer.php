<?php

namespace App\Models\Employer;

use App\Models\Organization\Organization;
use Database\Factories\EmployerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $organization_id
 * @property mixed $id
 */
class Employer extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'passport_serial_number',
        'surname',
        'firstname',
        'patronymic',
        'position',
        'phone',
        'address',
    ];

    /**
     * @return BelongsTo
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * @return EmployerFactory
     */
    protected static function newFactory(): EmployerFactory
    {
        return EmployerFactory::new();
    }
}
