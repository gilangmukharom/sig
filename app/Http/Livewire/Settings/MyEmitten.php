<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

class MyEmitten extends Component
{
    public $activeTab = 'my-emitten';

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.settings.my-emitten');
    }
}
