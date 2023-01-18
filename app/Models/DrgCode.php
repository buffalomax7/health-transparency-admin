<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class DrgCode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mappers(): MorphMany
    {
        return $this->morphMany(Mapper::class, "mapperable");
    }
}
