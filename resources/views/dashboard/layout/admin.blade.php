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

<body class="bg-base-200">

    <div class="mx-auto h-screen flex flex-col ">
        <div class="navbar bg-gradient-to-r from-sky-400 to-blue-300 flex justify-between items-center py-10 px-6">
            <div class="flex space-x-2 items-center justify-center">
                <img src="{{asset('storage/images/logo.png')}}" alt="" class="w-12 bg-blue-700 rounded-xl">
                <h1 class="text-4xl font-extrabold text-center text-gray-800 text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-amber-600">Admin Dashboard</h1>
            </div>

            <div class="flex items-center space-x-2">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn bg-yellow-300 border-amber-500 shadow-amber-300 shadow-md  hover:bg-yellow-400 hover:border-amber-600 hover:shadow-amber-400 transform transition hover:scale-105 duration-300 ease-in-out" onclick="return confirm('Are you sure to log out?')">Logout</button>
                </form>
                <a  class="text-white btn bg-cyan-500 border-cyan-600 shadow-cyan-400 shadow-md hover:bg-sky-500 hover:border-sky-600 hover:shadow-sky-400">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <div class="flex mt-3">
            <div class="drawer lg:drawer-open">
                <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content flex flex-col">
                    <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>

                    <div class="card shadow-lg m-4 bg-blue-500">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <div class="drawer-side">
                    <label for="my-drawer-2" class="drawer-overlay"></label>
                    <ul class="menu bg-orange-100 rounded-xl ms-4 p-4 w-72">
                        <li><a href="{{ route('admin.index') }}" class="hover:text-primary">Dashboard</a></li>
                        <li><a href="{{ route('users.index') }}" class="hover:text-primary">Users</a></li>
                        <li><a href="{{ url('admin/payments') }}" class="hover:text-primary">Payments</a></li>
                        <hr/>
                        <p class="badge badge-accent my-3">Post Management</p>
                        <li><a href="{{url('admin/posts')}}">Posts</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <footer class="footer bg-primary text-primary-content flex justify-between p-4 mt-auto">
            <div>© 2024 Job-Hydro. All rights reserved.</div>
            <div class="flex space-x-4">
                <a href="#" class="hover:underline">Privacy Policy</a>
                <a href="#" class="hover:underline">Terms of Service</a>
            </div>
        </footer>
    </div>

    <script type="module" src="/src/main.js"></script>
</body>

</html>
