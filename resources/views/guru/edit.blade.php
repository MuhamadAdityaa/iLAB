@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Film</h2>

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

        <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama_guru">Nama Guru</label>
                <input id="nama_guru" type="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror"
                    name="nama_guru" value="{{ $guru->nama_guru }}" autocomplete="nama_guru">
                @error('nama_guru')
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
