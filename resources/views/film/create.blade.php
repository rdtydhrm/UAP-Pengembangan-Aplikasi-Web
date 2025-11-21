

<x-app-layout>
<div class="container">
    <h1>Tambah Film</h1>

    <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control">
        </div>

        <div class="mb-3">
            <label>Genre</label>
            <input type="text" name="genre" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Poster Film (opsional)</label>
            <input type="file" name="poster" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
</x-app-layout>