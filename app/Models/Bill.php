<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /**
     * trova la migliore offerta e la compara con la bolletta attuale
     */
    public function compare()
    {
        //trovo le offerte ordinate per prezzo
        $best_offer = Offer::where('type', $this->type)
            ->orderBy('unit_price', 'asc')
            ->first();

        if (!$best_offer) {
            return null;
        }

        //calcolo il prezzo della migliore offerta sui consumi dell'utente
        $best_price = $best_offer->unit_price * $this->consumption;
        //calcolo il risparmio
        $saving = $this->amount_paid - $best_price;

        return [
            'best_offer' => $best_offer,
            'best_price' => round($best_price, 2),
            'saving' => round($saving, 2),
        ];
    }
}
