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
    public $newImage;


    public function mount()
    {
        $this->title1 = "Título 1";
        $this->title2 = "Título 2";
        $this->buttonText = "Suscríbete";
        $this->imageSrc = "https://picsum.photos/200/300";
        $this->text = "Texto descriptivo.";
        $this->days = '00';
        $this->hours = '00';
        $this->minutes = '00';
        $this->seconds = '00';
        $this->editing = true;
    }

    public function render()
    {
        return view('livewire.footersection');
    }

    public function updateImageSrc($newImageSrc)
    {
        $this->imageSrc = $newImageSrc;
    }

    public function updateImage()
    {
        if ($this->newImage) {
            // Guardar la nueva imagen en el servidor y actualizar la ruta en $imageSrc
            $this->imageSrc = $this->newImage->store('public/images');
        }
    }
    
    public function previewImage()
    {
        return $this->newImage
            ? $this->newImage->temporaryUrl()
            : asset('storage/' . $this->imageSrc);
    }

    public function saveChanges()
    {
        $this->saveComponentData();
    }

    public function saveComponentData()
    {
        $component = ModelsComponent::firstOrCreate([
            'nombre' => 'footersection', 
            'model_type' => 'App\Http\Livewire\Footersection', // Asegúrate de ajustar la ruta correcta
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
