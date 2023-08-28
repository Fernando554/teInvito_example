<?php

namespace App\Http\Livewire;

use App\Models\component as ModelsComponent;
use App\Models\componentData;
use App\Models\invitation;
use Livewire\Component;

class HeaderSection extends Component
{
    public $title;
    public $body;
    public $isEditing = true;
    
    

    public function mount()
    {
        $this->title = "Título";
        $this->body = "Contenido actual del encabezado";
    }

    public function render()
    {
        return view('livewire.header-section');
    }

    public function toggleEditMode()
    {
        $this->isEditing = !$this->isEditing;
    }

    public function saveChanges()
    {
        $this->saveComponentData();
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

        return back();
    }
}
