<?php

namespace App\Http\Livewire\Public;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Books extends Component
{

    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
    }
    use WithPagination;
    // protected $paginationTheme = 'bootstrap';

    public function render()
    {
        if ($this->sorting == 'date') {
            $data['books'] = Book::orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } elseif ($this->sorting == 'by_asc') {
            $data['books'] = Book::orderBy('title', 'ASC')->paginate($this->pagesize);
        } elseif ($this->sorting == 'by_desc') {
            $data['books'] = Book::orderBy('title', 'DESC')->paginate($this->pagesize);
        } else {
            $data['books'] = Book::paginate($this->pagesize);
        }
        return view('livewire.public.books', $data);
    }
}
