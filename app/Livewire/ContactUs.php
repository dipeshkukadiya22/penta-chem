<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class ContactUs extends Component
{
    #[Title('Contact US')]
    public function render()
    {
        return view('livewire.contact-us');
    }
}
