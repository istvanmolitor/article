<?php

namespace Molitor\Article\Repositories;

use Illuminate\Support\Collection;
use Molitor\Article\Models\Article;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function all(): Collection
    {
        return Article::all();
    }

    public function getById(int $id): ?Article
    {
        return Article::find($id);
    }

    public function create(array $data): Article
    {
        return Article::create($data);
    }

    public function update(Article $article, array $data): bool
    {
        return $article->update($data);
    }

    public function delete(Article $article): bool
    {
        return $article->delete();
    }
}
