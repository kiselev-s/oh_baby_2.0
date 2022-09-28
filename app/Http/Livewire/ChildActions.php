<?php

namespace App\Http\Livewire;

use App\Models\Child;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Request;

class ChildActions extends Component
{
    use LivewireAlert;

    public $children, $first_name, $last_name, $birthday, $gender, $selected, $user_id, $team_id, $child_id;
    public $isModalOpen = 0;
    public $user;
    public $child_name;
    public $deleteId;
//    public $child_name_delete;
//    public $child_id_temp;
    public $path;
    public $page;

    public $showingModal = false;

    public function mount($page)
    {
        $this->page = $page;
    }

    public function render()
    {
        $this->user = Auth::user();
        $this->team_id = $this->user->currentTeam->id;
        $this->children = Child::where('team_id', $this->team_id)->orderBy('selected', 'desc')->get();

        $child = $this->children
            ->where('team_id', $this->team_id)
            ->where('selected', true)
            ->first();
        if($child) {
            $this->child_name = $child->first_name;
            $this->gender = $child->gender;
        }
        else {
            $this->child_name = 'error child';
            $this->gender = 1;
        }

//        $this->selected = 0;

        return view('livewire.child-actions');
    }

    public function selectChild($id, $path) {
//        dd($path);
//        ChildController::setCurrentChild($id);
//        dd($this->team_id);
//        $teamId = DB::table('children')->where('id', $id)
//            ->value('team_id');
//        $teamId = $this->team_id;
//        $childId = $this->child_id;
//        dump($teamId, $childId);
//
//        DB::table('children')
//            ->where('team_id', $teamId)
//            ->where('selected', true)
//            ->lazyById()
//            ->each(function ($child) {
//                DB::table('children')
//                    ->where('id', $child->id)
//                    ->update(['selected' => false]);
//            });



//        DB::table('children')
//            ->where('id', $id)
//            ->lazyById()
//            ->each(function ($child) {
//                DB::table('children')
//                    ->where('id', $child->id)
//                    ->update(['selected' => true]);
//            });

//        DB::table('children')
//        Child::
//            where('id', $this->child_id)
//            ->update(['selected' => false]);

        Child::
//        where('id', $this->child_id)
            where('team_id', $this->team_id)
            ->where('selected', true)
            ->update(['selected' => false]);

//        DB::table('children')
        Child::
            where('id', $id)
            ->update(['selected' => true]);

//        return redirect()->to($path);
//        return redirect()->to($this->path);
        return redirect($this->page);
    }

//    public function create()
//    {
//        $this->selected = 0;//TODO
//        $this->resetCreateForm();
//        $this->openModalPopover();
//    }
//    public function openModalPopover()
//    {
//        $this->isModalOpen = true;
//    }
//    public function closeModalPopover()
//    {
//        $this->isModalOpen = false;
//    }
    private function resetCreateForm(){
        $this->first_name = '';
        $this->last_name = '';
        $this->birthday = '';
        $this->gender = '';
        $this->user_id = '';
        $this->team_id = '';
    }

//    public function store($userId, $teamId)
//    {
//        $this->validate([
//            'first_name' => 'required',
//            'last_name' => 'required',
//            'birthday' => 'required',
//            'gender' => 'required',
//            'selected' => 'required',
//        ]);
//
//        Child::updateOrCreate(['id' => $this->child_id], [
//            'first_name' => $this->first_name,
//            'last_name' => $this->last_name,
//            'birthday' => $this->birthday,
//            'gender' => $this->gender,
//            'selected' => $this->selected, //TODO
//            'user_id' => $userId,
//            'team_id' => $teamId,
//        ]);
//
//        $this->alert('success',
//            $this->child_id ?
//                'Child ' . $this->first_name . ' updated.' :
//                'Child ' . $this->first_name . ' created.', [
//            'position' => 'center',
//        ]);
//
//        $this->closeModalPopover();
//        $this->resetCreateForm();
//    }

//    public function edit($id)
//    {
//        $child = Child::findOrFail($id);
//        $this->child_id = $id;
//        $this->first_name = $child->first_name;
//        $this->last_name = $child->last_name;
//        $this->birthday = $child->birthday;
//        $this->gender= $child->gender;
//        $this->selected = $child->selected;
//        $this->user_id = $child->user_id;
//        $this->team_id = $child->team_id;
//
//        $this->openModalPopover();
//    }

    public function delete($id)
    {
//        Child::find($id)->delete();

        $this->deleteId = $id;

        $this->alert('warning', 'Are you sure?', [
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText'=>'Delete',
            'onConfirmed'=> 'confirmed',
            'showCancelButton' => true,
            'timer' => null,
        ]);
    }

    public function confirmed()
    {
        $child_name = Child::where('id', $this->deleteId)->value('first_name');

        Child::find($this->deleteId)->delete();

        $this->alert('success', 'Child ' . $child_name . ' deleted', [
            'position' => 'center',
        ]);
    }

    protected $listeners = [
        'confirmed'
    ];

    //--------------------------------------------------------------------

    //Modal Start
    public function showModal(){
        $this->showingModal = true;
    }

    public function store()
    {
        if(!$this->child_id)
            $this->selected = 0;

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
            'user_id' => $this->user->id,
            'team_id' => $this->team_id,
        ]);

        $this->alert('success',
            $this->child_id ?
                'Child ' . $this->first_name . ' updated.' :
                'Child ' . $this->first_name . ' created.', [
                'position' => 'center',
            ]);

        $this->showingModal = false;
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

        $this->showModal();
    }

    public function cancel()
    {
        $this->showingModal = false;

        $this->child_id = 0;

        $this->first_name = '';
        $this->last_name = '';
        $this->birthday = '';
        $this->gender = '';
        $this->user_id = '';
        $this->team_id = '';
    }
    //Modal End
}
