<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ChildController;
use App\Models\Child;
use Livewire\Component;

class ChildActions extends Component
{
    public $children, $first_name, $last_name, $birthday, $gender, $selected, $user_id, $team_id, $child_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->birthday = '2001-02-19 00:00:00';
//        $this->user_id = 13;
//        $this->team_id = 15;
        $this->selected = 0;
        return view('livewire.child-actions');
    }

    public function selectChild($id) {
        ChildController::setCurrentChild($id);
    }

//    public function render()
//    {
//        $this->birthday = '2001-02-19 00:00:00';
//        $this->user_id = 13;
//        $this->team_id = 15;
//        $this->selected = 0;
////        $this->children = Child::all();
//        return view('livewire.add-child');
//    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm(){
        $this->first_name = '';
        $this->last_name = '';
        $this->birthday = '';
        $this->gender = '';
        $this->user_id = '';
        $this->team_id = '';
    }

    public function store($userId, $teamId)
    {
//        dump($this->user_id, $this->team_id);
//        dump($userId, $teamId);
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'selected' => 'required',
//            'user_id' => 'required',
//            'team_id' => 'required',
        ]);

        Child::updateOrCreate(['id' => $this->child_id], [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'selected' => $this->selected, //TODO
            'user_id' => $userId,
            'team_id' => $teamId,
        ]);

        session()->flash('message', $this->child_id ? 'Student updated.' : 'Student created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $child = Child::findOrFail($id);
        $this->child_id = $id;
        $this->first_name = $child->first_name;
        $this->last_name = $child->last_name;
        $this->birthday = $child->birthday;
        $this->gender= $child->gender;
        $this->selected = $child->selected;
        $this->user_id = $child->user_id;
        $this->team_id = $child->team_id;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Child::find($id)->delete();
        session()->flash('message', 'Student deleted.');
    }
}
