<?php

namespace App\Http\Livewire;

use App\Models\custom_view;
use Livewire\Component;
use Livewire\Livewire;
use App\Models\invitation;
use App\Models\invitationComponent;
use App\Models\componentData;
use App\Models\component as ModelsComponent;
use App\Http\Livewire\HeaderSection;

class PageBuilder extends Component
{
    public $title;
    public $body;
    public $selectedComponents = [];
    public $availableComponents = [
        'header-section' => 'Encabezado',
        'footersection' => 'Footer',
        'content-section' => 'Contentenido',
        'slide-section' => 'Slider',
    ];
    public $componentChangesSaved = [];

    public function mount()
    {
        $this->title = "Título";
        $this->body = "Contenido actual del encabezado";
    }
    public function render()
    {
        return view('livewire.page-builder');
    }

    public function addComponent($component)
    {
        if (count($this->selectedComponents) < 5) {
            $this->selectedComponents[] = ['component' => $component, 'props' => []];
        }
    }


    public function updateComponent($index, $props)
    {
        $this->selectedComponents[$index]['props'] = $props;
    }

    public function saveComponentData()
    {
        $component = ModelsComponent::firstOrCreate([
            'nombre' => 'header-section', 
            'model_type' => 'App\Http\Livewire\HeaderSection', // Asegúrate de ajustar la ruta correcta
        ]);
        //se buscara la ultima invitacion creada por el usuario
        $invitation = Invitation::where('user_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;
        $this->componentData = [
            'title' => $this->title,
            'body' => $this->body,
        ];
        // Luego, guarda la información en la tabla 'component_data'
        foreach ($this->componentData as $key => $body) {
            ComponentData::create([
                'key' => $key,
                'value' => $body,
                'invitation_id' => $invitationId,
                'component_id' => $component->id,
            ]);
        }

    }

    public function saveChanges()
    {
        $this->saveComponentData();
    }
    
    public function save()
    {
        $invitation = Invitation::create([
            'user_id' => auth()->id(),
        ]);
    
        foreach ($this->selectedComponents as $index => $componentData) {
            $componentName = $componentData['component'];
            $componentRecord = ModelsComponent::where('nombre', $componentName)->first();
            if ($componentRecord) {
                $componentClassName = $componentRecord->model_type;
    
                $componentInstance = new $componentClassName();
    
                // 8. Agrega el componente a la tabla 'invitations_components' con el 'order'
                $order = $index + 1; 
                InvitationComponent::create([
                    'invitation_id' => $invitation->id,
                    'component_id' => $componentRecord->id, // Utiliza el ID del registro
                    'order' => $order,
                ]);
            }
        }

        $this->saveChanges();
    }
    //remover el ultimo componente que se agrego
    public function removeComponent($index)
    {
        unset($this->selectedComponents[$index]);
    }
    
}
