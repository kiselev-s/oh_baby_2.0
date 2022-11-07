<?php
namespace App\Http\Livewire;
use App\Models\Expense;
use Asantibanez\LivewireCharts\Models\AreaChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Component;
class EvolutionCharts extends Component
{
    public $types = ['food', 'shopping', 'entertainment', 'travel', 'other'];
    public $colors = [
        'food' => '#f6ad55',
        'shopping' => '#fc8181',
        'entertainment' => '#90cdf4',
        'travel' => '#66DA26',
        'other' => '#cbd5e0',
    ];
    public $firstRun = true;

    public function render()
    {
        $expenses = Expense::whereIn('type', $this->types)->get();

        $lineChartModel = $expenses
            ->reduce(function (LineChartModel $lineChartModel, $data) use ($expenses) {
                $index = $expenses->search($data);
                $amountSum = $expenses->take($index + 1)->sum('amount');
//                $lineChartModel->addPoint($index, $amountSum, ['id' => $data->id]);
                $lineChartModel->addSeriesPoint('$index', $amountSum, ['id' => $data->id]);
                $lineChartModel->addSeriesPoint('$index2', $amountSum, ['id' => $data->id]);
//                $lineChartModel->addSeriesPoint($index, $amountSum, ['id' => $data->id]);

                return $lineChartModel;
            }, (new LineChartModel())
                ->setTitle('Expenses Evolution')
                ->setAnimated($this->firstRun)
                ->setSmoothCurve()
                ->multiLine()
//                ->withOnPointClickEvent('onPointClick')
            );

        $this->firstRun = false;

        return view('livewire.evolution-charts')
            ->with([
//                'columnChartModel' => $columnChartModel,
//                'pieChartModel' => $pieChartModel,
                'lineChartModel' => $lineChartModel,
//                'areaChartModel' => $areaChartModel,
            ]);
    }

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
    ];
    public function handleOnPointClick($point)
    {
        dd($point);
    }
    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }
    public function handleOnColumnClick($column)
    {
        dd($column);
    }
}
