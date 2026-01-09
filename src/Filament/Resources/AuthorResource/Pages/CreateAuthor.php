<?php

namespace Molitor\Article\Filament\Resources\AuthorResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Molitor\Article\Filament\Resources\AuthorResource;

class CreateAuthor extends CreateRecord
{
    protected static string $resource = AuthorResource::class;
}
