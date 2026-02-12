@extends('layouts.admin')

@section('header')
    <h1>Detail Guru</h1>
    <a href="{{ route('ruangan.index') }}" class="btn btn-secondary mb-3">
        ← Kembali ke Daftar Ruangan
    </a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card p-4 shadow" style="min-height: 70vh">
                    <h3 class="mb-4">Detail Ruangan</h3>
                    <div class="row">
                        {{-- Detail --}}
                        <div class="col-md-12">
                            <h4 class="mb-3">{{ $ruangan->nama_ruangan }}</h4>
                        </div>
                        <div class="col-md-12">
                            <p><strong>Penanggung Jawab:</strong> {{ $ruangan->guru->nama_guru }}</p>
                        </div>
                        {{-- Poster --}}
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('../storage/' . $ruangan->guru->foto) }}" alt="Poster Film"
                                class="img-fluid rounded shadow-sm">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
