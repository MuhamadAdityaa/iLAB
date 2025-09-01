@extends('layouts.admin')

@section('header')
    <h1>Tambah Data Ruangan</h1>
@endsection

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Data Ruangan</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Tampilkan error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ruangan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama_ruangan">Nama Ruangan</label>
                <input id="nama_ruangan" type="nama_ruangan" class="form-control @error('nama_ruangan') is-invalid @enderror"
                    name="nama_ruangan" value="{{ old('nama_ruangan') }}" autocomplete="nama_ruangan">
                @error('nama_ruangan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <a href="{{ route('ruangan.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection