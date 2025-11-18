@extends('layouts.admin')

@section('header')
    <h1>Daftar Jadwal</h1>
    <p>Selamat datang di halaman daftar Jadwal!</p>
    <a href="{{ route('jadwal.create') }}" class="btn btn-success mb-3">+ Tambah jadwal pelajaran</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="userTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Guru</th>
                        <th>Mapel</th>
                        <th>Ruangan</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- {{ dd($jadwal) }} --}}
                    {{-- Looping data jadwal --}}
                    @foreach ($jadwal as $j)
                        <tr>
                            <td>{{ $j->id }}</td>
                            <td>{{ $j->guru->nama_guru }}</td>
                            <td>{{ $j->mapel->nama_mapel }}</td>
                            <td>{{ $j->ruangan->nama_ruangan }}</td>
                            <td>{{ $j->hari->hari}}</td>
                            <td>{{ $j->waktu->jam_mulai }} - {{ $j->waktu->jam_selesai }}</td>
                            <td>{{ $j->kelas->kelas }}</td>
                            <td>
                                <a href="{{ route('jadwal.edit.show', $j->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('jadwal.delete', $j->id) }}" method="POST"
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
