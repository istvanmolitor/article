<?php

namespace Molitor\Article\Filament\Resources\ArticleResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Molitor\Article\Filament\Resources\ArticleResource;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;
}
