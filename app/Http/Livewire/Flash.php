<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Flash extends Component
{
    public $message;
    public $type;
    public $colors = [
        'error' => 'border-pink-500 text-pink-500 bg-pink-200',
        'success' => 'border-green-700 text-green-700 bg-green-200',
        'warning' => 'border-orange-500 text-orange-500 bg-orange-200',
        'info' => 'border-blue-500 text-blue-500 bg-blue-200'
    ];
    protected $listeners = ['flash' => 'setFlashMessage'];

    public function setFlashMessage($message, $type) {

        $this->message = $message;
        $this->type = $type;

        $this->dispatchBrowserEvent('flash-message');
    }

    public function render()
    {
        return view('livewire.flash');
    }

}
