<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Puppy extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function likedBy():BelongsToMany
    {
        return $this->BelongsToMany(User::class);
    }
}
