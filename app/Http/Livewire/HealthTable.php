<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ChildController;
use App\Models\Health;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Luckykenlin\LivewireTables\Views\Action;
use Luckykenlin\LivewireTables\Views\Column;
use Luckykenlin\LivewireTables\LivewireTables;

class HealthTable extends LivewireTables
{
    use LivewireAlert;

    public $rowId;

    public $showingModal = false;

    public $health_id, $first_name, $last_name, $specialization, $meeting, $child_id, $user_id, $team_id;

    // Table Start
    public function query(): Builder
    {
        $data = ChildController::data();
        $child = $data['child'];
        $this->team_id = $data['team_id'];
        $this->user_id = $data['user']->id;

        if($child) {
            $id = $child->id;
            $this->child_id = $id;

            return Health::query()
                ->where('children_id', $id);
//                ->orderBy('meeting', 'desc')->getQuery();
        }
        else{
            return Health::query()->where('children_id', 0);
        }
    }

    public function columns(): array
    {
        return [
            Column::make('#', 'id')->sortable(),
            Column::make('First name','first_name')->sortable()->searchable(),
            Column::make('Last name','last_name')->sortable()->searchable(),
            Column::make('specialization')->sortable()->searchable(),
            Column::make('meeting')->sortable(),
//        ->searchable()->format(fn(Carbon $v) => $v->diffForHumans()),
            Column::make('children_id')->sortable()->searchable(),
            Column::make('created_at')->format(fn(Carbon $v) => $v->diffForHumans()),

            Action::make(),
        ];
    }

    public string $defaultSortColumn = 'meeting';

    public string $defaultSortDirection = 'desc';

    public function submitDelete($rowId)
    {
        $this->rowId = $rowId;

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
        $this->delete($this->rowId);
    }

    protected $listeners = [
        'confirmed'
    ];

    public function newResource(){}

    //    public bool $debugEnabled = true;
    //Table End

    //Modal Start
    public function showModal(){
        $this->showingModal = true;
    }

    public function store()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'specialization' => 'required',
            'meeting' => 'required',

        ]);

        Health::updateOrCreate(['id' => $this->health_id], [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'specialization' => $this->specialization,
            'meeting' => $this->meeting,
            'children_id' => $this->child_id,
        ]);

        $this->alert('success',
            $this->health_id ?
                'Meeting to ' . $this->last_name . ' updated.' :
                'Meeting to ' . $this->last_name . ' created.', [
                'position' => 'center',
            ]);

        $this->showingModal = false;
    }

    public function edit($id)
    {
        $health = Health::findOrFail($id);
        $this->health_id = $id;
        $this->first_name = $health->first_name;
        $this->last_name = $health->last_name;
        $this->specialization = $health->specialization;
        $this->meeting = $health->meeting;
        $this->children_id = $health->children_id;

        $this->showModal();
    }

    public function cancel()
    {
        $this->showingModal = false;

        $this->resetModal();
    }

    private function resetModal(){
        $this->health_id = 0;
        $this->first_name = '';
        $this->last_name = '';
        $this->specialization = '';
        $this->meeting = null;
        $this->children_id = 0;
    }
    //Modal End
}
