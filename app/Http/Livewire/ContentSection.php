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
    public $isEditing = true;
    public $newImages = [];
    protected $listeners = ['saveComponents' => 'saveContentSection'];

    public function mount($data = null)
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

        // Si se proporcionan datos en $data, sobrescribe solo los primeros 3 elementos.
        if ($data) {
            $this->title = $data['title'];
            $this->images[0] = $data['image_0'];
            $this->images[1] = $data['image_1'];
            $this->images[2] = $data['image_2'];
            $this->texts[0] = $data['text_0'];
            $this->texts[1] = $data['text_1'];
            $this->texts[2] = $data['text_2'];
            $this->isEditing = false;
        }
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
        $this->isEditing = !$this->isEditing;
    }

    public function saveContentSection()
    {
        $this->saveComponentData();
    }

    public function addImage()
    {
        $this->newImages[] = null;
    }

    public function saveComponentData()
    {

        $component = ModelsComponent::firstOrCreate([
            'name' => 'content-section', 
            'model_type' => 'content-section', 
        ]);
        $invitation  = invitation::where('user_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;

        foreach ($this->newImages as $index => $newImage) {
            if ($newImage) {
                $imagePath = $newImage->store('images');
                $imageURL = asset('storage/' . $imagePath);
                $imageURL = str_replace(url('/'), '', $imageURL);
                $this->images[$index] = $imageURL;
            }
        }

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
    }
}
