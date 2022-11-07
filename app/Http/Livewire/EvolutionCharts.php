<?php
namespace App\Http\Livewire;
use App\Models\Expense;
use App\Models\Evolution;
use Asantibanez\LivewireCharts\Models\AreaChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Component;
class EvolutionCharts extends Component
{
//    public $types = ['8', 'food', 'shopping', 'entertainment', 'travel', 'other'];
    public $colors = [
        'food' => '#f6ad55',
        'shopping' => '#fc8181',
        'entertainment' => '#90cdf4',
        'travel' => '#66DA26',
        'other' => '#cbd5e0',
    ];
    public $firstRun = true;

    public $showAdd = true;

    public function add()
    {
        $this->showAdd = true;
    }

    public function store()
    {
        $this->showAdd = false;
    }

    public function cancel()
    {
        $this->showAdd = false;
    }

    public function render()
    {
        $evolution = Evolution::where('children_id', 8)
            ->orderBy('age_month', 'asc')
            ->get();

        $ChartModel = $evolution
            ->reduce(function (LineChartModel $lineChartModel, $data) use ($evolution) {

                $lineChartModel->addSeriesPoint('Рост',$data->age_month, $data->growth, ['id' => $data]);
                $lineChartModel->addSeriesPoint('Вес', $data->age_month, $data->weight, ['id' => $data]);

                return $lineChartModel;
            }, (new LineChartModel())
                ->setTitle('Evolution relative to age')
                ->setAnimated($this->firstRun)
                ->setSmoothCurve()
                ->multiLine()
                ->withOnPointClickEvent('onPointClick')
            );

        $this->firstRun = false;

        return view('livewire.evolution-charts')
            ->with([
                'ChartModel' => $ChartModel,
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
