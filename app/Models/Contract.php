<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
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
            get: fn() => $this->hospital->name .
                " | " .
                $this->hospital->city .
                ", " .
                $this->hospital->state .
                " | " .
                $this->payer->name .
                " | " .
                $this->contractCategory->category
        );
    }

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    public function payer(): BelongsTo
    {
        return $this->belongsTo(Payer::class);
    }

    public function contractCategory(): BelongsTo
    {
        return $this->belongsTo(ContractCategory::class);
    }
}
