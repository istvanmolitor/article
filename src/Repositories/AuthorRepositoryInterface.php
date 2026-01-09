<?php

namespace Molitor\Article\Repositories;

use Illuminate\Support\Collection;
use Molitor\Article\Models\Author;

interface AuthorRepositoryInterface
{
    /** @return Collection<int,Author> */
    public function all(): Collection;

    public function getById(int $id): ?Author;

    public function getByName(string $name): ?Author;

    public function create(array $data): Author;

    public function update(Author $author, array $data): bool;

    public function delete(Author $author): bool;
}
