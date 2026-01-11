<?php

namespace Molitor\Article\Repositories;

use Illuminate\Support\Collection;
use Molitor\Article\Models\Article;

interface ArticleRepositoryInterface
{
    /** @return Collection<int,Article> */
    public function all(): Collection;

    public function getById(int $id): ?Article;

    public function getBySlug(string $slug): ?Article;

    public function create(array $data): Article;

    public function update(Article $article, array $data): bool;

    public function delete(Article $article): bool;
}
