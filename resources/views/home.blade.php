<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>

<body class="bg-orange-100">

<div class="flex justify-between bg-gradient-to-r from-blue-400 to-indigo-300 py-4 px-6">
    <div class="flex space-x-2 items-center justify-center">
        <img src="{{ asset('storage/images/logo.png') }}" alt="" class="w-12 bg-blue-700 rounded-xl">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 text-transparent bg-clip-text bg-gradient-to-r from-blue-700 via-purple-600 to-amber-600">Job Application Newsfeed</h1>
    </div>

    <div class="flex space-x-4">
        @if (auth()->user())
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn bg-yellow-300 border-amber-500 shadow-amber-300 shadow-md hover:bg-yellow-400 hover:border-amber-600 hover:shadow-amber-400 transform transition hover:scale-105 duration-300 ease-in-out" onclick="return confirm('Are you sure to log out?')">Logout</button>
            </form>
            <a href="{{ url('/newsfeed/profile') }}" class="text-white btn bg-cyan-500 border-cyan-600 shadow-cyan-400 shadow-md hover:bg-sky-500 hover:border-sky-600 hover:shadow-sky-400">{{ auth()->user()->name }}</a>
        @else
            <a href="{{ route('login') }}" class="text-white btn bg-indigo-600 shadow-indigo-400 shadow-md border-indigo-900 hover:bg-blue-600 hover:shadow-blue-400 hover:border-sky-700 transform transition hover:scale-105 duration-300 ease-in-out">Login</a>
            <a href="{{ url('/register/employer') }}" class="text-white btn bg-emerald-600 border border-lime-500 shadow-md shadow-emerald-300 hover:border-green-500 hover:bg-green-600 transform transition hover:scale-105 duration-300 ease-in-out">Register as Company</a>
            <a href="{{ url('/register/employee') }}" class="btn bg-yellow-300 border-amber-500 shadow-amber-300 shadow-md hover:bg-yellow-400 hover:border-amber-600 hover:shadow-amber-400 transform transition hover:scale-105 duration-300 ease-in-out">Register as Job Seeker</a>
        @endif
    </div>
</div>

<main class="hero-section container mx-auto flex justify-between items-center py-16 px-4 md:px-0">
    <div class="hero-content w-full md:w-1/2 flex flex-col justify-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-purple-500 to-amber-500 transition-transform transform hover:scale-105 ">Hire Top Local Developers</h1>
        <p class="text-lg md:text-xl mb-6 text-gray-600 transition duration-300 hover:text-gray-800 hover:text-extrabold ">Great execution and pixel-perfect work delivered by our expert team. Let's make your project come to life!</p>
        <a href="{{ route('newsfeed.home') }}" class="btn-cta bg-blue-500 text-stone-100  py-2 px-4 rounded hover:bg-blue-600 transition duration-300 hover:scale-105 inline-flex items-center">Get Started (Join for Free) <i class="fa-solid fa-arrow-right ml-2"></i></a>
    </div>



    <div class="bg-photo w-1/2 hidden md:block ">
        <img src="{{ asset('storage/images/officebg.png') }}" alt="Office Background" class="object-center rounded-2xl w-2/3 h-[600px] mx-auto block transition duration-300 hover:scale-105">
    </div>
</main>

<!-- Scripts -->
<script type="module" src="/src/main.js"></script>
</body>

</html>
