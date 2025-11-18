<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jadwal Pelajaran</title>
    <style>
        /* Reset */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #add8e6;
            font-family: 'Arial Black', Arial, sans-serif;
            color: black;
            height: 90vh;
        }

        .container {
            max-width: 1280px;
            margin: 20px auto;
            display: flex;
            gap: 20px;
            height: calc(100vh - 100px);
        }

        /* KIRI: Profil & data */
        .left-panel {
            background: white;
            border-radius: 20px;
            padding: 15px;
            width: 65%;
            display: flex;
            flex-direction: column;
        }

        /* Header atas */
        .header-top {
            background: white;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 20px;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 15px;
            border: 2px solid black;
        }

        .header-top .tanggal {
            border: 2px solid black;
            border-radius: 25px;
            padding: 8px 15px;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .header-top .logos {
            display: flex;
            gap: 15px;
        }

        /* .logo-box {
            width: 50px;
            height: 50px;
            background: #004080;
            border-radius: 50%;
            border: 2px solid black;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            color: white;
            font-weight: bold;
            text-align: center;
        } */

        .logo-box {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 2px solid black;
            overflow: hidden;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }


        /* Profil section */
        .profile-section {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            height: auto;
        }

        .profile-img {
            border: 2px solid black;
            border-radius: 15px;
            width: 40%;
            height: 100%;
            overflow: hidden;
        }

        .profile-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .info-boxes {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 12px;
        }

        .info-box {
            background: #7ec8f5;
            border-radius: 15px;
            padding: 10px 20px;
            font-weight: bold;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 15px;
            border: 2px solid black;
        }

        /* Icon placeholders */
        .icon {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 24px;
            height: 24px;
        }

        .icon-user::before {
            content: "👤";
            font-size: 20px;
        }

        .icon-book::before {
            content: "📚";
            font-size: 20px;
        }

        .icon-home::before {
            content: "🏠";
            font-size: 20px;
        }

        .icon-clock::before {
            content: "⏰";
            font-size: 20px;
        }

        /* Jam Digital */
        .clock-box {
            margin-top: auto;
            background: white;
            border: 2px solid black;
            border-radius: 15px;
            font-size: 90px;
            font-weight: 900;
            text-align: center;
            padding: 20px 0;
            user-select: none;
        }

        /* KANAN: Jadwal pelajaran */
        .right-panel {
            background: white;
            border-radius: 20px;
            border: 2px solid black;
            padding: 15px 20px;
            width: 30%;
        }

        .schedule-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 16px;
        }

        .schedule-num {
            border: 2px solid black;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 700;
            background: white;
        }

        .schedule-time {
            background: #7ec8f5;
            border-radius: 20px;
            padding: 3px 10px;
            border: 2px solid black;
            font-size: 14px;
            min-width: 85px;
            text-align: center;
        }

        .schedule-subject {
            flex-grow: 1;
        }

        @media (max-width: 800px) {
            .container {
                flex-direction: column;
                max-width: 90%;
            }

            .left-panel,
            .right-panel {
                width: 100%;
            }

            .profile-img {
                width: 100%;
                height: auto;
            }
        }

        .burger-menu {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            width: 30px;
            height: 25px;
            cursor: pointer;
            margin-right: 15px;
        }

        .burger-menu span {
            display: block;
            height: 3px;
            background-color: black;
            border-radius: 2px;
        }

        .istirahat {
            font-size: 50px;
            margin: 10px 0px 10px 0px;
        }

        .infoLainnya {
            font-size: 25px
        }
    </style>
</head>

<body>

    <div class="container">
        <section class="left-panel">
            <div class="header-top">
                {{-- <div class="burger-menu" id="burgerMenu" title="Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div> --}}
                <a class='burger-menu'id='burgerMenu' title="menu" href='{{ route('dashboard') }}'>
                    <span></span>
                    <span></span>
                    <span></span>
                </a>

                <div class="tanggal">
                    <span id="hariText">-</span>
                    <span id="tanggalText">-</span>
                </div>
                <div class="logos">
                    <div class="logo-box" title="SMK">
                        <img src="{{ asset('storages/icon/smk.jpg') }}" alt="Logo SMKN 1 Karawang">
                    </div>
                    <div class="logo-box" title="Label">
                        <img src="{{ asset('storages/icon/pplg.jpg') }}" alt="Logo Jurusan">
                    </div>
                </div>
            </div>

            <div class="profile-section">
                <div class="profile-img">
                    <img src="https://i.postimg.cc/7ZQQ64Q2/profile.jpg" alt="Foto Profil" id="fotoGuru" />
                </div>
                <div class="info-boxes">
                    <h1 class="istirahat" id="istirahat">Tidak Ada Aktivitas</h1>
                    <h1 class="infoLainnya" id="penanggung"><span>Penanggung Jawab: Saka Lawrance</span></h1>
                    <h1 class="infoLainnya" id="ruangan"><span>Lab 1</span></h1>

                    <div class="info-box" id="infoGuru"><span class="icon icon-user"></span> -</div>
                    <div class="info-box" id="infoMapel"><span class="icon icon-book"></span> -</div>
                    <div class="info-box" id="infoRuangan"><span class="icon icon-home"></span> -</div>
                    <div class="info-box" id="infoWaktu"><span class="icon icon-clock"></span> -</div>
                </div>
            </div>

            <div class="clock-box" id="digitalClock">--:--</div>
        </section>

        <section class="right-panel" id="scheduleList">
            <!-- Jadwal akan di generate oleh JS -->
        </section>
    </div>

    {{-- <div id="sidebar"
        style="height: 100vh;width: 0;position: fixed;top: 0;left: 0;background-color: #007ACC;overflow-x: hidden;transition: 0.3s;padding-top: 60px;color: white;z-index: 999;">
        <a href="#" onclick="closeSidebar()" style="padding: 8px 32px; text-decoration:none; color: white;">Close
            ×</a>
        <a href="#" style="padding: 8px 32px; text-decoration:none; color: white;">Menu 1</a>
        <a href="#" style="padding: 8px 32px; text-decoration:none; color: white;">Menu 2</a>
        <a href="#" style="padding: 8px 32px; text-decoration:none; color: white;">Menu 3</a>
    </div> --}}



    <script>
        async function loadSchedule() {
            try {
                const response = await fetch("/api/jadwal");
                const data = await response.json();

                console.log(data); // debug

                // update header tanggal & hari
                document.getElementById("hariText").textContent = data.hari;
                document.getElementById("tanggalText").textContent = data.tanggal;

                // render daftar jadwal
                renderSchedule(data.jadwal);

                // cek mapel sekarang
                if (data.jadwal.length > 0) {
                    const now = new Date();
                    const nowMinutes = now.getHours() * 60 + now.getMinutes(); // ubah ke menit

                    let currentSchedule = null;

                    data.jadwal.forEach(item => {
                        if (item.waktu?.jam_mulai && item.waktu?.jam_selesai) {
                            const [h1, m1] = item.waktu.jam_mulai.split(":").map(Number);
                            const [h2, m2] = item.waktu.jam_selesai.split(":").map(Number);

                            const start = h1 * 60 + m1;
                            const end = h2 * 60 + m2;

                            if (nowMinutes >= start && nowMinutes <= end) {
                                currentSchedule = item;
                            }
                        }
                    });

                    const sekarang = new Date();
                    let j = sekarang.getHours();
                    let mi = sekarang.getMinutes();
                    // console.log(last.waktu?.jam_selesai);

                    if (currentSchedule) {
                        document.getElementById("istirahat").style.display = "none";
                        document.getElementById("penanggung").style.display = "none";
                        document.getElementById("ruangan").style.display = "none";

                        document.getElementById("fotoGuru").src =
                            currentSchedule.guru?.foto ? `storages/${currentSchedule.guru.foto}` :
                            'https://i.postimg.cc/7ZQQ64Q2/profile.jpg';

                        document.getElementById("infoGuru").innerHTML =
                            `<span class="icon icon-book"></span> ${currentSchedule.guru?.nama_guru ?? '-'}`;

                        document.getElementById("infoMapel").innerHTML =
                            `<span class="icon icon-book"></span> ${currentSchedule.mapel?.nama_mapel ?? '-'}`;

                        document.getElementById("infoRuangan").innerHTML =
                            `<span class="icon icon-home"></span> ${currentSchedule.ruangan?.nama_ruangan ?? '-'}`;

                        document.getElementById("infoWaktu").innerHTML =
                            `<span class="icon icon-clock"></span> ${currentSchedule.waktu?.jam_mulai ?? '-'} - ${currentSchedule.waktu?.jam_selesai ?? '-'}`;
                    } else if (j >= 15 || j < 7) {
                        // fallback kalau ga ada pelajaran sekarang
                        document.getElementById('fotoGuru').src = "storage/foto/penanggungJawab.jpg"
                        document.getElementById("infoGuru").style.display = "none";
                        document.getElementById("infoMapel").style.display = "none";
                        document.getElementById("infoRuangan").style.display = "none";
                        document.getElementById("infoWaktu").style.display = "none";

                        document.getElementById("istirahat").style.display = "block";
                        document.getElementById("penanggung").style.display = "block";
                        document.getElementById("ruangan").style.display = "block";
                    } else {
                        document.getElementById('fotoGuru').src = "storage/foto/penanggungJawab.jpg"
                        document.getElementById("infoGuru").style.display = "none";
                        document.getElementById("infoMapel").style.display = "none";
                        document.getElementById("infoRuangan").style.display = "none";
                        document.getElementById("infoWaktu").style.display = "none";
                    }
                }

            } catch (error) {
                console.error("Gagal ambil data jadwal:", error);
            }
        }


        function renderSchedule(schedule) {
            const scheduleList = document.getElementById('scheduleList');
            scheduleList.innerHTML = '';

            schedule.forEach((item, index) => {
                const div = document.createElement('div');
                div.classList.add('schedule-item');

                div.innerHTML = `
                    <div class="schedule-num">${index + 1}</div>
                    <div class="schedule-time">${item.waktu?.jam_mulai ?? '-'} - ${item.waktu?.jam_selesai ?? '-'}</div>
                    <div class="schedule-subject">${item.mapel?.kode_mapel ?? '-'}</div>
                `;
                scheduleList.appendChild(div);
            });
        }

        // Jam digital realtime
        function updateClock() {
            const clock = document.getElementById('digitalClock');
            const now = new Date();
            let h = now.getHours();
            let m = now.getMinutes();
            h = h < 10 ? '0' + h : h;
            m = m < 10 ? '0' + m : m;
            clock.textContent = h + ':' + m;
        }

        // Sidebar toggle
        const burgerMenu = document.getElementById('burgerMenu');
        const sidebar = document.getElementById('sidebar');

        burgerMenu.onclick = function() {
            sidebar.style.width = sidebar.style.width === '250px' ? '0' : '250px';
        };

        function closeSidebar() {
            sidebar.style.width = '0';
        }

        // Init
        loadSchedule();
        updateClock();
        setInterval(updateClock, 1000);
        setInterval(loadSchedule, 60000);
    </script>
</body>

</html>
