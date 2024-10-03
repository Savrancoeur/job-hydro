<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Sign-Up</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gradient-to-br from-yellow-100 to-amber-200 flex justify-center items-center min-h-screen">
<!-- Main Container -->
<div class="card w-full max-w-md bg-white shadow-2xl rounded-xl overflow-hidden relative">
    <!-- Accent Circle -->
    <div class="absolute w-40 h-40 rounded-full bg-blue-200 top-0 left-0 -z-10 blur-3xl opacity-30"></div>
    <div class="absolute w-40 h-40 rounded-full bg-pink-200 bottom-0 right-0 -z-10 blur-3xl opacity-30"></div>

    <!-- Card Body -->
    <div class="card-body p-8">
        <!-- Header -->
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-2 text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-yellow-500 to-amber-400">User Sign-Up</h2>
        <p class="text-center text-gray-500 mb-8 text-transparent bg-clip-text bg-gradient-to-l from-red-700 via-indigo-600 to-amber-600">Join us and start your journey today.</p>

        <!-- Form -->
        <form action="" method="POST">
            @csrf
            <!-- Name -->
            <div class="form-control mb-6">
                <label class="label">
                    <span class="label-text text-gray-600">Name</span>
                </label>
                <input
                    name="name"
                    type="text"
                    placeholder="Full Name"
                    class="input input-bordered input-warning w-full"
                    value="{{ old('name') }}"
                    @error('name') class="input input-bordered input-error w-full" @enderror
                />
                @error('name')
                <span class="text-sm text-red-600 mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-control mb-6">
                <label class="label">
                    <span class="label-text text-gray-600">Email</span>
                </label>
                <input
                    name="email"
                    type="email"
                    placeholder="Email Address"
                    class="input input-bordered input-warning w-full"
                    value="{{ old('email') }}"
                    @error('email') class="input input-bordered input-error w-full" @enderror
                />
                @error('email')
                <span class="text-sm text-red-600 mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-control mb-6">
                <label class="label">
                    <span class="label-text text-gray-600">Password</span>
                </label>
                <input
                    name="password"
                    type="password"
                    placeholder="Password"
                    class="input input-bordered input-warning w-full"
                    @error('password') class="input input-bordered input-error w-full" @enderror
                />
                @error('password')
                <span class="text-sm text-red-600 mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn bg-yellow-300 border-amber-500 shadow-amber-300 shadow-md w-full mt-4 btn-lg hover:bg-yellow-400 hover:border-amber-600 hover:shadow-amber-400 transform transition hover:scale-105 duration-300 ease-in-out">Sign Up</button>
        </form>
    </div>
</div>
</body>

</html>
