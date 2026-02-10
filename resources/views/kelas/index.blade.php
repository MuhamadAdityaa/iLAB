@extends('layouts.admin')

@section('header')
    <h1>Daftar Kelas</h1>
    <p>Selamat datang di halaman daftar kelas!</p>
    <a href="{{ route('kelas.create') }}" class="btn btn-success mb-3">+ Tambah data kelas</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table id="userTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jurusan</th>
                        <th>Tingkat</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelas as $k)
                        <tr>
                            <td>{{ $k->id }}</td>
                            <td>{{ $k->jurusan }}</td>
                            <td>{{ $k->tingkat }}</td>
                            <td>{{ $k->kelas }}</td>
                            <td>
                                <a href="{{ route('kelas.edit.show', $k->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('kelas.delete', $k->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus?')"
                                        class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data kelas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
