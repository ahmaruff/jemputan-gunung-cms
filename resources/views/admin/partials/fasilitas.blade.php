<div class="card" id="fasilitas-list">
    <div class="card-header d-flex align-items-center">
        <h1 class="card-title">Fasilitas</h1>
        <div class="ms-auto d-flex gap-2">
            <input type="text" class="form-control fuzzy-search" placeholder="Search data">
            <div class="dropdown">
                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-sort-down me-1"></i>
                    Sort by
                </button>
                <div class="dropdown-menu">
                    <button class="sort dropdown-item" data-sort="id">ID</button>
                    <button class="sort dropdown-item" data-sort="nama">Nama</button>
                </div>
            </div>
            <a href="/admin/trip/fasilitas/create" class="btn btn-primary">
                <i class="bi bi-plus me-1"></i>
                Tambah
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-vcenter">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($fasilitas as $fasilitas_item)
                        <tr>
                            <td class="id">{{ $fasilitas_item->id }}</td>
                            <td class="nama">{{ $fasilitas_item->nama }}</td>
                            <td>{{ $fasilitas_item->keterangan }}</td>
                            <td>
                                <div class="btn-list">
                                    <a href="/admin/trip/fasilitas/{{$fasilitas_item->id}}" class="btn btn-primary btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="/admin/trip/fasilitas/{{$fasilitas_item->id}}/edit" class="btn btn-warning btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="bi bi-pen-fill"></i>
                                    </a>
                                    <a href="/admin/trip/fasilitas/{{$fasilitas_item->id}}/delete" class="btn btn-danger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="hr-text hr-text-left">
                <span>Page</span>
                <ul class="pagination m-0 p-0 d-flex gap-2 justify-content-center"></ul>
            </div>
        </div>
    </div>
</div>
<script>
    var fasilitasOptions = {
        valueNames:['id', 'nama', 'ket'],
        page:15,
        pagination: true,
    }

    fasilitasList = new List('fasilitas-list',fasilitasOptions);
</script>