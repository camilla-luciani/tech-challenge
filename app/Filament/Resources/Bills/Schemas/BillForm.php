<?php

namespace App\Filament\Resources\Bills\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Schema;

class BillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('type')
                    ->options(['electricity' => 'Electricity', 'gas' => 'Gas'])
                    ->required(),
                TextInput::make('consumption')
                    ->required()
                    ->numeric(),
                TextInput::make('amount_paid')
                    ->required()
                    ->numeric(),
                Select::make('unit')
                    ->options(['kWh' => 'kWh', 'Smc' => 'Smc'])
                    ->required(),
                DatePicker::make('date_start')
                    ->required(),
                DatePicker::make('date_end')
                    ->required(),
                Actions::make([
                    //bottone valuta bolletta
                    Action::make('valuta_bolletta')
                        ->label('Valuta bolletta')
                        //si apre un modal
                        ->action(function ($record, $halt) {
                        })
                        ->modalHeading('Risultato valutazione')
                        ->modalContent(function ($record) {
                            $result = $record->compare();
                            //ritorna la view nel modale
                            return view('compare-modal', [
                                'result' => $result,
                                'bill' => $record,
                            ]);
                        })
                        ->modalSubmitAction(false)
                        ->modalCancelActionLabel('Chiudi'),
                ]),
            ]);
    }
}
