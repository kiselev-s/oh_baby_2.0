<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evolution extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'age_month',
        'growth',
        'weight',
        'children_id',
    ];

    public function children(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Child::class);
    }
}
