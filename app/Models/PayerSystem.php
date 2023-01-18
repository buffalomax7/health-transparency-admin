<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PayerSystem extends Model
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
            get: fn() => $this->short_name . " | " . $this->name
        );
    }

    public function payers(): HasMany
    {
        return $this->hasMany(Payer::class);
    }
}
