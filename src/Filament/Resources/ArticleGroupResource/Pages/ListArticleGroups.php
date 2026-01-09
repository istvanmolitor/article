<?php

namespace Molitor\Article\Filament\Resources\ArticleGroupResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Molitor\Article\Filament\Resources\ArticleGroupResource;

class ListArticleGroups extends ListRecords
{
    protected static string $resource = ArticleGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
