<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Task Manager</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <div class="container my-5" style="max-width: 650px;">
        <div class="card shadow border-0 rounded-3">
            <div class="card-body p-4">
                
                <h2 class="card-title text-center fw-bold text-primary mb-4">
                    <i class="bi bi-check2-square"></i> Task Manager
                </h2>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/tambah" method="POST" class="mb-4">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="tugas" class="form-control form-control-lg" placeholder="Ketik nama tugas baru..." required>
                        <button type="submit" class="btn btn-primary px-4 fw-bold">
                            <i class="bi bi-plus-lg me-1"></i> Simpan
                        </button>
                    </div>
                </form>

                <hr class="my-4">

                <form action="/" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama tugas..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="bi bi-search"></i> Cari
                        </button>
                        @if(request('search'))
                            <a href="/" class="btn btn-outline-danger">Reset</a>
                        @endif
                    </div>
                </form>

                <h5 class="fw-bold mb-3">Daftar Tugas</h5>

                <ul class="list-group mb-3 shadow-sm">
                    @forelse ($tasks as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <span class="fw-semibold text-dark">{{ $item->nama_tugas }}</span>
                            
                            <div class="btn-group">
                                <a href="/edit/{{ $item->id }}" class="btn btn-sm btn-outline-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <form action="/hapus/{{ $item->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger ms-1" onclick="return confirm('Yakin ingin menghapus tugas ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <div class="text-center py-4 text-muted bg-white border rounded">
                            <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                            <p class="mb-0">Tidak ada data tugas yang ditemukan.</p>
                        </div>
                    @endforelse
                </ul>

                <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                     Menampilkan <b>{{ $tasks->firstItem() ?? 0 }}</b> - <b>{{ $tasks->lastItem() ?? 0 }}</b> dari <b>{{ $tasks->total() }}</b> tugas
                </small>
    
                    <div>
                    {{ $tasks->withQueryString()->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>