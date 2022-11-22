<?php

namespace App\Http\Livewire;

use App\Models\Child;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ChildActions extends Component
{
    use LivewireAlert;

    public $children, $child_name, $first_name, $last_name, $birthday, $gender, $selectGender, $selected, $child_id;
    public $deleteId;
    public $user, $user_id, $team_id;
    public $theme;

    public $page;

    public $showingModal = false;

    public function mount($page)
    {
        $this->page = $page;
    }

    public function render()
    {
        $this->user = Auth::user();
        $this->theme = $this->user->theme;
        $this->team_id = $this->user->currentTeam->id;
        $this->children =
            DB::table('children')
                ->where('team_id', $this->team_id)
                ->orderByDesc('selected')
                ->get();

        $child = $this->children
            ->where('team_id', $this->team_id)
            ->where('selected', true)
            ->first();

        if($child) {
            $this->child_name = $child->first_name;
            $this->gender = $child->gender;
        }
        else {
            $this->child_name = 'Not child';
            $this->gender = 1;
        }

        return view('livewire.child-actions');
    }

    public function selectChild($id) {

        DB::table('children')
            ->where('team_id', $this->team_id)
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

        return redirect($this->page);
    }

    public function delete($id)
    {
        $this->deleteId = $id;

        $this->alert('question', 'Are you sure?', [
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
        $child_name =
                DB::table('children')
                    ->where('id', $this->deleteId)
                    ->value('first_name');

        DB::table('children')
            ->where('id', $this->deleteId)
            ->delete();

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

        if($this->children->count() === 0) {
            $this->selected = 1;
        }

        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'selectGender' => 'required',
            'selected' => 'required',
        ]);

        Child::updateOrCreate(['id' => $this->child_id], [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birthday' => $this->birthday,
            'gender' => $this->selectGender,
            'selected' => $this->selected,
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
        $this->resetModal();
        redirect($this->page);
    }

    public function edit($id)
    {
        $child = Child::findOrFail($id);
        $this->child_id = $id;
        $this->first_name = $child->first_name;
        $this->last_name = $child->last_name;
        $this->birthday = $child->birthday;
        $this->gender= $child->gender;
        $this->selectGender = $child->gender;
        $this->selected = $child->selected;
        $this->user_id = $child->user_id;
        $this->team_id = $child->team_id;

        $this->showModal();
    }

    public function cancel()
    {
        $this->showingModal = false;
        $this->child_id = 0;
        $this->resetModal();
    }

    private function resetModal(){
        $this->first_name = '';
        $this->last_name = '';
        $this->birthday = '';
        $this->gender = '';
        $this->user_id = '';
        $this->team_id = '';
        $this->clearValidation();
    }
    //Modal End

    public function switchTheme()
    {
//        dd($this->theme);
        if($this->theme != 'dark')
            $this->theme = 'dark';
        else
            $this->theme = null;


        DB::table('users')
            ->where('id', $this->user->id)
            ->lazyById()
            ->each(function ($user) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['theme' => $this->theme]);
            });
    }
}
