<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $table = 'articles';

    //relation entre article et category(1,1)
    public function category() :BelongsTo {
        return $this->belongsTo(Category::class);
    }

    //relation entre article et utilisateur (1,1)
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}