<?php

namespace App\Http\Livewire;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithPagination;

class HomeBlog extends Component
{
    use WithPagination;
    public $search;
    public $category;
    public $queryString = ['search'=>['except'=>'']];
    protected $paginationTheme = 'bootstrap';

    public function updatedsearch(){
        $this->resetPage();
    }

    public function render()
    {
        $posts = BlogPost::query();
        
        if($this->search){
          $posts->where('title', 'like', '%'.$this->search.'%');
        }

        $segment = request()->segment(2);
        $categories = BlogCategory::all();
        foreach($categories as $cat) {
            if($segment == $cat->slug){
                $posts->whereHas('category', function($query) use ($segment){
                    $query->where('slug', $segment);
                });
            }
        }

        $data = [
            'posts' => $posts->paginate(15),
        ];
        // dd($data);
        return view('livewire.home-blog', $data);
    }
}
