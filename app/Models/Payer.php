<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Payer extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the label
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function label(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->payerSystem->short_name . " | " . $this->name
        );
    }

    public function payerSystem(): BelongsTo
    {
        return $this->belongsTo(PayerSystem::class);
    }

    public function mappers(): MorphMany
    {
        return $this->morphMany(Mapper::class, "mapperable");
    }
}
