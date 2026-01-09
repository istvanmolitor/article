<?php

namespace Molitor\Article\Repositories;

use Illuminate\Support\Collection;
use Molitor\Article\Models\ArticleGroup;

class ArticleGroupRepository implements ArticleGroupRepositoryInterface
{
    public function all(): Collection
    {
        return ArticleGroup::all();
    }

    public function getById(int $id): ?ArticleGroup
    {
        return ArticleGroup::find($id);
    }

    public function getByName(string $name): ?ArticleGroup
    {
        return ArticleGroup::where('name', $name)->first();
    }

    public function create(array $data): ArticleGroup
    {
        return ArticleGroup::create($data);
    }

    public function update(ArticleGroup $articleGroup, array $data): bool
    {
        return $articleGroup->update($data);
    }

    public function delete(ArticleGroup $articleGroup): bool
    {
        return $articleGroup->delete();
    }
}
