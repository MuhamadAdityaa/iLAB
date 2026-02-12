@extends('layouts.admin')

@section('header')
    <h1>Tambah Mapel untuk Guru</h1>
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

        <form action="{{ route('guru.mapel.store', $guru->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama_guru">Nama Guru</label>
                <div class="fw-bold fs-5">{{ $guru->nama_guru }}</div>
            </div>

            <div class="form-group mt-3">
                <label for="mapel_id">Pilih Mata Pelajaran</label>
                <select id="mapel_id" name="mapel_id[]" class="form-control" multiple>
                    <option value="" disabled>--Pilih Mata Pelajaran--</option>
                    @foreach ($mapel as $m)
                        @if (!in_array($m->id, $guruMapel))
                            <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                        @endif
                    @endforeach
                </select>
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
