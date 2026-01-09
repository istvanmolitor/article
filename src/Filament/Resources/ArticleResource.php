<?php

namespace Molitor\Article\Filament\Resources;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Molitor\Article\Filament\Resources\ArticleResource\Pages;
use Molitor\Article\Models\Article;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    public static function getNavigationGroup(): ?string
    {
        return __('article::common.navigation_group');
    }

    protected static \BackedEnum|null|string $navigationIcon = 'heroicon-o-document-text';

    public static function getNavigationLabel(): string
    {
        return __('article::common.article_navigation_label');
    }

    public static function getPluralLabel(): ?string
    {
        return __('article::common.article_plural_label');
    }

    public static function getModelLabel(): string
    {
        return __('article::common.article_model_label');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__('article::common.article_field_title'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('author_id')
                    ->label(__('article::common.article_field_author'))
                    ->relationship('author', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\RichEditor::make('content')
                    ->label(__('article::common.article_field_content'))
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('articleGroups')
                    ->label(__('article::common.article_field_article_groups'))
                    ->relationship('articleGroups', 'name')
                    ->multiple()
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('article::common.article_field_title'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->label(__('article::common.article_field_author'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
