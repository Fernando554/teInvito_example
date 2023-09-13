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
 
    public function saveAll()
    {
        $invitation = Invitation::create([
            'user_id' => auth()->id(),
        ]);
    
        foreach ($this->selectedComponents as $index => $componentData) {
            $componentName = $componentData['component'];
            $componentRecord = ModelsComponent::where('name', $componentName)->first();
            if ($componentRecord) {
                $componentClassName = $componentRecord->model_type;
                $order = $index + 1; 
                InvitationComponent::create([
                    'invitation_id' => $invitation->id,
                    'component_id' => $componentRecord->id, 
                    'order' => $order,
                ]);
            }
        }

        $this->emit('saveComponents');
    }
    //remover el ultimo componente que se agrego
    public function removeComponent($index)
    {
        unset($this->selectedComponents[$index]);
    }
    
}
