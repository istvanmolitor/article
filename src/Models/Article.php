<?php

namespace Molitor\Article\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $fillable = [
        'title',
        'lead',
        'image',
        'slug',
        'content',
        'author_id',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function articleGroups(): BelongsToMany
    {
        return $this->belongsToMany(ArticleGroup::class, 'article_article_group');
    }
}
