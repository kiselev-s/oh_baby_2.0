<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ChildController;
use App\Models\Child;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TestView extends Component
{
    public $children, $first_name, $last_name, $birthday, $gender, $selected, $user_id, $team_id, $child_id;
    public $isModalOpen = 0;
    public $user;
    public $child_name;

    public function render()
    {
        //TEST
        $this->user = Auth::user();
        $this->team_id = $this->user->currentTeam->id;
        $this->children = Child::where('team_id', $this->team_id)->orderBy('selected', 'desc')->get();
        $child = $this->children
            ->where('team_id', $this->team_id)
            ->where('selected', true)
            ->first();
        $this->child_name = $child->first_name;
        $this->gender = $child->gender;

        $this->selected = 0;

        $user = Auth::user();

        return view('livewire.test-view', [
            'userName' => $user->name,
            'select'=>$this->selected,
            'isModalOpen'=>$this->isModalOpen,
            'team_id'=>$this->team_id,
            'child_name'=>$this->child_name,
            'children'=>$this->children,
            'child_id'=>$this->child_id,
//            'child'=>$this->child,
        ]);
    }

    public function selectChild($id) {
//                dump('select_true');
//        ChildController::setCurrentChild($id);
        $teamId = DB::table('children')->where('id', $id)
            ->value('team_id');

        DB::table('children')
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->lazyById()
            ->each(function ($child) {
                DB::table('children')
                    ->where('id', $child->id)
                    ->update(['selected' => false]);
            });

        DB::table('children')
            ->where('id', $id)
            ->lazyById()
            ->each(function ($child) {
                DB::table('children')
                    ->where('id', $child->id)
                    ->update(['selected' => true]);
            });
//        dump($id, '---', $this->team_id);
    }

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
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'selected' => 'required',
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
