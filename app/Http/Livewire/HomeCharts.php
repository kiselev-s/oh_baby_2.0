<?php
namespace App\Http\Livewire;
use App\Http\Controllers\ChildController;
use App\Models\Evolution;
use Asantibanez\LivewireCharts\Models\AreaChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
class HomeCharts extends Component
{
//    public $types = ['food', 'shopping', 'entertainment', 'travel', 'other'];
    public $colors = [
        '0' => '#f6ad55',
        '1' => '#fc8181',
        '2' => '#90cdf4',
        '3' => '#66DA26',
        '4' => '#cbd5e0',
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

            $evolution = Evolution::where('children_id', $this->child_id)
                ->orderBy('age_month', 'asc')
                ->get();

//            $evolutions = DB::table('users')
//                ->where()
//                ->join('contacts', 'users.id', '=', 'contacts.user_id')
//                ->join('orders', 'users.id', '=', 'orders.user_id')
//                ->select('users.*', 'contacts.phone', 'orders.price')
//                ->get();

            $this->evolutions = DB::table('children')
                ->where('team_id', $this->team_id)
                ->join('evolutions', 'children.id', '=', 'evolutions.children_id')
//                ->join('orders', 'users.id', '=', 'orders.user_id')
                ->select('children.first_name', 'evolutions.weight', 'evolutions.id')
                ->get();

//            $latestPosts = DB::table('posts')
//                ->select('user_id', DB::raw('MAX(created_at) as last_post_created_at'))
//                ->where('is_published', true)
//                ->groupBy('user_id');

//            $this->evolutionsMax = DB::table('evolutions')
//                ->select('children_id', DB::raw('MAX(created_at) as last_post_created_at'))
////                ->where('is_published', true)
//                ->groupBy('children_id');

//            dd($this->evolutionsMax);

//            $this->children = DB::table('children')
//                ->joinSub($this->evolutionsMax, 'latest_posts', function ($join) {
//                    $join->on('children.id', '=', 'latest_posts.children_id');
//                })->get();
//
//            $this->children = DB::table('children')
//                ->where('team_id', $this->team_id)
//                ->joinSub($this->evolutionsMax, 'weight_max', function ($join) {
//                    $join->on('children.id', '=', 'weight_max.children_id');
//                })->get();

            if ($evolution->count() > 0) {
                $columnChartModel = $evolution->groupBy('id')
                    ->reduce(function (ColumnChartModel $columnChartModel, $data) {
                        $type = $data->first()->id;
                        $value = $data->first()->weight;
//                        return $columnChartModel->addColumn($type, $value, $this->colors[$type]);
                        return $columnChartModel->addColumn($type, $value, $this->colors[rand(0,4)]);

                    }, (new ColumnChartModel())
                        ->setTitle('Evolution by Weight')
                        ->setAnimated($this->firstRun)
                        ->withOnColumnClickEventName('onColumnClick')
                    );
                $pieChartModel = $evolution->groupBy('id')
                    ->reduce(function (PieChartModel $pieChartModel, $data) {
                        $type = $data->first()->id;
                        $value = $data->first()->weight;
                        return $pieChartModel->addSlice($type, $value, $this->colors[rand(0,4)]);
                    }, (new PieChartModel())
                        ->setTitle('Evolution by Weight')
                        ->setAnimated($this->firstRun)
                        ->withOnSliceClickEvent('onSliceClick')
                    );
                return view('livewire.home-charts')
                    ->with([
                        'columnChartModel' => $columnChartModel,
                        'pieChartModel' => $pieChartModel,
                    ]);
            }

            $this->firstRun = false;
            return view('livewire.no-chart');
        }
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
