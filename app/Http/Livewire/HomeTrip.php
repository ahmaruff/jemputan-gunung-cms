<?php

namespace App\Http\Livewire;

use App\Models\Destinasi;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Paket;

class HomeTrip extends Component
{
    use WithPagination;
    public $search;
    public $queryString = [
        'search' => ['except' => ''],
    ];
    protected $paginationTheme = 'bootstrap';

    public function updatedsearch(){
        $this->resetPage();
    }
    public function render()
    {
        $paket = Paket::query();

        if($this->search) {
            $paket->where('judul', 'like', '%'.$this->search.'%')
            ->orWhere('penjemputan', 'like', '%'.$this->search.'%')
            ->orWhere('harga', 'like', '%'.$this->search.'%' )
            ->orWhere('durasi', 'like', '%'.$this->search.'%' )
            ->orWhereHas('destinasi', function($query){
                $query->where('nama', 'like', '%'.$this->search.'%');
            });
        }


        // $paket->paginate(2);

        // dd($paket->toSql());
        // dd($paket->get());

        $d = Destinasi::all();
        $data = [
            'paket' => $paket->paginate(10),
            'destinasi_list' => $d,
        ];
        // dd($data);
        return view('livewire.home-trip', $data);
    }
}
