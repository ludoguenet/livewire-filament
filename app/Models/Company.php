<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'uuid',
        'name',
    ];

    public function experiences(): HasMany
    {
        return $this->hasMany(
            related: Experience::class,
            foreignKey: 'company_id'
        );
    }
}
