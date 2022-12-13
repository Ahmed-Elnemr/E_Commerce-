<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Livewire;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $categories = Category::orderBy('id', 'asc');
        return view('livewire.admin.category.index', [
            'categories' => $categories->paginate(4) ,
        ]);
    }
}
