@extends('layouts.admin')

@section('header')
    <h1>Daftar Mata Pelajaran</h1>
    <p>Selamat datang di halaman daftar mata pelajaran!</p>
    <a href="{{ route('mapel.create') }}" class="btn btn-success mb-3">+ Tambah mata pelajaran</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="userTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mata Pelajaran</th>
                        <th>Kode</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapel as $m)
                        <tr>
                            <td>{{ $m->id }}</td>
                            <td>{{ $m->nama_mapel }}</td>
                            <td>{{ $m->kode_mapel }}</td>
                            <td>
                                <a href="{{ route('mapel.edit.show', $m->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('mapel.delete', $m->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus?')"
                                        class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection