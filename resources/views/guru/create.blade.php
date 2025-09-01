@extends('layouts.admin')

@section('header')
    <h1>Tambah Guru</h1>
@endsection

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Data Guru</h2>

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

        <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama_guru">Nama Guru</label>
                <input id="nama_guru" type="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror"
                    name="nama_guru" value="{{ old('nama_guru') }}" autocomplete="nama_guru">
                @error('nama_guru')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="foto">Foto</label>
                <input id="foto" type="file" class="form-control-file @error('foto') is-invalid @enderror"
                    name="foto" value="{{ old('foto') }}" autocomplete="foto">
                @error('foto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="mt-4">
                <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
