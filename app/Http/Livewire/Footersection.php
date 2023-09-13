<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\component as ModelsComponent;
use App\Models\componentData;
use App\Models\invitation;

class Footersection extends Component
{
    use WithFileUploads;

    public $title1 = "Título 1";
    public $title2 = "Título 2";
    public $buttonText = "Suscríbete";
    public $imageSrc = "https://picsum.photos/200/300";
    public $text = "Texto descriptivo.";
    public $days = '00';
    public $hours = '00';
    public $minutes = '00';
    public $seconds = '00';
    public $editing = true;
    public $newImage = [];
    public $isEditing = true;
    public $componentId;
    protected $listeners = ['saveComponents' => 'saveComponentData'];



    public function mount($data = null, $id = null)
    {
        // Si se proporcionan datos en $data, sobrescribe solo los primeros 3 elementos.
        if ($data) {
            $this->title1 = $data['title1'];
            $this->title2 = $data['title2'];
            $this->buttonText = $data['buttonText'];
            $this->imageSrc = $data['imageSrc'];
            $this->text = $data['text'];
            $this->days = $data['days'];
            $this->hours = $data['hours'];
            $this->minutes = $data['minutes'];
            $this->seconds = $data['seconds'];
            $this->editing = false;
        }

        if ($id) {
            $this->componentId = $id;
        }
    }

    public function render()
    {
        return view('livewire.footersection');
    }

    public function updateImageSrc($newImageSrc)
    {
        $this->imageSrc = $newImageSrc;
    }

    public function updateImage($index)
    {
        // Verificamos si el usuario ha seleccionado una nueva imagen
        if (isset($this->newImage[$index])) {
            // Guardamos la nueva imagen en el servidor y actualizamos la ruta en $images
            $this->imageSrc[$index] = $this->newImage[$index]->store('public/images');
        }
    }
    
    public function previewImage($index)
    {
        return isset($this->newImage[$index])
            ? $this->newImage[$index]->temporaryUrl()
            : asset('storage/' . $this->imageSrc[$index]);
    }

    public function toggleEdit($index)
    {
        $this->isEditing = !$this->isEditing;
    }

    public function saveChanges()
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
            'name' => 'footer-section', 
            'model_type' => 'footer-section', // Asegúrate de ajustar la ruta correcta
        ]);
        $invitation = Invitation::where('user_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;
        $this->componentData = [
            'title1' => $this->title1,
            'title2' => $this->title2,
            'buttonText' => $this->buttonText,
            'imageSrc' => $this->imageSrc,
            'text' => $this->text,
            'days' => $this->days,
            'hours' => $this->hours,
            'minutes' => $this->minutes,
            'seconds' => $this->seconds,
        ];
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
