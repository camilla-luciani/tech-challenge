<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Http;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                //aggiungo bottone importa notizia al form
                Actions::make([
                    Action::make('importa_notizia')
                        ->label('Importa notizia')
                        //azione quando clicco il bottone
                        ->action(function (Set $set) {
                            //chiamo l'api che recupera le notizie
                            $response = Http::get('https://newsapi.org/v2/top-headlines', [
                                'apiKey' => config('app.news_api_key'),
                                'language' => 'en',
                            ]);

                            //scelgo un articolo random
                            $articles = $response->json('articles');
                            $random = $articles[array_rand($articles)];

                            //setto titolo e corpo dell'articolo
                            $set('title', $random['title']);
                            $set('body', $random['description'] ?? $random['content']);
                        })
                ])
                ->verticallyAlignEnd(), //allineo bottone con input testo
                Textarea::make('body')
                    ->required()
                    ->columnSpanFull(),
                //invece di inserire un testo libero, devo selezionare dalle categorie esistenti
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
            ]);
    }
}
