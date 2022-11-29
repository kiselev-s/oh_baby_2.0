<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ChildController;
use Livewire\Component;

class HomeInfo extends Component
{
    public $name, $gender, $fio, $birthday, $growth, $weight, $holiday, $meeting;

    public function render()
    {
        $this->getData();

        return view('livewire.home-info', [
            'name' => $this->name,
            'gender' => $this->gender,
            'fio' => $this->fio,
            'birthday' => $this->birthday,
            'growth' => $this->growth,
            'weight' => $this->weight,
            'holiday' => $this->holiday,
            'meeting' => $this->meeting,
        ]);
    }

    private function getData()
    {
        $data = ChildController::data();
        $this->name = $data['user']->name;
        $this->gender = $data['gender'];
        $this->fio = $data['fio'];
        $this->birthday = $data['birthday'];
        $this->growth = $data['growth'];
        $this->weight = $data['weight'];
        $this->holiday = $data['holiday'];
        $this->meeting = $data['meeting'];
    }
}
