<div style="height: 100%">
    <div class="codigo-scene">
        <div class="buscar pb-0">
            <input type="text" class="form-control" wire:model="codigo">        
            <button id="screen-shot" class="btn btn-primary search-button" wire:click="search"> 
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
            <div class="descargar">
                <img @if ($results) src="{{ asset("storage/fotos/$results->id.png") }} @endif">
                @if ($results) 
                    <a href="{{ asset("storage/fotos/$results->id.png") }}" download>Descargar</a> 
                @endif
            </div>
    </div>
</div>
