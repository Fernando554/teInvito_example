<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\component as ModelsComponent;
use App\Models\componentData;
use App\Models\invitation;

class ContentSection extends Component
{
    use WithFileUploads;

    public $title;
    public $images;
    public $texts;
    public $isEditing;
    public $newImages = [];

    public function mount()
    {
        $this->title = "Título en el Centro";
        $this->images = [
            'imagen1.jpg',
            'imagen2.jpg',
            'imagen3.jpg',
        ];
        $this->texts = [
            'Texto de la columna 1',
            'Texto de la columna 2',
            'Texto de la columna 3',
        ];
        $this->isEditing = array_fill(0, count($this->images), false);
    }

    public function render()
    {
        return view('livewire.content-section');
    }

    public function updateImage($index)
    {
        // Verificamos si el usuario ha seleccionado una nueva imagen
        if (isset($this->newImages[$index])) {
            // Guardamos la nueva imagen en el servidor y actualizamos la ruta en $images
            $this->images[$index] = $this->newImages[$index]->store('public/images');
        }
    }
    
    public function previewImage($index)
    {
        return isset($this->newImages[$index])
            ? $this->newImages[$index]->temporaryUrl()
            : asset('storage/' . $this->images[$index]);
    }

    public function toggleEdit($index)
    {
        if (array_key_exists($index, $this->isEditing)) {
            $this->isEditing[$index] = !$this->isEditing[$index];
        }
    }

    public function saveChanges()
    {
        $this->saveComponentData();
    }

    public function saveComponentData()
    {

        $component = ModelsComponent::firstOrCreate([
            'nombre' => 'content-section', 
            'model_type' => 'App\Http\Livewire\ContentSection', 
        ]);
        $invitation  = invitation::where('user_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;
        ComponentData::create([
            'key' => 'title', 
            'value' => $this->title, 
            'invitation_id' => $invitationId, 
            'component_id' => $component->id, 
        ]);

        foreach ($this->images as $index => $image) {
            ComponentData::create([
                'key' => "image_$index", 
                'value' => $image, 
                'invitation_id' => $invitationId, 
                'component_id' => $component->id, 
            ]);
        }

        foreach ($this->texts as $index => $text) {
            ComponentData::create([
                'key' => "text_$index", 
                'value' => $text, 
                'invitation_id' => $invitationId, 
                'component_id' => $component->id, 
            ]);
        }
        // Regresa a la página anterior después de guardar
        return back();
    }
}
