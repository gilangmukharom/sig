<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pack;

class NavigationPayment extends Component
{
    public $activeLink = 'pack';
    public $selectedEmiten;
    public $packs;

    protected $listeners = ['emitenSelected'];

    public function setActiveLink($link)
    {
        $this->activeLink = $link;
    }

    public function mount()
    {
        $this->packs = Pack::all();
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