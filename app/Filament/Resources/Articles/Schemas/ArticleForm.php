<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('body')
                    ->required()
                    ->columnSpanFull(),
                //invece di inserire un testo libero, deve selezionare dalle categorie esistenti
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                DateTimePicker::make('published_at'),
            ]);
    }
}
