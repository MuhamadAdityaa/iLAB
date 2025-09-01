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
            /* biru muda */
            font-family: 'Arial Black', Arial, sans-serif;
            color: black;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            display: flex;
            gap: 20px;
        }

        /* KIRI: Profil & data */
        .left-panel {
            background: white;
            border-radius: 20px;
            padding: 15px;
            width: 55%;
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

        /* Logo placeholder */
        .header-top .logos {
            display: flex;
            gap: 15px;
        }

        .logo-box {
            width: 50px;
            height: 50px;
            background: #004080;
            /* biru gelap */
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
        }

        /* Profil section */
        .profile-section {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }

        .profile-img {
            border: 2px solid black;
            border-radius: 15px;
            width: 200px;
            height: 200px;
            overflow: hidden;
        }

        .profile-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Data info */
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

        /* Icon shapes (simple svg) */
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
            width: 40%;
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

        /* Responsive */
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
    </style>
</head>

<body>


    <div class="header-top">
        <div class="burger-menu" id="burgerMenu" title="Menu">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="tanggal">
            <span>Rabu</span>
            <span>13 - Agustus - 2025</span>
        </div>
        <div class="logos">
            <div class="logo-box" title="SMK">SMK</div>
            <div class="logo-box" title="Label">Label</div>
        </div>
    </div>

    <div class="container">
        <section class="left-panel">
            <div class="profile-section">
                <div class="profile-img">
                    <img src="https://i.postimg.cc/7ZQQ64Q2/profile.jpg" alt="Foto Profil Muhammad Aditya" />
                </div>
                <div class="info-boxes">
                    <div class="info-box"><span class="icon icon-user"></span> Muhamad Aditya</div>
                    <div class="info-box"><span class="icon icon-book"></span> Matematika</div>
                    <div class="info-box"><span class="icon icon-home"></span> Lab 1</div>
                    <div class="info-box"><span class="icon icon-clock"></span> 7:15 - 10:50</div>
                </div>
            </div>
            <div class="clock-box" id="digitalClock">--:--</div>
        </section>

        <section class="right-panel" id="scheduleList">
            <!-- Jadwal akan di generate oleh JS -->
        </section>
    </div>
    <div id="sidebar"
        style="
    height: 100vh;
    width: 0;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #007ACC;
    overflow-x: hidden;
    transition: 0.3s;
    padding-top: 60px;
    color: white;
    z-index: 999;">

        <a href="#" onclick="closeSidebar()" style="padding: 8px 32px; text-decoration:none; color: white;">Close
            ×</a>
        <a href="#" style="padding: 8px 32px; text-decoration:none; color: white;">Menu 1</a>
        <a href="#" style="padding: 8px 32px; text-decoration:none; color: white;">Menu 2</a>
        <a href="#" style="padding: 8px 32px; text-decoration:none; color: white;">Menu 3</a>
    </div>


    <script>
        // DATA jadwal pelajaran
        const schedule = [{
                num: 1,
                time: '07:15-07:55',
                subject: 'Matematika'
            },
            {
                num: 2,
                time: '07:55-08:35',
                subject: 'Matematika'
            },
            {
                num: 3,
                time: '08:35-09:15',
                subject: 'Matematika'
            },
            {
                num: 4,
                time: '09:30-10:10',
                subject: 'Matematika'
            },
            {
                num: 5,
                time: '10:10-10:50',
                subject: 'Matematika'
            },
            {
                num: 6,
                time: '10:50-11:30',
                subject: 'B. Indonesia'
            },
            {
                num: 7,
                time: '11:30-12:10',
                subject: 'B. Indonesia'
            },
            {
                num: 8,
                time: '13:00-13:40',
                subject: 'Olahraga'
            },
            {
                num: 9,
                time: '13:40-14:20',
                subject: 'Olahraga'
            },
            {
                num: 10,
                time: '14:20-15:00',
                subject: 'Olahraga'
            }
        ];

        // Fungsi render jadwal ke .right-panel
        function renderSchedule() {
            const scheduleList = document.getElementById('scheduleList');
            scheduleList.innerHTML = ''; // clear dulu

            schedule.forEach(item => {
                const div = document.createElement('div');
                div.classList.add('schedule-item');

                div.innerHTML = `
        <div class="schedule-num">${item.num}</div>
        <div class="schedule-time">${item.time}</div>
        <div class="schedule-subject">${item.subject}</div>
        `;
                scheduleList.appendChild(div);
            });
        }

        // Fungsi jam digital realtime
        function updateClock() {
            const clock = document.getElementById('digitalClock');
            const now = new Date();
            let h = now.getHours();
            let m = now.getMinutes();

            h = h < 10 ? '0' + h : h;
            m = m < 10 ? '0' + m : m;

            clock.textContent = h + ':' + m;
        }
        const burgerMenu = document.getElementById('burgerMenu');
        const sidebar = document.getElementById('sidebar');

        burgerMenu.onclick = function() {
            if (sidebar.style.width === '250px') {
                sidebar.style.width = '0';
            } else {
                sidebar.style.width = '250px';
            }
        };

        function closeSidebar() {
            sidebar.style.width = '0';
        }


        // Init
        renderSchedule();
        updateClock();
        setInterval(updateClock, 1000); // update tiap detik
    </script>

</body>

</html>
