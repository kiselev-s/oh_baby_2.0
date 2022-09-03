<?php

namespace App\Http\Livewire;

use App\Http\Controllers\UserController;
use Livewire\Component;

class SwitchChild extends Component
{
    public function render()
    {
        return view('livewire.switch-child');
    }

    public function selectChild($id) {
        UserController::setCurrentChild($id);
    }
}
