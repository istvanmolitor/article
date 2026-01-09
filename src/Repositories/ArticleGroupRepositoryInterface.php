<?php

namespace Molitor\Article\Repositories;

use Illuminate\Support\Collection;
use Molitor\Article\Models\ArticleGroup;

interface ArticleGroupRepositoryInterface
{
    /** @return Collection<int,ArticleGroup> */
    public function all(): Collection;

    public function getById(int $id): ?ArticleGroup;

    public function create(array $data): ArticleGroup;

    public function update(ArticleGroup $articleGroup, array $data): bool;

    public function delete(ArticleGroup $articleGroup): bool;
}
