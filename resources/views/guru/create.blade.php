@extends('layouts.admin')

@section('header')
    <h1>Tambah Data Guru</h1>
    <a href="{{ route('guru.index') }}" class="btn btn-secondary">
        ← Kembali ke Daftar Guru
    </a>
@endsection

@section('content')
    <div class="container mt-4">
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

            <div class="form-group mt-3">
                <label for="mapel_id">Mata Pelajaran</label>
                <select id="mapel_id" name="mapel_id" class="form-select @error('mapel_id') is-invalid @enderror">
                    <option value="">Pilih Mata Pelajaran</option>
                    @foreach ($mapels as $mapel)
                        <option value="{{ $mapel->id }}" {{ old('mapel_id') == $mapel->id ? 'selected' : '' }}>
                            {{ $mapel->nama_mapel }}</option>
                    @endforeach
                </select>
                @error('mapel_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="foto">Foto Guru</label>
                <input id="foto" type="file" class="form-control-file @error('foto') is-invalid @enderror"
                    name="foto" value="{{ old('foto') }}" autocomplete="foto">
                @error('foto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Tom Select (searchable select) --}}
            <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    new TomSelect('#mapel_id', {
                        create: false,
                        sortField: {
                            field: "text",
                            direction: "asc"
                        }
                    });
                });
            </script>

            <div class="mt-4">
                <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
