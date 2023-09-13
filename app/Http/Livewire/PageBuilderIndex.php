<?php

namespace App\Http\Livewire;

use App\Models\invitation;
use Livewire\Component;

class PageBuilderIndex extends Component
{
    public function render()
    {
        $invitations = invitation::where('user_id', auth()->user()->id)->get();
        return view('livewire.page-builder-index', compact('invitations'));
    }
}
