<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Livewire;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $category_id;
    //get CategoryId
    public function deleteCategory($category_id)
    {
        // dd($category_id);
        $this->category_id = $category_id;
    }
    //dlete Category by $category_id
    public function destroyCategory(){
        $category=Category::find($this->category_id);
        $path='uploads/categorys/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        session()->flash('message', 'Category deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
    }



    ///render category
    public function render()
    {
        $categories = Category::orderBy('id', 'asc');
        return view('livewire.admin.category.index', [
            'categories' => $categories->paginate(4),
        ]);
    }
}
