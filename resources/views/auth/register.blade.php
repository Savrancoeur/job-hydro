<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employer Sign-Up</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>



<body class="bg-gradient-to-br from-green-100 to-teal-200 flex justify-center items-center min-h-screen">
<!-- Main Container -->
<div class="card w-full max-w-md bg-white shadow-2xl rounded-xl overflow-hidden relative">
    <!-- Accent Circle -->
    <div class="absolute w-40 h-40 rounded-full bg-blue-200 top-0 left-0 -z-10 blur-3xl opacity-30"></div>
    <div class="absolute w-40 h-40 rounded-full bg-pink-200 bottom-0 right-0 -z-10 blur-3xl opacity-30"></div>

    <!-- Card Body -->
    <div class="card-body p-8">
        <!-- Header -->
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-2 text-transparent bg-clip-text bg-gradient-to-r from-lime-600 via-emerald-700 to-teal-600">Sign Up as Company</h2>
        <p class="text-center text-gray-500 mb-4 text-transparent bg-clip-text bg-gradient-to-l from-red-600 via-indigo-500 to-amber-500">Join us and post job opportunities.</p>

        <!-- Form -->
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <!-- Full Name Field -->
            <div class="form-control mb-4">
                <label class="label">
                    <span class="label-text text-gray-600">Full Name</span>
                </label>
                <input type="text" name="name" placeholder="Enter your full name"
                       class="input input-bordered input-success w-full" value="{{ old('name') }}"
                       @error('name') class="input input-bordered input-error w-full" @enderror />
                @error('name')
                <span class="text-sm text-red-600 mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="form-control mb-4">
                <label class="label">
                    <span class="label-text text-gray-600">Email</span>
                </label>
                <input type="email" name="email" placeholder="Enter your email"
                       class="input input-bordered input-success w-full" value="{{ old('email') }}"
                       @error('email') class="input input-bordered input-error w-full" @enderror />
                @error('email')
                <span class="text-sm text-red-600 mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="form-control mb-4">
                <label class="label">
                    <span class="label-text text-gray-600">Password</span>
                </label>
                <input type="password" name="password" placeholder="Enter your password"
                       class="input input-bordered input-success w-full"
                       @error('password') class="input input-bordered input-error w-full" @enderror />
                @error('password')
                <span class="text-sm text-red-600 mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</span>
                @enderror
            </div>

            <!-- Website URL Field -->
            <div class="form-control mb-4">
                <label class="label">
                    <span class="label-text text-gray-600">Website URL</span>
                </label>
                <input type="url" name="website" placeholder="Enter your company website URL"
                       class="input input-bordered input-success w-full" value="{{ old('website') }}"
                       @error('website') class="input input-bordered input-error w-full" @enderror />
                @error('website')
                <span class="text-sm text-red-600 mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</span>
                @enderror
            </div>

            <!-- Address Field -->
            <div class="form-control mb-4">
                <label class="label">
                    <span class="label-text text-gray-600">Address</span>
                </label>
                <textarea name="address" placeholder="Enter your company address"
                          class="textarea textarea-success w-full h-24"
                          @error('address') class="textarea textarea-error w-full" @enderror>{{ old('address') }}</textarea>
            </div>

            <!-- Submit Button -->
{{--            hover:border-green-500  hover:bg-emerald-500--}}
            <button type="submit" class="text-white btn bg-emerald-600 border border-lime-500 shadow-md shadow-emerald-300 w-full mt-4 btn-lg hover:border-green-500  hover:bg-green-600 transform transition hover:scale-105 duration-300 ease-in-out">Sign Up</button>

        </form>
    </div>
</div>
</body>

</html>
