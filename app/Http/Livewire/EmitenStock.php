<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EmitenStock extends Component
{
    public $search = '';
    public $emitenList = [
        ['code' => 'ACES', 'name' => 'Ace Hardware Indonesia Tbk'],
        ['code' => 'ASII', 'name' => 'Astra International Indonesia Tbk'],
        ['code' => 'ADRO', 'name' => 'Adaro Energy Indonesia Tbk'],
        ['code' => 'BBRI', 'name' => 'Bank Republik Indonesia Tbk'],
        ['code' => 'BBNI', 'name' => 'Bank Negara Indonesia Tbk'],
    ];
    public $selectedEmiten = [];

    public function selectEmiten($code)
    {
        if (!in_array($code, $this->selectedEmiten)) {
            $this->selectedEmiten[] = $code;
        } else {
            $this->selectedEmiten = array_diff($this->selectedEmiten, [$code]);
        }
    }

    public function submit()
    {
        // Process the selected emiten
        dd($this->selectedEmiten);
    }

    public function render()
    {
        $filteredEmitens = array_filter($this->emitenList, function ($emiten) {
            return stripos($emiten['name'], $this->search) !== false || stripos($emiten['code'], $this->search) !== false;
        });

        return view('livewire.sections.emiten', ['filteredEmitens' => $filteredEmitens]);
    }
}
