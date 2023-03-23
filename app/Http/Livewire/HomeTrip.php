<?php

namespace App\Http\Livewire;

use App\Models\Destinasi;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Paket;

class HomeTrip extends Component
{
    use WithPagination;
    public $judul;
    public $penjemputan;
    public $destinasi;
    public $queryString = [
        'judul'=>['except'=>''],
        'penjemputan'=>['except'=>''],
        'destinasi'=>['except'=>''],
    ];
    protected $paginationTheme = 'bootstrap';

    public function updatedsearch(){
        $this->resetPage();
    }
    public function render()
    {
        $paket = Paket::query();

        if($this->judul){
            $paket->where('judul', 'like', '%'.$this->judul.'%');
        }

        if($this->penjemputan){
            $paket->where('penjemputan', 'like', $this->penjemputan);
        }

        if($this->destinasi){
            $paket->whereHas('destinasi', function($query){
                $query->where('destinasis.id', $this->destinasi);
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
