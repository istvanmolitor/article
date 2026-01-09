<?php

namespace Molitor\Article\Repositories;

use Illuminate\Support\Collection;
use Molitor\Article\Models\Author;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function all(): Collection
    {
        return Author::all();
    }

    public function getById(int $id): ?Author
    {
        return Author::find($id);
    }

    public function getByName(string $name): ?Author
    {
        return Author::where('name', $name)->first();
    }

    public function create(array $data): Author
    {
        return Author::create($data);
    }

    public function update(Author $author, array $data): bool
    {
        return $author->update($data);
    }

    public function delete(Author $author): bool
    {
        return $author->delete();
    }
}
