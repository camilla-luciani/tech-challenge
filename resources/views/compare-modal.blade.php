<style>
    .compare-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem; }
    .box { padding: 1rem; border-radius: 0.5rem; }
    .box-green { background-color: #f0fdf4; border: 1px solid #86efac; }
    .box-red { background-color: #fef2f2; border: 1px solid #fca5a5; }
    .box-blue { background-color: #eff6ff; border: 1px solid #93c5fd; text-align: center; padding: 1rem; border-radius: 0.5rem; margin-top: 1rem; }
    .box h3 { font-weight: bold; margin-bottom: 0.5rem; }
    .green { color: #15803d; }
    .red { color: #b91c1c; }
    .blue { color: #1d4ed8; font-size: 1.1rem; font-weight: bold; }
</style>

@if(!$result)
    <p>Nessuna offerta disponibile.</p>
@else
    {{-- se risparmio --}}
    @if($result['saving'] > 0)
        <div class="compare-grid">

            <div class="box box-green">
                <h3 class="green">Offerta migliore</h3>
                <p>Fornitore: {{ $result['best_offer']->provider_name }}</p>
                <p>Prezzo unitario: {{ $result['best_offer']->unit_price }} €/{{ $result['best_offer']->unit }}</p>
                <p>Costo stimato: {{ $result['best_price'] }} €</p>
            </div>

            <div class="box box-red">
                <h3 class="red">Quanto hai pagato</h3>
                <p>Importo pagato: {{ $bill->amount_paid }} €</p>
                <p>Consumo: {{ $bill->consumption }} {{ $bill->unit }}</p>
            </div>

        </div>

        <div class="box-blue">
            <p class="blue">
                Potresti risparmiare {{ $result['saving'] }} €
            </p>
        </div>
    @else
        {{-- se non risparmio --}}
        <div class="box box-green">
            <p class="green">
                Stai già pagando il prezzo migliore
            </p>
        </div>
    @endif
@endif
