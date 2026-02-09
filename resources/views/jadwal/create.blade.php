@extends('layouts.admin')

@section('header')
    <h1>Tambah Jadwal</h1>
    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary mb-3">
        ← Kembali ke Daftar Jadwal
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

        <form action="{{ route('jadwal.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="hari_id" class="form-label">Hari</label>
                <select name="hari_id" id="hari_id" class="form-select @error('hari_id') is-invalid @enderror">
                    <option value="">-- Pilih Hari --</option>
                    @foreach ($haris as $h)
                        <option value="{{ $h->id }}" {{ old('hari_id') == $h->id ? 'selected' : '' }}>
                            {{ $h->hari }}</option>
                    @endforeach
                </select>
                @error('hari_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="guru_id" class="form-label">Guru</label>
                <select name="guru_id" id="guru_id" class="form-select @error('guru_id') is-invalid @enderror">
                    <option value="">-- Pilih Guru --</option>
                    @foreach ($gurus as $g)
                        <option value="{{ $g->id }}" data-mapel="{{ $g->mapel->nama_mapel ?? '' }}"
                            {{ old('guru_id') == $g->id ? 'selected' : '' }}>{{ $g->nama_guru }}</option>
                    @endforeach
                </select>
                @error('guru_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div id="guru_info" class="mt-2 text-muted small">Pilih guru untuk melihat mata pelajaran terkait.</div>
            </div>

            <div class="mb-3">
                <label for="kelas_id" class="form-label">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $k)
                        <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                            {{ $k->kelas }}</option>
                    @endforeach
                </select>
                @error('kelas_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ruangan_id" class="form-label">Ruangan</label>
                <select name="ruangan_id" id="ruangan_id" class="form-select @error('ruangan_id') is-invalid @enderror">
                    <option value="">-- Pilih Ruangan --</option>
                    @foreach ($ruangans as $r)
                        <option value="{{ $r->id }}" {{ old('ruangan_id') == $r->id ? 'selected' : '' }}>
                            {{ $r->nama_ruangan }}</option>
                    @endforeach
                </select>
                @error('ruangan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="waktu_id" class="form-label">Waktu</label>
                <select name="waktu_id" id="waktu_id" class="form-select @error('waktu_id') is-invalid @enderror">
                    <option value="">-- Pilih Waktu --</option>
                    @foreach ($waktus as $w)
                        <option value="{{ $w->id }}" {{ old('waktu_id') == $w->id ? 'selected' : '' }}>
                            {{ $w->jam_mulai }} - {{ $w->jam_selesai }}</option>
                    @endforeach
                </select>
                @error('waktu_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tom Select (searchable selects) --}}
            <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

            <style>
                /* pastikan dropdown TomSelect selalu di atas */
                .ts-dropdown {
                    z-index: 99999 !important;
                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // daftar id select yang mau di-TomSelect
                    var ids = ['hari_id', 'guru_id', 'kelas_id', 'mapel_id', 'ruangan_id', 'waktu_id'];

                    ids.forEach(function(id) {
                        var el = document.getElementById(id);
                        if (!el) return;

                        var settings = {
                            create: false,
                            dropdownParent: 'body', // biarkan append ke body (menghindari clipping)
                            sortField: (id === 'hari_id') ? [{
                                field: '$order'
                            }] : [{
                                field: 'text',
                                direction: 'asc'
                            }],
                        };

                        // kustomisasi khusus untuk guru
                        if (id === 'guru_id') {
                            settings.render = {
                                option: function(data, escape) {
                                    // Ambil data-mapel dari option asli (fallback jika tidak ada)
                                    var opt = document.querySelector('select#guru_id option[value="' + (data
                                        .value || '') + '"]');
                                    var mapel = opt ? (opt.getAttribute('data-mapel') || '') : '';
                                    var mapelHtml = mapel ? '<div class="small text-muted">Mapel: ' +
                                        escape(mapel) + '</div>' : '';
                                    return '<div><strong>' + escape(data.text) + '</strong>' + mapelHtml +
                                        '</div>';
                                },
                                item: function(data, escape) {
                                    var opt = document.querySelector('select#guru_id option[value="' + (data
                                        .value || '') + '"]');
                                    var mapel = opt ? (opt.getAttribute('data-mapel') || '') : '';
                                    return '<div>' + escape(data.text) + (mapel ?
                                        ' <small class="text-muted">(' + escape(mapel) + ')</small>' :
                                        '') + '</div>';
                                }
                            };

                            // update info di bawah select saat berubah
                            settings.onChange = function(value) {
                                var info = document.getElementById('guru_info');
                                if (!info) return;
                                if (!value) {
                                    info.textContent = 'Pilih guru untuk melihat mata pelajaran terkait.';
                                    return;
                                }
                                var sel = document.getElementById('guru_id');
                                var opt = sel.options[sel.selectedIndex];
                                var mapel = opt ? (opt.getAttribute('data-mapel') || '') : '';
                                info.textContent = mapel ? 'Mapel terkait: ' + mapel :
                                    'Tidak ada mata pelajaran terkait.';
                            };
                        }

                        try {
                            new TomSelect('#' + id, settings);
                        } catch (e) {
                            console.error('TomSelect init error for #' + id, e);
                        }
                    });

                    // jika ada initial selected guru, tampilkan info
                    var selInit = document.getElementById('guru_id');
                    if (selInit) {
                        var optInit = selInit.options[selInit.selectedIndex];
                        var mapelInit = optInit ? (optInit.getAttribute('data-mapel') || '') : '';
                        var infoInit = document.getElementById('guru_info');
                        if (infoInit) infoInit.textContent = mapelInit ? 'Mapel terkait: ' + mapelInit :
                            'Pilih guru untuk melihat mata pelajaran terkait.';
                    }
                });
            </script>


            <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
        </form>
    </div>
@endsection
