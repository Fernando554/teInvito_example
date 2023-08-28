<?php

namespace App\Http\Livewire;

use App\Models\custom_view;
use Livewire\Component;
use Livewire\Livewire;
use App\Models\invitation;
use App\Models\invitationComponent;
use App\Models\component as ModelsComponent;
use App\Http\Livewire\HeaderSection;

class PageBuilder extends Component
{
    public $selectedComponents = [];
    public $availableComponents = [
        'header-section' => 'Encabezado',
        'footersection' => 'Footer',
        'content-section' => 'Contentenido',
        'slide-section' => 'Slider',
    ];
    public $componentChangesSaved = [];
    public function render()
    {
        return view('livewire.page-builder');
    }

    public function addComponent($component)
    {
        $this->selectedComponents[] = ['component' => $component, 'props' => []];
    }

    public function updateComponent($index, $props)
    {
        dd($index, $props);
        $this->selectedComponents[$index]['props'] = $props;
        dd($this->selectedComponents);
    }
    
    public function save()
    {
        $invitation = Invitation::create([
            'user_id' => auth()->id(),
        ]);
    
        foreach ($this->selectedComponents as $index => $componentData) {
            $componentName = $componentData['component'];
    
            $componentRecord = ModelsComponent::where('nombre', $componentName)->first();
            dd($componentRecord);
            if ($componentRecord) {
                $componentClassName = $componentRecord->model_type;
                dd($componentClassName);
    
                $componentInstance = new $componentClassName();
    
                // 8. Agrega el componente a la tabla 'invitations_components' con el 'order'
                $order = $index + 1; 
                InvitationComponent::create([
                    'invitation_id' => $invitation->id,
                    'component_id' => $componentRecord->id, // Utiliza el ID del registro
                    'order' => $order,
                ]);
                // 9. Llama al método 'saveComponentData' en la instancia del componente
                $componentInstance->saveComponentData($invitation->id);
            }
        }
    
        return back();
    }
    
}
