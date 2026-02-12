@extends('layouts.admin')

@section('header')
    <h1>Daftar Guru</h1>
    <p>Selamat datang di halaman daftar guru!</p>
    <a href="{{ route('guru.create') }}" class="btn btn-success mb-3">+ Tambah data guru</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="userTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{ dd($guru) }} --}}
                    @foreach ($guru as $g)
                        <tr>
                            <td>{{ $g->id }}</td>
                            <td>{{ $g->nama_guru }}</td>
                            <td>
                                <a href="{{ route('guru.edit.show', $g->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('guru.delete', $g->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus?')"
                                        class="btn btn-danger">Hapus</button>
                                </form>
                                <a href="{{ route('guru.detail', $g->id) }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
