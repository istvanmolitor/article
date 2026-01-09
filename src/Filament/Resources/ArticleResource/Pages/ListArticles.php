<?php

namespace Molitor\Article\Filament\Resources\ArticleResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Molitor\Article\Filament\Resources\ArticleResource;

class ListArticles extends ListRecords
{
    protected static string $resource = ArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
