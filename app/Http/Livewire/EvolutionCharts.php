<?php
namespace App\Http\Livewire;
use App\Http\Controllers\ChildController;
use App\Models\Expense;
use App\Models\Evolution;
use Asantibanez\LivewireCharts\Models\AreaChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
class EvolutionCharts extends Component
{
    use LivewireAlert;
//    public $types = ['8', 'food', 'shopping', 'entertainment', 'travel', 'other'];
//    public $colors = [
//        'food' => '#f6ad55',
//        'shopping' => '#fc8181',
//        'entertainment' => '#90cdf4',
//        'travel' => '#66DA26',
//        'other' => '#cbd5e0',
//    ];
    public $firstRun = true;
    public $showAdd = false;
    public $afterYear = true;

    public $child, $child_id, $user_id, $team_id;
    public $month = [1,2,3,4,5,6,7,8,9,10,12];
    public $selectAge, $inputAge, $age;
    public $growth, $weight;

    public function changeAge()
    {
        $this->afterYear = !$this->afterYear;
    }

    public function add()
    {
        $this->resetValues();
        $this->showAdd = true;
    }

    private function resetValues()
    {
        $this->selectAge = null;
        $this->inputAge = '';
        $this->growth = '';
        $this->weight = '';
    }

    public function store()
    {
        if(!$this->child_id) {
            $this->alert('warning', 'Child not selected', [
                'position' => 'center',
            ]);
        }
        else {
            if($this->afterYear) {
                $this->validate([
                    'selectAge' => 'required|numeric',
                    'growth' => 'required|numeric',
                    'weight' => 'required|numeric',
                ]);
                $this->age = $this->selectAge;
            }
            else {
                $this->validate([
                    'inputAge' => 'required|numeric|min:1',
                    'growth' => 'required|numeric',
                    'weight' => 'required|numeric',
                ]);
                $this->age = $this->inputAge * 12;
            }

            Evolution::updateOrCreate(
//                ['id' => $this->health_id],
                [
                'age_month' => $this->age,
                'growth' => $this->growth,
                'weight' => $this->weight,
                'children_id' => $this->child_id,
            ]);

            $this->alert('success',
            'Data has been added',
                [
                    'position' => 'center',
                ]);
        }

        $this->showAdd = false;
    }

    public function cancel()
    {
        $this->clearValidation();
        $this->showAdd = false;
    }



    public function render()
    {
        $data = ChildController::data();
        $this->child = $data['child'];
        if($this->child) {
            $this->child_id = $this->child->id;
            $this->team_id = $data['team_id'];
            $this->user_id = $data['user']->id;

//            $this->showAdd = false;

            $evolution = Evolution::where('children_id', $this->child_id)
                ->orderBy('age_month', 'asc')
                ->get();

            if($evolution->count() > 0) {
                $ChartModel = $evolution
                    ->reduce(function (LineChartModel $lineChartModel, $data) use ($evolution) {

                        $lineChartModel->addSeriesPoint('Growth',
//                    $data->age_month,
                            $data->age_month > 12 ? round($data->age_month / 12, 1) . ' year' : $data->age_month . ' month',
                            $data->growth, ['id' => $data]);
                        $lineChartModel->addSeriesPoint('Weight',
//                    $data->age_month,
                            $data->age_month > 12 ? round($data->age_month / 12, 1) . ' year' : $data->age_month . ' month',
                            $data->weight, ['id' => $data]);

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
        }

        $this->showAdd = true;
        return view('livewire.no-chart-evolution');
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
