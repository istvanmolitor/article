<?php

namespace Molitor\Article\Services;

use Molitor\Article\Models\Article;
use Molitor\Article\Repositories\ArticleGroupRepositoryInterface;
use Molitor\Article\Repositories\AuthorRepositoryInterface;

class ArticleBuilder
{
    private Article $article;

    private array $articleGroups = [];

    public function __construct(
        private AuthorRepositoryInterface $authorRepository,
        private ArticleGroupRepositoryInterface $articleGroupRepository
    ) {
        $this->article = new Article();
    }

    public function setTitle(string $title): self
    {
        $this->article->title = $title;

        return $this;
    }

    public function setLead(string $lead): self
    {
        $this->article->lead = $lead;

        return $this;
    }

    public function setImage(string $image): self
    {
        $this->article->image = $image;

        return $this;
    }

    public function setSlug(string $slug): self
    {
        $this->article->slug = $slug;

        return $this;
    }

    public function setContent(string $content): self
    {
        $this->article->content = $content;

        return $this;
    }

    public function setAuthorId(int $authorId): self
    {
        $this->article->author_id = $authorId;

        return $this;
    }

    public function setAuthor(string $name): self
    {
        $author = $this->authorRepository->getByName($name);

        if (!$author) {
            $author = $this->authorRepository->create(['name' => $name]);
        }

        $this->article->author_id = $author->id;

        return $this;
    }

    public function addArticleGroup(string $name): self
    {
        $articleGroup = $this->articleGroupRepository->getByName($name);

        if (!$articleGroup) {
            $articleGroup = $this->articleGroupRepository->create(['name' => $name]);
        }

        $this->articleGroups[] = $articleGroup->id;

        return $this;
    }

    public function get(): Article
    {
        $article = $this->article;

        if ($this->articleGroups) {
            $article->saved(function (Article $article) {
                $article->articleGroups()->sync($this->articleGroups);
            });
        }

        return $article;
    }
}
