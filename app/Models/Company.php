<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Builder
 * @method static Builder where(string $column, mixed $operator = null, mixed $value = null)
 * @method static User|null first()
 * @method static Collection get()
 */

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vuejobs(): HasMany
    {
        return $this->hasMany(Vuejob::class);
    }
}
