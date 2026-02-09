@extends('layouts.admin')

@section('header')
    <h1>Edit Mata Pelajaran</h1>
    <a href="{{ route('mapel.index') }}" class="btn btn-secondary">
        ← Kembali ke Daftar Mata Pelajaran
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

        <form action="{{ route('mapel.update', $mapel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="mapel">Mata Pelajaran</label>
                <input id="mapel" type="mapel" class="form-control @error('mapel') is-invalid @enderror"
                    name="mapel" value="{{ $mapel->nama_mapel }}" autocomplete="mapel">
                @error('mapel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kode">Kode Mata Pelajaran</label>
                <input id="kode" type="kode" class="form-control @error('kode') is-invalid @enderror" name="kode"
                    value="{{ $mapel->kode_mapel }}" autocomplete="kode">
                @error('kode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
