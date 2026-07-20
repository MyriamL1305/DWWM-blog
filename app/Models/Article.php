<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $table = 'articles';
    /**
     * Colonnes autorisées au remplissage massif (create()/update()).
     * On y met tout ce que le formulaire (et le contrôleur) peut renseigner.
     */
    protected $fillable = ['title', 'slug', 'content', 'status', 'published_at', 'category_id', 'user_id',];

    //reconversion correcte de la date de publication
    protected $casts = [
        'published_at' => 'datetime',
    ];
    // relation entre article et category(1,1)
    public function category() :BelongsTo {
        return $this->belongsTo(Category::class);
    }

    // relation entre article et utilisateur (1,1)
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    // relation tags et commentaires
    // public function tags(): BelongsToMany
    // {
    //     return $this->belongsToMany(Tag::class, 'articles_tags');
    // }
    //
    // public function comments(): HasMany
    // {
    //     return $this->hasMany(Comment::class);
    // }
}
