<?php

namespace App\Filament\Resources\Offers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OfferForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('provider_name')
                    ->required(),
                Select::make('type')
                    ->options(['electricity' => 'Electricity', 'gas' => 'Gas'])
                    ->required(),
                TextInput::make('unit_price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Select::make('unit')
                    ->options(['kWh' => 'K wh', 'Smc' => 'Smc'])
                    ->required(),
            ]);
    }
}
