<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
<!-- Container for Newsfeed -->
<div class="mx-auto">
    <div class="flex justify-between bg-gradient-to-r from-sky-400 to-blue-300 py-4 px-6">
        <div class="flex space-x-2 items-center justify-center">
            <img src="{{asset('storage/images/logo.png')}}" alt="" class="w-12 bg-blue-700 rounded-xl">
            <h1 class="text-4xl font-extrabold text-center text-gray-800 text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-amber-600">Job Application Newsfeed</h1>
        </div>

        <div class="flex space-x-4">
            @if (auth()->user())
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn bg-yellow-300 border-amber-500 shadow-amber-300 shadow-md  hover:bg-yellow-400 hover:border-amber-600 hover:shadow-amber-400 transform transition hover:scale-105 duration-300 ease-in-out" onclick="return confirm('Are you sure to log out?')">Logout</button>
                </form>
                <a href="{{url('/newsfeed/profile')}}" class="text-white btn bg-cyan-500 border-cyan-600 shadow-cyan-400 shadow-md hover:bg-sky-500 hover:border-sky-600 hover:shadow-sky-400">{{ auth()->user()->name }}</a>
            @else
                <a href="{{ route('login') }}" class="text-white btn bg-indigo-600 shadow-indigo-400 shadow-md border-indigo-900 hover:bg-blue-600 hover:shadow-blue-400 hover:border-sky-700 transform transition hover:scale-105 duration-300 ease-in-out">Login</a>
                <a href="{{ url('/register/employer') }}" class="text-white btn bg-emerald-600 border border-lime-500 shadow-md shadow-emerald-300  hover:border-green-500  hover:bg-green-600 transform transition hover:scale-105 duration-300 ease-in-out">Register as Company</a>
                <a href="{{ url('/register/employee') }}" class="btn bg-yellow-300 border-amber-500 shadow-amber-300 shadow-md  hover:bg-yellow-400 hover:border-amber-600 hover:shadow-amber-400 transform transition hover:scale-105 duration-300 ease-in-out">Register as Job Seeker</a>
            @endif
        </div>
    </div>

    <!-- Job Post Cards -->
    <div class="space-y-6 py-4 px-6">

        <!-- Job Post Card  -->
        @foreach($posts as $post)
        <div class="card bg-white shadow-md rounded-lg p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">{{$post->title}}</h2>
                <span class="badge bg-blue-600 text-white p-4">{{$post->employer->name}}</span>
            </div>
            <p class="text-gray-600">For <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-700 via-amber-600 to-sky-600">{{$post->position}}</span></p>

            <!-- Job Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                <div class="flex items-center">
                    <i class="fa-solid fa-layer-group text-blue-500 mr-2"></i>
                    <p class="text-gray-600">{{$post->category->name}}</p>
                </div>
                <div class="flex items-center">
                    <i class="fa-solid fa-dollar-sign text-green-500 mr-2"></i>
                    <p class="text-gray-600">{{$post->salary}}</p>
                </div>
                <div class="flex items-center">
                    <i class="fa-solid fa-calendar-alt text-amber-500 mr-2"></i>
                    <p class="text-gray-600">{{$post->created_at->diffForHumans()}}</p>
                </div>
            </div>

            <!-- Apply Button -->
            <div class="mt-4 ">
                <a href="#apply_form" class="btn bg-blue-600 text-white hover:bg-blue-700">Apply Now</a>
                <div class="modal" role="dialog" id="apply_form">
                    <div class="modal-box">
                        <h3 class="text-lg font-bold text-center">Application for <em class="text-transparent bg-clip-text bg-gradient-to-r from-blue-700 via-amber-600 to-sky-600">{{$post->position}}</em></h3>
                        <form action="{{url('/newsfeed/jobapply/'.$post->id)}}" method="POST" class="py-4 space-y-3">
                            @csrf
                            <label class="input input-bordered input-info flex items-center gap-2">
                                Name
                                <input type="text" class="grow " name="name" placeholder="Enter your name" />
                            </label>

                            @if(Auth::user())
                            <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                            @endif

                            <label class="input input-bordered input-info flex items-center gap-2">
                                Email
                                <input type="text" class="grow" name="email" placeholder="Enter your gmail" />
                            </label>

                            <label class="input input-bordered input-info flex items-center gap-2">
                                Salary
                                <input type="text" class="grow" name="salary" placeholder="What's your expected salary?" />
                            </label>

                            <textarea class="textarea textarea-info w-full" name="experience" placeholder="Enter your experience..."></textarea>

                            <input type="submit" id="submit" class="hidden">
                        </form>
                        <div class="modal-action">
                            <label for="submit" class="btn btn-primary ">
                                Submit
                            </label>
                            <a href="#" class="btn">Close!</a>
                        </div>
                    </div>
                </div>

                <label for="my_modal_7" class="btn bg-amber-500 text-white hover:bg-amber-600">See More...</label>

                <!-- Put this part before </body> tag -->
                <input type="checkbox" id="my_modal_7" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box ">
                        <h3 class="text-lg font-bold text-center">Job Details</h3>
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-gray-800">{{$post->title}}</h2>

                        </div>
                        <p class="text-gray-600">For <span class="font-semibold">{{$post->position}}</span></p>

                        <!-- Job Details -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 mt-4">
                            <div class="flex items-center">
                                <i class="fa-solid fa-layer-group text-blue-500 mr-2"></i>
                                <p class="text-gray-600">{{$post->category->name}}</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-dollar-sign text-green-500 mr-2"></i>
                                <p class="text-gray-600">{{$post->salary}}</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-calendar-alt text-amber-500 mr-2"></i>
                                <p class="text-gray-600">{{$post->created_at->diffForHumans()}}</p>
                            </div>

                            <div class="flex items-center">
                                <i class="fa-solid fa-square-envelope text-indigo-500 mr-2"></i>
                                <p class="text-gray-600">Description</p>
                            </div>
                            <div>
                                {{$post->description}}
                            </div>
                        </div>
                    </div>
                    <label class="modal-backdrop" for="my_modal_7">Close</label>
                </div>

            </div>

        </div>
        @endforeach

    </div>
</div>

<!-- Font Awesome CDN for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>
