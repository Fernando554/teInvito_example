<div class="container">
    <h2>Agregar Componentes</h2>
    <ul>
        @foreach($availableComponents as $component => $label)
            <li wire:click="addComponent('{{ $component }}')">{{ $label }}</li>
        @endforeach
    </ul>
    @if(count($selectedComponents) >= 5)
        <p>Has alcanzado el máximo de 5 componentes.</p>
    @endif
    <div>
        @foreach($selectedComponents as $index => $componentData)
            @livewire($componentData['component'], ['props' => $componentData['props']], key($index))
            <button wire:click="removeComponent({{ $index }})" class="btn btn-danger">Reset</button>
        @endforeach
    </div>
    <button wire:click="save" class="btn btn-primary">Guardar</button>
</div>
