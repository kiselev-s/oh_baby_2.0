<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ChildController;
use App\Models\Health;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Luckykenlin\LivewireTables\Views\Action;
use Luckykenlin\LivewireTables\Views\Column;
use Luckykenlin\LivewireTables\LivewireTables;

class HealthTable extends LivewireTables
{
    public $test = 1;
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

//    public bool $debugEnabled = true;
}
