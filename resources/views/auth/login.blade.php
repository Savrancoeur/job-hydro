<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employer Login</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Import Tailwind and DaisyUI -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.41.0/dist/full.css" rel="stylesheet" type="text/css" />
</head>

<body class="bg-gradient-to-br from-blue-100 to-sky-300 flex justify-center items-center min-h-screen">
<!-- Main Container -->
<div class="card w-full max-w-md bg-white shadow-2xl rounded-xl overflow-hidden relative ">
    <!-- Accent Circle -->
    <div class="absolute w-40 h-40 rounded-full bg-blue-200 top-0 left-0 -z-10 blur-3xl opacity-30"></div>
    <div class="absolute w-40 h-40 rounded-full bg-pink-200 bottom-0 right-0 -z-10 blur-3xl opacity-30"></div>

    <!-- Card Body -->
    <div class="card-body p-8">
        <!-- Header -->
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-2 text-transparent bg-clip-text bg-gradient-to-r from-indigo-700 via-sky-600 to-sky-600">Login</h2>
        <p class="text-center text-gray-500 mb-8 text-transparent bg-clip-text bg-gradient-to-l from-red-700 via-indigo-600 to-amber-600">Welcome back! Please login to your account.</p>

        <!-- Form -->
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <!-- Email Field -->
            <div class="form-control mb-6">
                <label class="label">
                    <span class="label-text text-gray-600">Email</span>
                </label>
                <input type="email" name="email" placeholder="Enter your email"
                       class="input input-bordered input-primary w-full" value="{{ old('email') }}"
                       @error('email') class="input input-bordered input-error w-full" @enderror />
                @error('email')
                <span class="text-sm text-red-600 mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="form-control mb-6">
                <label class="label">
                    <span class="label-text text-gray-600">Password</span>
                </label>
                <input type="password" name="password" placeholder="Enter your password"
                       class="input input-bordered input-primary w-full"
                       @error('password') class="input input-bordered input-error w-full" @enderror />
                @error('password')
                <span class="text-sm text-red-600 mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn bg-indigo-600 shadow-indigo-400 shadow-md border-indigo-900 w-full mt-4 btn-lg hover:bg-blue-600 hover:shadow-blue-400 hover:border-sky-700 transform transition hover:scale-105 duration-300 ease-in-out">Login</button>

            <!-- Divider -->
            <div class="divider mt-6 text-gray-400">Or</div>

            <!-- Sign Up Links -->
            <div class="flex flex-col items-center space-y-2 mt-4">
                <p class="text-red-600">Don’t have an account?</p>
                <a href="{{ url('register/employer') }}" class="btn btn-outline btn-accent w-full transform transition hover:scale-105 duration-300 ease-in-out hover:font-bold">
                    Sign up as a Company
                </a>
                <a href="{{ url('register/employee') }}" class="btn btn-outline btn-warning w-full transform transition hover:scale-105 duration-300 ease-in-out">
                    Sign up as a Job Seeker
                </a>
            </div>
        </form>
    </div>
</div>
</body>

</html>
