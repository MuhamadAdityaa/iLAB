@extends('layouts.admin')

@section('header')
    <h1>Tambah Jadwal</h1>
@endsection

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Data Jadwal</h2>

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

            <form action="{{ route('jadwal.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="hari_id">Hari</label>
                    <select name="hari_id" id="hari_id" class="form-control @error('hari_id') is-invalid @enderror">
                        <option value="">-- Pilih Hari --</option>
                        @foreach ($haris as $h)
                            <option value="{{ $h->id }}">{{ $h->hari }}</option>
                        @endforeach
                    </select>
                    @error('hari_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="guru_id">Guru</label>
                    <select name="guru_id" id="guru_id" class="form-control @error('guru_id') is-invalid @enderror">
                        <option value="">-- Pilih Guru --</option>
                        @foreach ($gurus as $g)
                            <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                        @endforeach
                    </select>
                    @error('guru_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->id }}">{{ $k->kelas }}</option>
                        @endforeach
                    </select>
                    @error('kelas_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mapel_id">Mata Pelajaran</label>
                    <select name="mapel_id" id="mapel_id" class="form-control @error('mapel_id') is-invalid @enderror">
                        <option value="">-- Pilih Mapel --</option>
                        @foreach ($mapels as $m)
                            <option value="{{ $m->id }}">{{ $m->nama_mapel }} - {{$m->id}}</option>
                        @endforeach
                    </select>
                    @error('mapel_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ruangan_id">Ruangan</label>
                    <select name="ruangan_id" id="ruangan_id"
                        class="form-control @error('ruangan_id') is-invalid @enderror">
                        <option value="">-- Pilih Ruangan --</option>
                        @foreach ($ruangans as $r)
                            <option value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>
                        @endforeach
                    </select>
                    @error('ruangan_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="waktu_id">Waktu</label>
                    <select name="waktu_id" id="waktu_id" class="form-control @error('waktu_id') is-invalid @enderror">
                        <option value="">-- Pilih Waktu --</option>
                        @foreach ($waktus as $w)
                            <option value="{{ $w->id }}">{{ $w->jam_mulai }} - {{ $w->jam_selesai }}</option>
                        @endforeach
                    </select>
                    @error('waktu_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
            </form>
    </div>
@endsection
