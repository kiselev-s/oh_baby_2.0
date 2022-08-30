<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evolution extends Model
{
    use HasFactory;

    public function children(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Child::class);
    }
}
