<?php
namespace App\Http\Livewire;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;
class UploadPhoto extends Component
{
    use WithFileUploads;

    public $title, $category, $view, $children_id;

    public function submit()
    {
        $dataValid = $this->validate([
            'view' => 'image|max:2048', // 2MB Max
            'title' => 'required',
            'category' => 'required',
            'children_id' => 'required',
        ]);

        $dataValid['view'] = $this->view->store('photos');

        Image::create($dataValid);
    }
    public function render()
    {
        return view('livewire.upload-photo');
    }

    public function export()
    {
        $image = Image::where('id', '52')->value('view');
        dd($image);
        return Storage::disk('exports')->download('export.jpg', 'name', );
    }

}
