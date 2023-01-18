<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hospital extends Model
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
            get: fn() => $this->name . " | " . $this->city . ", " . $this->state
        );
    }

    public function hospitalSystem(): BelongsTo
    {
        return $this->belongsTo(HospitalSystem::class);
    }

    public function transparencyProviderVersion(): BelongsTo
    {
        return $this->belongsTo(TransparencyProviderVersion::class);
    }
}
