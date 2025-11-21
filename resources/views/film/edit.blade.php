<x-app-layout>
    <div class="container">
        <h1>Edit Film</h1>

        <form action="{{ route('film.update', $film->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $film->judul }}">
            </div>

            <div class="mb-3">
                <label>Genre</label>
                <input type="text" name="genre" class="form-control" value="{{ $film->genre }}">
            </div>

            <div class="mb-3">
                <label>Tahun</label>
                <input type="number" name="tahun" class="form-control" value="{{ $film->tahun }}">
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ $film->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label>Poster Film (ganti opsional)</label><br>
                @if($film->poster)
                <img src="/poster/{{ $film->poster }}" width="100">
                @endif
                <input type="file" name="poster" class="form-control mt-2">
            </div>

            <button class="btn btn-primary">Perbarui</button>
        </form>
    </div>
</x-app-layout>