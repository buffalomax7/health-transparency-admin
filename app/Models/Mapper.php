<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Mapper extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the parent mapperable model (i.e. CPT, DRG, PAYER, etc)
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function mapperable(): MorphTo
    {
        return $this->morphTo();
    }
}
