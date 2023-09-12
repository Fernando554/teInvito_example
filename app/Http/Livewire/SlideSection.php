<?php

namespace App\Http\Livewire;

use App\Models\component as ModelsComponent;
use App\Models\componentData;
use App\Models\invitation;
use Livewire\Component;

class SlideSection extends Component
{
    public $title;
    public $content;
    public $subcontent;
    public $isEditing = true;


    public function render()
    {
        return view('livewire.slide-section');
    }

    public function mount()
    {
        $this->title = "Titulo";
        $this->content = "Contenido";
        $this->subcontent = "Subcontenido";
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
            'name' => 'slide-section', 
            'model_type' => 'App\Http\Livewire\SlideSection', // Asegúrate de ajustar la ruta correcta
        ]);
        //se buscara la ultima invitacion creada por el usuario
        $invitation = Invitation::where('user_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;
        $this->componentData = [
            'title' => $this->title,
            'content' => $this->content,
            'subcontent' => $this->subcontent,
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
