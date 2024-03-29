<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'category',
        'path',
        'documents_id',
    ];

    public function children(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Documents::class);
    }
}
