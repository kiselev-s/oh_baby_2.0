<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ChildController;
use App\Models\Documents;
use App\Models\Image;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Luckykenlin\LivewireTables\Views\Action;
use Luckykenlin\LivewireTables\Views\Boolean;
use Luckykenlin\LivewireTables\Views\Column;
use Luckykenlin\LivewireTables\LivewireTables;

class DocumentsTable extends LivewireTables
{
    use LivewireAlert;
    use WithFileUploads;

    public $rowId, $imageId;

    public $showingModal = false;
    public $showingEditModal = false;
    public $showingEditImageModal = false;
    public $showImage = true;

    public $child, $child_id, $user_id, $team_id, $path, $title, $category;

    public $imagesChild, $countMax, $imagePreview;
    public $indexImage = 0;
    public $image_id = -1;

    public $document, $document_id, $documents, $documents_id;

    // Table Start
    public function query(): Builder
    {
        $this->getData();

        if($this->child) {
            $this->child_id = $this->child->id;
            $this->setPreview();

            $this->documents =
                Documents::where('children_id', $this->child_id)->get();
            $this->document = $this->documents->first();

            if($this->document)
                $this->setImages();

            return Documents::query()->where('children_id', $this->child_id);
        }
        else{
            return Documents::query()->where('children_id', 0);
        }
    }

    public function columns(): array
    {
        return [
            Column::make('Category','category')
                ->sortable()
                ->searchable(),
            Column::make('Preview')
                ->render(fn(Documents $documents) => view('livewire.preview.image-preview',
                    ['preview' => $this->imagePreview, 'id' => $documents->id])),
//            Column::make('Updated', 'updated_at')
            Column::make('Created', 'created_at')
                ->sortable()
                ->format(fn(Carbon $v) => $v->diffForHumans()),
            Column::make('', 'selected')
                ->render(fn(Documents $documents) => view('livewire.preview.true-preview',
                    ['selected' => $documents->selected])),

            Action::make()->hideEditButton(),

        ];
    }

//    public string $defaultSortColumn = 'updated_at';
    public string $defaultSortColumn = 'created_at';
    public string $defaultSortDirection = 'desc';
    public array $perPageOptions = [5, 10, 15, 20];
    public int $perPage = 5;
//
    public function submitDelete($rowId) // удаление из таблицы
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
        'confirmed',
        'confirmedDeleteImage',
    ];

    public function submitDeleteImage($Id)
    {
        $this->imageId = $Id;

        $this->alert('question', 'Are you sure?', [
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText'=>'Delete',
            'onConfirmed'=> 'confirmedDeleteImage',
            'showCancelButton' => true,
            'timer' => null,
        ]);
    }

    public function confirmedDeleteImage()
    {
        $title_image = Image::where('id', $this->imageId)->value('title');
        Image::find($this->imageId)->delete();

        $this->alert('success', 'Image ' . $title_image . ' deleted', [
            'position' => 'center',
        ]);

        $this->query();
        $this->showingEditImageModal = false;
    }

    public function newResource(){}

    public function show($rowId) //показать карусель выбраной категории
    {
        $documents = $this->setDocsSelectedTrue($rowId);
        $this->imagesChild =
            Image::where('documents_id', $documents->id)
                ->where('category', $documents->category)
                ->orderBy('updated_at', 'desc')
                ->get();
        $this->countMax = $this->imagesChild->count();
    }
//
//    //    public bool $debugEnabled = true;
//    //Table End
//
//    //Modal Start
    public function showModal(){ // добавить документ
        if($this->child_id) {
            $this->showingModal = true;
        }
        else {
            $this->alert('warning', 'Child not selected', [
                'position' => 'center',
            ]);
        }
    }

    public function showEditDocsModal($id){ // редактировать документ
        if($this->child_id) {
            $this->imagesChild =
                Image::where('documents_id', $id)
                    ->orderBy('updated_at', 'desc')
                    ->get();
            $this->category = $this->imagesChild->value('category');
            $this->show($id);
            $this->showingEditModal = true;
            $this->document_id = $id;
        }
        else {
            $this->alert('warning', 'Child not selected', [
                'position' => 'center',
            ]);
        }
    }

    public function showEditImage($id) // редактировать изображение
    {
        $this->image_id = $id;
        $this->title = $this->imagesChild[$id]->title;
        $this->category = $this->imagesChild->value('category');
        $this->showingEditImageModal = true;
    }

    public function store() // сохранить новый документ
    {
        $image = $this->validate([
            'path' => 'image|max:2048', // 2MB Max
            'title' => 'required',
            'category' => 'required',
        ]);

        $image['path'] = $this->path->store('imageDocs');
        $documents = $this->getDocsByCategory();

        if($documents->value('category')){
            $image['documents_id'] = $documents->value('id');
            Image::updateOrCreate($image);
        }
        else{
            $this->createDocument();
            $documents = $this->getDocsByCategory();
            $image['documents_id'] = $documents->value('id');
            Image::updateOrCreate($image);
        }

        $this->document = Documents::where('children_id', $this->child_id)
            ->first();

        $this->query();

        $this->alert('success',
            $this->documents_id ?
                'Documents to ' . $this->title . ' updated.' :
                'Documents to ' . $this->title. ' created.', [
                'position' => 'center',
            ]);

        $this->resetModal();

        $this->showingModal = false;
    }

    public function cancel()
    {
        $this->showingModal = false;
        $this->showingEditModal = false;
        $this->showingEditImageModal = false;
        $this->image_id = -1;

        $this->resetModal();
    }

    public function cancelEditImage()
    {
        $this->showingEditImageModal = false;
        $this->image_id = -1;
        if(!$this->showingEditModal)
            $this->resetModal();
    }

    private function resetModal(){
        $this->documents_id = 0;
        $this->title = '';
        $this->category = '';
        $this->path = '';
        $this->children_id = 0;
    }
//    //Modal End

    public function saveEditedImage($id)
    {
        $image = $this->validate([
            'title' => 'required',
            'category' => 'required',
        ]);
        $image['documents_id'] = $this->documents->where('category', $image['category'])->value('id');
        $image['path'] = Image::where('id', $id)->value('path');
        Image::updateOrCreate(['id' => $id], $image);

        $this->showingEditImageModal = false;
        $this->setImages();
        $this->query();
    }

    public function saveEditedDocuments()
    {
        if($this->category === "") { //если пустая категория
            $this->alert('warning', 'Select or enter a category', [
                'position' => 'center',
            ]);
        }
        else if(Documents::where('category', $this->category)->get()->count() === 0){ //если новая категория
            $this->createDocument();
            $new_document_id = $this->getDocsIdByCategory();

            $this->storeImage($new_document_id);
            $this->query();

            $this->showingEditModal = false;
        }
        else { //если смена категории на существующую
            $new_document_id = $this->getDocsIdByCategory();
            $this->storeImage($new_document_id);
            $this->showingEditModal = false;
        }
    }

    private function setPreview() // превью в таблице
    {
        $documents = Documents::where('children_id', $this->child_id)
            ->pluck('id');
        for ($i = 0; $i < $documents->count(); $i++)
        {
            $this->imagePreview[$documents[$i]] =
                Image::where('documents_id', $documents[$i])
                    ->orderBy('updated_at', 'desc')
                    ->value('path');
        }
    }

    private function setImages() // карусель изображений
    {
        $this->documents_id =
            Documents::where('children_id', $this->child_id)
                ->where('selected', true)
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

    private function storeImage($new_document_id) // переместить изображение в другую категорию
    {
        foreach ($this->imagesChild as $image){
            $image['documents_id'] = $new_document_id;
            $image['category'] = $this->category;
            Image::updateOrCreate(['id' => $image->id], $image->toArray());
        }
        $images = Image::where('documents_id', $this->document_id)->get()->toArray();
        count($images) === 0 ? Documents::find($this->document_id)->delete() : '';
//        if(count($images) === 0)
//            Documents::find($this->document_id)->delete();
    }

    private function createDocument()
    {
        Documents::create([
            'category' => $this->category,
            'children_id' => $this->child_id,
            'selected' => true,
        ]);

        $this->setDocsSelectedFalse();
    }

    private function getDocsIdByCategory(): int
    {
        return Documents::where('category', $this->category)
            ->where('children_id', $this->child_id)
            ->value('id');
    }

    private function getDocsByCategory()
    {
        return Documents::where('category', $this->category)
            ->where('children_id', $this->child_id);
    }

    private function setDocsSelectedFalse()
    {
        if($this->documents != null) {
            foreach ($this->documents as $document) {
                $document['selected'] = false;
                Documents::updateOrCreate(['id' => $document->id], $document->toArray());
            }
        }
    }

    private function setDocsSelectedTrue($id)
    {
        $this->setDocsSelectedFalse();
        $document = Documents::find($id);
        $document['selected'] = true;
        Documents::updateOrCreate(['id' => $document->id], $document->toArray());

        return $document;
    }
}
