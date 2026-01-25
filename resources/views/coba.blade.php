@extends('layouts.admin')


@section('content')
    <div class="container-fluid">
        <h2 class="mb-4">Selamat Datang di ILab</h2>

        {{-- <div class="row">
            @for ($i = 1; $i <= 6; $i++)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="card-title">Lab {{ $i }}</h5>
                            <div class="w-100 mb-3" style="min-height:180px; max-height:240px;">
                                <video id="video-{{ $i }}" class="w-100 h-100" playsinline muted style="background:#000; object-fit:cover;"></video>
                            </div>

                            <button id="btn-{{ $i }}" data-index="{{ $i }}" class="btn btn-primary">
                                Open Kamera
                            </button>
                        </div>
                    </div>
                </div>
            @endfor
        </div> --}}
    </div>

    {{-- <script>
        // store active MediaStream per tile
        const streams = {};

        function stopStream(i) {
            if (streams[i]) {
                streams[i].getTracks().forEach(t => t.stop());
                streams[i] = null;
            }
        }

        function toggleCamera(i) {
            const video = document.getElementById('video-' + i);
            const btn = document.getElementById('btn-' + i);

            if (!video || !btn) return;

            if (streams[i]) {
                stopStream(i);
                try { video.srcObject = null; } catch (e) {}
                btn.textContent = 'Open Kamera';
                btn.classList.remove('btn-danger');
                btn.classList.add('btn-primary');
                return;
            }

            navigator.mediaDevices.getUserMedia({ video: true, audio: false })
                .then(stream => {
                    streams[i] = stream;
                    try {
                        video.srcObject = stream;
                        const playPromise = video.play();
                        if (playPromise !== undefined) {
                            playPromise.catch(() => { /* ignore play errors */ });
                        }
                    } catch (e) {
                        console.error('Error attaching stream', e);
                    }
                    btn.textContent = 'Close Kamera';
                    btn.classList.remove('btn-primary');
                    btn.classList.add('btn-danger');
                })
                .catch(err => {
                    alert('Gagal mengakses kamera: ' + err.message);
                });
        }

        document.addEventListener('DOMContentLoaded', () => {
            for (let i = 1; i <= 6; i++) {
                const btn = document.getElementById('btn-' + i);
                if (btn) btn.addEventListener('click', function () { toggleCamera(i); });
            }
        });
    </script> --}}
@endsection
