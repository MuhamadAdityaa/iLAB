@extends('layouts.admin')

@section('header')
    <h1>Tambah Data Kelas</h1>
    <a href="{{ route('kelas.index') }}" class="btn btn-secondary">
        ← Kembali ke Daftar Kelas
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

        <form action="{{ route('kelas.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input id="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror"
                    name="jurusan" value="{{ old('jurusan') }}" placeholder="Contoh: TKJ">
                @error('jurusan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group mt-3">
                <label for="tingkat">Tingkat</label>
                <input id="tingkat" type="text" class="form-control @error('tingkat') is-invalid @enderror"
                    name="tingkat" value="{{ old('tingkat') }}" placeholder="Contoh: XI">
                @error('tingkat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="kelas">Kelas</label>
                <input id="kelas" type="number" class="form-control @error('kelas') is-invalid @enderror"
                    name="kelas" value="{{ old('kelas') }}" placeholder="Contoh: 2" min="1" max="12">
                @error('kelas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
