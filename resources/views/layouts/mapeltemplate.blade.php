<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #111827; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
        </style>
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body class="bg-gray-100 font-family-karla flex">

<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="{{route('index')}}" class="text-white text-1xl font-semibold uppercase hover:text-gray-300">SI Akademik
        MIT Mardlatillah</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{route('dasboard')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-home mr-3" aria-hidden="true"></i>
            Dashboard
        </a>
        <a href="{{route('siswa')}}" class="flex items-center text-white py-4 pl-6 nav-item">
            <i class="fa fa-users mr-3" aria-hidden="true"></i>
            Biodata Siswa
        </a>
        <a href="{{route('mapel')}}" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
            <i class="fa fa-book mr-3" aria-hidden="true"></i>
            Mata Pelajaran
        </a>
        <a href="{{route('kelas')}}" class="flex items-center text-white py-4 pl-6 nav-item">
            <i class="fa fa-building mr-3" aria-hidden="true"></i>
          Kelas
        </a>
</aside>

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- Desktop Header -->
    <header class="w-full items-center hidden sm:flex">
        <div class="w-100%"></div>
        <div x-data="{ isOpen: false }" class="relative w-screen flex justify-end">
        @livewire('navigation-menu')
        </div>
    </header>

    <!-- Mobile Header & Nav -->
    <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
        <div class="flex items-center justify-between">
            <a href="" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                <i x-show="!isOpen" class="fas fa-bars"></i>
                <i x-show="isOpen" class="fas fa-times"></i>
            </button>
        </div>

        <!-- Dropdown Nav -->
        <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
            <a href="{{route('dasboard')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-home mr-3" aria-hidden="true"></i>
                Dashboard
            </a>
            <a href="{{route('siswa')}}" class="flex items-center  text-white py-2 pl-4 nav-item">
                <i class="fa fa-users mr-3" aria-hidden="true"></i>
                Biodata Siswa
            </a>
            <a href="{{route('mapel')}}" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                <i class="fa fa-book mr-3" aria-hidden="true"></i>
                Mata Pelajaran
            </a>
            <a href="{{route('kelas')}}" class="flex items-center  text-white py-2 pl-4 nav-item">
                <i class="fa fa-building mr-3" aria-hidden="true"></i>
                Kelas
            </a>
            <!-- <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-cogs mr-3"></i>
                Support
            </a> -->
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-user mr-3"></i>
                Akun Saya
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Sign Out
            </a>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
            </button> -->
        </nav>
        <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class="fas fa-plus mr-3"></i> New Report
        </button> -->
    </header>

    <div class="w-full overflow-x-hidden border-t flex flex-col h-screen">
        <main class="w-full flex-grow p-6">
        {{ $slot }}
        </main>
        <footer class="border-t border-gray-500 h-10 w-full bg-gray-800 text-right text-xs text-white p-3 bottom-0">
        MIT Mardlatillah 2021   | Design Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
        </footer>
    </div>

<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

<script>
    var chartOne = document.getElementById('chartOne');
    var myChart = new Chart(chartOne, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var chartTwo = document.getElementById('chartTwo');
    var myLineChart = new Chart(chartTwo, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@stack('modals')
@livewireScripts
</body>
</html>
