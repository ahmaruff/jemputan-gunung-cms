<div class="container">
    <div class="my-4">
        <div class="form-action row g-3 justify-content-center">
            <div class="col-sm-12 col-md-6">
                <input wire:model="search" type="text" name="" class="form-control form-lg" placeholder="Search..." autofocus>
            </div>
        </div>
    </div>
    <hr class="my-5">
    <div class="container-fluid">
        <div class="row" data-masonry='{"percentPosition": true }'>
            @foreach ($paket as $item)
                <div class="card m-3 border-0 shadow-sm" style="width: 20rem;">
                    <div class="card-img-top" style="height:12rem; background-image: url('{{asset('storage/trip/img/'.$item->thumbnail)}}'); background-size:cover"></div>
                    {{-- <img src="{{asset('storage/trip/img/'.$item->thumbnail)}}" class="card-img-top" alt="thumbnail"> --}}
                    <div class="card-body">
                        <a href="/trip/{{$item->id}}" class="text-decoration-none link-dark">
                            <h3 class="fw-bold">{{ $item->judul }}</h3>
                        </a>
                        <div class="d-flex justify-content-between mb-1 pb-2 border-bottom">
                            <p class="m-0">
                                {{ $item->durasi }}
                            </p>
                            <h5 class="fw-bold m-0 text-primary text-end">
                                Rp. {{ $item->harga }} <span class="text-muted text-sm fw-light fs-6">/org</span>
                            </h5>
                        </div>
                        
                        <p class="text-muted text-truncate py-2">{{ $item->deskripsi }}</p>
                        <p>{{ $item->penjemputan }}</p>
                        <div class="">
                            <ul class="nav nav-tabs nav-fill" id="myTab{{$item->id}}" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="destinasi-list-tab{{$item->id}}" data-bs-toggle="tab" data-bs-target="#destinasi-tab-pane{{$item->id}}" type="button" role="tab" aria-controls="destinasi-tab-pane{{$item->id}}" aria-selected="true">Destinasi</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="fasilitas-list-tab{{$item->id}}" data-bs-toggle="tab" data-bs-target="#fasilitas-tab-pane{{$item->id}}" type="button" role="tab" aria-controls="fasilitas-tab-pane{{$item->id}}" aria-selected="false">Fasilitas</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTab{{$item->id}}Content">
                                <div class="tab-pane fade show active" id="destinasi-tab-pane{{$item->id}}" role="tabpanel" aria-labelledby="destinasi-list-tab{{$item->id}}" tabindex="0">
                                    <ul>
                                        @foreach ($item->destinasi as $des)
                                            <li>{{ $des->nama }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="fasilitas-tab-pane{{$item->id}}" role="tabpanel" aria-labelledby="fasilitas-list-tab{{$item->id}}" tabindex="0">
                                    <ul>
                                        @foreach ($item->fasilitas as $fas)
                                            <li>{{ $fas->nama }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                              </div> 
                        </div>
                    </div>
                    <div class="card-footer d-grid bg-white">
                        <a href="#" class="btn btn-success">Pesan Sekarang!</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="container">
            <div class="">{{ $paket->links('pagination::bootstrap-5') }}</div>
        </div>
    </div>
</div>