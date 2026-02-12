@extends('layouts.admin')

@section('header')
    <h1>Daftar Ruangan</h1>
    <p>Selamat datang di halaman daftar ruangan!</p>
    <a href="{{ route('ruangan.create') }}" class="btn btn-success mb-3">+ Tambah data ruangan</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="userTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Ruangan</th>
                        <th>Penanggung Jawab</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ruangan as $r)
                        <tr>
                            <td>{{ $r->id }}</td>
                            <td>{{ $r->nama_ruangan }}</td>
                            <td>{{ $r->guru->nama_guru }}</td>
                            <td>
                                <a href="{{ route('ruangan.edit.show', $r->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('ruangan.detail', $r->id) }}" class="btn btn-info">Detail</a>
                                <form action="{{ route('ruangan.delete', $r->id) }}" method="POST"
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
