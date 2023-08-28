<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\component as ModelsComponent;
use App\Models\componentData;

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

    public function updateTitle($newTitle)
    {
        $this->title = $newTitle;
    }

    public function updateText($index, $newText)
    {
        $this->texts[$index] = $newText;
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

    public function saveComponentData($invitationId)
    {
            // Guarda el componente o recupéralo si ya existe
        $component = ModelsComponent::firstOrCreate([
            'nombre' => 'Content', // Ajusta el nombre de tu componente
            'model_type' => 'App\Http\Livewire\ContentSection', // Ajusta la ruta de tu componente
        ]);

        ComponentData::create([
            'key' => 'title', // Clave para el título
            'value' => $this->title, // Guarda el título
            'invitation_id' => $invitationId, // Ajusta el ID de la invitación según tus necesidades
            'component_id' => $component->id, // Asocia el componente
        ]);

        // Guarda la información en la tabla 'component_data' para cada elemento en $images y $texts
        foreach ($this->images as $index => $image) {
            ComponentData::create([
                'key' => "image_$index", // Define una clave única para cada imagen
                'value' => $image, // Guarda la ruta de la imagen
                'invitation_id' => $invitationId, // Ajusta el ID de la invitación según tus necesidades
                'component_id' => $component->id, // Asocia el componente
            ]);
        }

        foreach ($this->texts as $index => $text) {
            ComponentData::create([
                'key' => "text_$index", // Define una clave única para cada texto
                'value' => $text, // Guarda el texto
                'invitation_id' => $invitationId, // Ajusta el ID de la invitación según tus necesidades
                'component_id' => $component->id, // Asocia el componente
            ]);
        }
        // Regresa a la página anterior después de guardar
        return back();
    }
}
