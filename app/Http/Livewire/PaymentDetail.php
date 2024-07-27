<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentDetail extends Component
{
    public $selectedEmiten;

    public function mount($selectedEmiten)
    {
        $this->selectedEmiten = $selectedEmiten;
    }

    public function render()
    {
        $paymentMethods = [
            ['code' => 'BRI', 'name' => 'Bank Republik Indonesia Tbk'],
            ['code' => 'BNI', 'name' => 'Bank Negara Indonesia Tbk'],
            ['code' => 'OVO', 'name' => 'OVO Indonesia Tbk'],
        ];

        return view('livewire.sections.payment-detail', [
            'paymentMethods' => $paymentMethods,
            'selectedEmiten' => $this->selectedEmiten,
        ]);
    }
}
