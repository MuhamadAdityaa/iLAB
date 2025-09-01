@extends('layouts.admin')

@section('header')
    <h1>Detail Guru</h1>
    <a href="{{ route('guru.index') }}" class="btn btn-secondary mb-3">
        ← Kembali ke Daftar Film
    </a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card p-4 shadow" style="min-height: 70vh">
                    <h3 class="mb-4">Detail Guru</h3>
                    <div class="row">
                        {{-- Poster --}}
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="Poster Film"
                                class="img-fluid rounded shadow-sm">
                        </div>

                        {{-- Detail --}}
                        <div class="col-md-8">
                            <h4 class="mb-3">{{ $guru->nama_guru }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
