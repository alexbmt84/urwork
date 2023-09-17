<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Job extends Component
{

    public $job;

    public function render()
    {
        return view('livewire.job');
    }

    public function addLike() {

        if (auth()->check()) {

            auth()->user()->likes()->toggle($this->job->id); // Toggle ajoute ou supprimera le like en fonction...

        } else {

            $this->emit('flash', 'Merci de vous connecter pour ajouter une mission à vos favoris.', 'error');

        }

    }

}

