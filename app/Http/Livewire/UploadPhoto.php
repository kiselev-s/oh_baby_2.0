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
        $image = $this->validate([
            'path' => 'image|max:2048', // 2MB Max
            'title' => 'required',
            'category' => 'required',
            'children_id' => 'required',
        ]);

        $image['view'] = $this->view->store('imageDocs');

        Image::create($image);
    }
    public function render()
    {
        return view('livewire.upload-photo');
    }

}
