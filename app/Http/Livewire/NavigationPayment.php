<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NavigationPayment extends Component
{
    public $activeLink = 'pack';

    public function setActiveLink($link)
    {
        $this->activeLink = $link;
    }

    public function render()
    {
        return view('livewire.navigation-payment');
    }
}
