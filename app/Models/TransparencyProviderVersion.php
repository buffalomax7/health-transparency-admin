<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransparencyProviderVersion extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the label
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function label(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->transparencyProvider->label . ' | Version: ' . $this->version
        );
    }

    public function transparencyProvider(): BelongsTo
    {
        return $this->belongsTo(TransparencyProvider::class);
    }

    public function hospitals(): HasMany
    {
        return $this->hasMany(Hospital::class);
    }
}
