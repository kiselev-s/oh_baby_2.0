<?php
namespace App\Http\Livewire;
use App\Http\Controllers\ChildController;
use App\Models\Evolution;
use Asantibanez\LivewireCharts\Models\AreaChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\HasColors;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
class HomeCharts extends Component
{
    use LivewireAlert;
//    public $types = ['food', 'shopping', 'entertainment', 'travel', 'other'];
    public $colors = [
        '0' => '#f6ad55',
        '1' => '#fc8181',
        '2' => '#90cdf4',
        '3' => '#66DA26',
        '4' => '#cbd5e0',
        '5' => '#ffffff',
        '6' => '#3f3cbb',
        '7' => '#121063',
        '8' => '#565584',
        '9' => '#3ab7bf',
        '10' => '#ecebff',
        '11' => '#ff77e9',
        '12' => '#78dcca',
    ];

    public $child, $child_id, $user_id, $team_id;

    public $firstRun = true;

    public $evolutions, $evolutionsMax, $children;

    public function render()
    {
        $data = ChildController::data();
        $this->child = $data['child'];
        if ($this->child) {
            $this->child_id = $this->child->id;
            $this->team_id = $data['team_id'];
            $this->user_id = $data['user']->id;

            $maxWeight = DB::table('evolutions')
                ->select('children_id', DB::raw('MAX(weight) as max_weight'))
                ->groupBy('children_id');

            $evolution
                = DB::table('children')
                ->where('team_id', $this->team_id)
                ->joinSub($maxWeight, 'max_weight', function ($join) {
                    $join->on('children.id', '=', 'max_weight.children_id');
                })
                ->select('id', 'first_name', 'max_weight')
                ->get();

            if ($evolution->count() > 0) {
                $columnChartModel = $evolution->groupBy('id')
                    ->reduce(function (ColumnChartModel $columnChartModel, $data) {
//                        $type = $data->first()->id;
//                        $value = $data->first()->weight;
                        $type = $data->value('first_name');
                        $value = $data->value('max_weight');
//                        return $columnChartModel->addColumn($type, $value, $this->colors[$type]);
                        return $columnChartModel->addColumn($type, $value, $this->colors, $data[0]);

                    }, (new ColumnChartModel())
                        ->setTitle('Evolution by Weight')
                        ->setDataLabelsEnabled('true')
                        ->setAnimated($this->firstRun)
                        ->setColors($this->colors)
                        ->withOnColumnClickEventName('onColumnClick')
                    );
                $pieChartModel = $evolution->groupBy('id')
                    ->reduce(function (PieChartModel $pieChartModel, $data) {
//                        $type = $data->first()->id;
//                        $value = $data->first()->weight;
                        $type = $data->value('first_name');
                        $value = $data->value('max_weight');
                        return $pieChartModel->addSlice($type, $value, $this->colors, $data[0]);
                    }, (new PieChartModel())
                        ->setTitle('Evolution by Weight')
                        ->setAnimated($this->firstRun)
                        ->setColors($this->colors)
                        ->withOnSliceClickEvent('onSliceClick')
                    );
                return view('livewire.home-charts')
                    ->with([
                        'columnChartModel' => $columnChartModel,
                        'pieChartModel' => $pieChartModel,
                    ]);
            }
        }
        $this->firstRun = false;
        return view('livewire.no-chart-home');
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
//        dd($column['extras']);
        $this->alert('info',
            $column['extras']['first_name'] . ':',
            [
                'position' => 'center',
                'showConfirmButton' => true,
                'timer' => 10000,
                'text' =>
                     "maximum weight " . $column['extras']['max_weight'],
        ]);
    }
}
