<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NavigationPayment extends Component
{
    public $activeLink = 'pack';
    public $selectedEmiten;

    protected $listeners = ['emitenSelected'];

    public function setActiveLink($link)
    {
        $this->activeLink = $link;
    }

    public function emitenSelected($emiten)
    {
        $this->selectedEmiten = $emiten;
        $this->setActiveLink('paymentDetail');
    }

    public function render()
    {
        return view('livewire.navigation-payment');
    }
}