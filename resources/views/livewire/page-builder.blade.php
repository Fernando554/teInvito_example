<div class="container">
    <h2>Agregar Componentes</h2>
    <ul>
        @foreach($availableComponents as $component => $label)
            <li wire:click="addComponent('{{ $component }}')">{{ $label }}</li>
        @endforeach
    </ul>
    <div>
        @foreach($selectedComponents as $index => $componentData)
            @livewire($componentData['component'], ['props' => $componentData['props']], key($index))
        @endforeach
    </div>
    <button wire:click="save" class="btn btn-primary">Guardar</button>
</div>