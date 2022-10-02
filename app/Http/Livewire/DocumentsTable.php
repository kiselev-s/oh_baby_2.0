<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ChildController;
use App\Models\Health;
use App\Models\Image;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Luckykenlin\LivewireTables\Views\Action;
use Luckykenlin\LivewireTables\Views\Column;
use Luckykenlin\LivewireTables\LivewireTables;

class DocumentsTable extends LivewireTables
{
    use LivewireAlert;

    use WithFileUploads;

    public $rowId;

    public $showingModal = false;

    public $health_id, $first_name, $last_name, $specialization, $meeting, $child_id, $user_id, $team_id;

    public $showImage = true;

    public $path, $title, $category;

    public $imagesChild;

    public $count = 0, $countMax = 0;

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

            $this->imagesChild =
                Image::where('children_id', $this->child_id)->get();

            $this->countMax = $this->imagesChild->count();

            return Image::query()
                ->where('children_id', $id);
//                ->orderBy('meeting', 'desc')->getQuery();
        }
        else{
            return Image::query()->where('children_id', 0);
        }
//        return Image::query();
    }

    public function columns(): array
    {
        return [
            Column::make('#', 'id')->sortable(),
            Column::make('Title','title')->sortable()->searchable(),
//            Column::make('Category','category')->sortable()->searchable(),
            Column::make('children_id')->sortable()->searchable(),
//            Column::make('created_at')->format(fn(Carbon $v) => $v->diffForHumans()),

            Action::make(),
        ];
    }

//
//    public string $defaultSortColumn = 'meeting';
//
//    public string $defaultSortDirection = 'desc';
//
//    public function submitDelete($rowId)
//    {
//        $this->rowId = $rowId;
//
//        $this->alert('question', 'Are you sure?', [
//            'position' => 'center',
//            'showConfirmButton' => true,
//            'confirmButtonText'=>'Delete',
//            'onConfirmed'=> 'confirmed',
//            'showCancelButton' => true,
//            'timer' => null,
//        ]);
//    }
//
//    public function confirmed()
//    {
//        $this->delete($this->rowId);
//    }
//
//    protected $listeners = [
//        'confirmed'
//    ];
//
    public function newResource(){}

    public function show($rowId)
    {
        $title = Image::where('id', $rowId)->value('title');

        $this->imagesChild =
            Image::where('children_id', $this->child_id)
                ->where('title', $title)->get();

        $this->countMax = $this->imagesChild->count();
    }

    public function countMinus()
    {
        if($this->count == 0)
            $this->count = $this->countMax-1;
        else
            $this->count--;
    }

    public function countPlus()
    {
        if($this->count == $this->countMax-1)
            $this->count = 0;
        else
            $this->count++;
    }
//
//    //    public bool $debugEnabled = true;
//    //Table End
//
//    //Modal Start
    public function showModal(){
        $this->showingModal = true;
    }
//
    public function store()
    {
        if(!$this->child_id) {
            $this->alert('warning', 'Child not selected', [
                    'position' => 'center',
                ]);
        }
        else {
            $image = $this->validate([
                'path' => 'image|max:2048', // 2MB Max
                'title' => 'required',
                'category' => 'required',
//                'children_id' => $this->child_id,
            ]);

            $image['children_id'] = $this->child_id;

            $image['path'] = $this->path->store('imageDocs');

            Image::updateOrCreate($image);

//            Health::updateOrCreate(['id' => $this->health_id], [
//                'first_name' => $this->first_name,
//                'last_name' => $this->last_name,
//                'specialization' => $this->specialization,
//                'meeting' => $this->meeting,
//                'children_id' => $this->child_id,
//            ]);

            $this->alert('success',
                $this->health_id ?
                    'Documents to ' . $this->title . ' updated.' :
                    'Documents to ' . $this->title. ' created.', [
                    'position' => 'center',
                ]);
        }

//        $this->resetModal();

        $this->showingModal = false;
    }
//
//    public function edit($id)
//    {
//        $health = Health::findOrFail($id);
//        $this->health_id = $id;
//        $this->first_name = $health->first_name;
//        $this->last_name = $health->last_name;
//        $this->specialization = $health->specialization;
//        $this->meeting = $health->meeting;
//        $this->children_id = $health->children_id;
//
//        $this->showModal();
//    }
//
    public function cancel()
    {
        $this->showingModal = false;

//        $this->resetModal();
    }
//
//    private function resetModal(){
//        $this->health_id = 0;
//        $this->first_name = '';
//        $this->last_name = '';
//        $this->specialization = '';
//        $this->meeting = null;
//        $this->children_id = 0;
//    }
//    //Modal End
}
