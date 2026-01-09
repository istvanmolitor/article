<?php

namespace Molitor\Article\Filament\Resources\ArticleGroupResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Molitor\Article\Filament\Resources\ArticleGroupResource;

class EditArticleGroup extends EditRecord
{
    protected static string $resource = ArticleGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
