<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ChildController;
use App\Models\Health;
use App\Models\Documents;
use App\Models\Image;
use Cassandra\Rows;
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
    public $showingEditModal = false;
    public $showImage = true;
//    public $count = 0, $countMax = 0;

    public $child, $child_id, $user_id, $team_id, $path, $title, $category;

    public $imagesChild;
    public $indexImage = 0;

    public $documents, $documents_id;

    public $test_documents, $test_documents_id, $imagePreview;//, $test_child_id;

//    public $imagePreview;

    // Table Start
    public function query(): Builder
    {
        $this->getData();

        if($this->child) {
//            $id = $this->child->id;
//            $this->child_id = $id;
            $this->child_id = $this->child->id;
            $this->setPreview();

            $this->documents =
                Documents::where('children_id', $this->child_id)
                    ->first();

            if($this->documents)
                $this->setImages();

            return Documents::query()->where('children_id', $this->child_id);
//            return Documents::query()->where('children_id', $id);
        }
        else{
            return Documents::query()->where('children_id', 0);
        }
    }

    private function setPreview()
    {
        $documents =
            Documents::where('children_id', $this->child_id)->pluck('id');
        for ($i=0; $i< $documents->count(); $i++)
        {
            $this->imagePreview[$documents[$i]] =
                Image::where('documents_id', $documents[$i])
                    ->orderBy('updated_at', 'desc')
                    ->value('path');
        }
    }

    private function setImages()
    {
        $this->documents_id =
            Documents::where('children_id', $this->child_id)
                ->value('id');
        $this->imagesChild =
            Image::where('documents_id', $this->documents_id)
                ->orderBy('updated_at', 'desc')
                ->get();
        $this->countMax = $this->imagesChild->count();
    }

    private function getData()
    {
        $data = ChildController::data();
        $this->child = $data['child'];
        $this->team_id = $data['team_id'];
        $this->user_id = $data['user']->id;
    }

    public function columns(): array
    {
        return [
//            Column::make('#', 'id')->sortable(),
            Column::make('Category','category')->sortable()->searchable(),
            Column::make('Preview')
                ->render(fn(Documents $documents) => view('livewire.image-preview',
                    ['preview' => $this->imagePreview, 'id' => $documents->id])),
            Column::make('Created', 'created_at')->sortable()->format(fn(Carbon $v) => $v->diffForHumans()),

            Action::make()->hideEditButton(),
        ];
    }


    public string $defaultSortColumn = 'updated_at';

    public string $defaultSortDirection = 'desc';

    public array $perPageOptions = [5, 10, 15, 20];

    public int $perPage = 5;
//
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
//
    public function newResource(){}

    public function show($rowId)
    {
        $this->count = 0;
        $documents = Documents::where('id', $rowId)->get();
        $category = $documents->value('category');
        $documents_id = $documents->value('id');
        $this->imagesChild =
            Image::where('documents_id', $documents_id)
                ->where('category', $category)->get();
        $this->countMax = $this->imagesChild->count();
    }

//    public function countMinus()
//    {
//        if($this->count == 0)
//            $this->count = $this->countMax-1;
//        else
//            $this->count--;
//    }
//
//    public function countPlus()
//    {
//        if($this->count == $this->countMax-1)
//            $this->count = 0;
//        else
//            $this->count++;
//    }
//
//    //    public bool $debugEnabled = true;
//    //Table End
//
//    //Modal Start
    public function showModal(){
        if($this->child_id) {
            $this->showingModal = true;
        }
        else {
            $this->alert('warning', 'Child not selected', [
                'position' => 'center',
            ]);
        }
    }

    public function showEditModal(){
        if($this->child_id) {
            $this->showingEditModal = true;
        }
        else {
            $this->alert('warning', 'Child not selected', [
                'position' => 'center',
            ]);
        }
    }
//
    public function store()
    {
        $image = $this->validate([
            'path' => 'image|max:2048', // 2MB Max
            'title' => 'required',
            'category' => 'required',
//                'children_id' => $this->child_id,
        ]);

        $image['path'] = $this->path->store('imageDocs');
        $documents = Documents::where('category', $this->category)
                            ->where('children_id', $this->child_id);

        if($documents->value('category'))
        {
            $image['documents_id'] = $documents->value('id');
            Image::updateOrCreate($image);
        }
        else{
            Documents::create([
                'category' => $this->category,
                'children_id' => $this->child_id,
            ]);
            $documents = Documents::where('category', $this->category)
                                ->where('children_id', $this->child_id);
            $image['documents_id'] = $documents->value('id');
            Image::updateOrCreate($image);
        }

        $this->documents = Documents::where('children_id', $this->child_id)
            ->first();

        $this->query();

//            dd($this->documents, $this->child_id);
//
//            $this->documents_id = $this->documents_id->value('id');
//            $this->imagesChild =
//                Image::where('documents_id', $this->documents_id)->get();
//            $this->countMax = $this->imagesChild->count();
//                dd('Documents::where( $this->category)->get()');

//            $image['documents_id'] = $this->documents_id;

//            $image['path'] = $this->path->store('imageDocs');

//            Image::updateOrCreate($image);

//            Health::updateOrCreate(['id' => $this->health_id], [
//                'first_name' => $this->first_name,
//                'last_name' => $this->last_name,
//                'specialization' => $this->specialization,
//                'meeting' => $this->meeting,
//                'children_id' => $this->child_id,
//            ]);
//            $this->query()->make();

            $this->alert('success',
                $this->documents_id ?
                    'Documents to ' . $this->title . ' updated.' :
                    'Documents to ' . $this->title. ' created.', [
                    'position' => 'center',
                ]);
//        }

        $this->resetModal();

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
        $this->showingEditModal = false;

        $this->resetModal();
    }
//
    private function resetModal(){
        $this->documents_id = 0;
        $this->title = '';
        $this->category = '';
        $this->path = '';
        $this->children_id = 0;
    }
//    //Modal End

    public function editImage($id)
    {
        dump('EditImage= ', $id);
//        $health = Health::findOrFail($id);
//        $this->health_id = $id;
//        $this->first_name = $health->first_name;
//        $this->last_name = $health->last_name;
//        $this->specialization = $health->specialization;
//        $this->meeting = $health->meeting;
//        $this->children_id = $health->children_id;
//
//        $this->showModal();
    }

    public function showImage($id)
    {
        $this->alert('success',
            'edit ' . $id, [
                'position' => 'center',
            ]);
    }
}
