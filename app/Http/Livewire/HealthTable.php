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

    public function query(): Builder
    {
        $data = ChildController::data();
        $child = $data['child'];
        $id = $child->id;

        return Health::query()->where('children_id', $id);
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

    public function submitDelete($rowId)
    {
        $this->rowId = $rowId;

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
        $this->delete($this->rowId);
    }

    protected $listeners = [
        'confirmed'
    ];

//    public bool $debugEnabled = true;
}
