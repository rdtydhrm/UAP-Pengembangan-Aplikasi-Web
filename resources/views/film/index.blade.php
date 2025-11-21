<x-app-layout>
    <div class="container">
        <h1>Daftar Film</h1>

        <a href="{{ route('film.create') }}" class="btn btn-primary mb-3">Tambah Film</a>

        <table class="table">
            <tr>
                <th>Poster</th>
                <th>Judul</th>
                <th>Genre</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>

            @foreach($film as $f)
            <tr>
                <td>
                    @if($f->poster)
                    <img src="/poster/{{ $f->poster }}" width="70">
                    @else
                    <span>-</span>
                    @endif
                </td>

                <td>{{ $f->judul }}</td>
                <td>{{ $f->genre }}</td>
                <td>{{ $f->tahun }}</td>

                <td>
                    <a href="{{ route('film.edit', $f->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('film.destroy', $f->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>