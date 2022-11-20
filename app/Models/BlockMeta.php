<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlockMeta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $hidden = ['id'];

    public function block(): BelongsTo
    {
        return $this->belongsTo(Block::class);
    }
}
