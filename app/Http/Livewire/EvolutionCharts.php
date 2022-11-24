<?php
namespace App\Http\Livewire;
use App\Http\Controllers\ChildController;
use App\Models\Evolution;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
class EvolutionCharts extends Component
{
    use LivewireAlert;

    public $firstRun = true;
    public $showAdd = false;
    public $afterYear = true;
    public $showingEvolData = false;

    public $child, $child_id, $child_name, $user_id, $team_id;
    public $month = [1,2,3,4,5,6,7,8,9,10,12];
    public $selectAge, $inputAge, $age;
    public $growth, $weight, $evolutionGrowth, $evolutionWeight, $evolutionDateCreate;

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
        $this->child_name = $data['child_name'];
        if($this->child) {
            $this->child_id = $this->child->id;
            $this->team_id = $data['team_id'];
            $this->user_id = $data['user']->id;

            $evolution = Evolution::where('children_id', $this->child_id)
                ->orderBy('age_month', 'asc')
                ->get();

            if($evolution->count() > 0) {
                $ChartModel = $evolution
                    ->reduce(function (LineChartModel $lineChartModel, $data) use ($evolution) {

                        $lineChartModel->addSeriesPoint('Growth',
                            $data->age_month > 12 ? round($data->age_month / 12, 1) . ' year' : $data->age_month . ' month',
                            $data->growth, $data);
                        $lineChartModel->addSeriesPoint('Weight',
                            $data->age_month > 12 ? round($data->age_month / 12, 1) . ' year' : $data->age_month . ' month',
                            $data->weight, $data);

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
        return view('livewire.components.no-chart-evolution');
    }

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
    ];

    public function handleOnPointClick($point)
    {;
        $this->evolutionGrowth = $point['extras']['growth'];
        $this->evolutionWeight = $point['extras']['weight'];
        $this->evolutionDateCreate = stristr($point['extras']['created_at'], 'T', true);
        $this->showingEvolData = true;
    }

    public function cancelShowingEvolData()
    {
        $this->showingEvolData = false;
    }
}
