<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ChildController;
use Livewire\Component;

class DocumentsView extends Component
{
    public $data;//TODO

    public $child_name, $team_id, $user_name;

    public function render()
    {
        $this->data = ChildController::data();

        $this->child_name = $this->data['child_name'];
        $this->team_id = $this->data['team_id'];
        $this->user_name = $this->data['user']->name;

        return view('livewire.documents-view', [
            'data'=>$this->data,
             'child_name'=>$this->child_name,
            'team_id'=>$this->team_id,
            'user_name'=>$this->user_name,
        ]);
    }

    public function show()
    {
        dump($this->data);
    }
}
