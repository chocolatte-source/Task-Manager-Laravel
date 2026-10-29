<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 500px;">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h3 class="card-title text-center mb-4">Edit Tugas</h3>

                <form action="/update/{{ $task->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Tugas Baru:</label>
                        <input type="text" name="tugas" class="form-control" value="{{ $task->nama_tugas }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>