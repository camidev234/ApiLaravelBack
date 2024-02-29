<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    public function occupation() :BelongsTo {
        return $this->belongsTo(Occupation::class);
    }

    public function requisitions() :HasMany {
        return $this->hasMany(Requisition::class);
    }
}
