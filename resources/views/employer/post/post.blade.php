@extends('employer.layout.master')
@section('content')
    <form action="{{url('/employer/post/search')}}" method="post" class="flex justify-end items-center mt-3 w-full">
        @csrf
        <input type="text" name="search_data" placeholder="Search here" class="input input-bordered max-w-xs focus:w-96 me-3 transition-transform" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    @if(session()->has('success'))
        <div class="w-1/3 h-16 bg-green-600 text-white rounded-xl flex justify-between items-center p-2 ps-5" id="alert">
            <h1 class="text-lg">{{session()->get('success')}}</h1>
            <button class="btn btn-ghost" onclick="document.querySelector('#alert').addEventListener('click',function(){this.style.display='none'})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    <div class="flex justify-end mb-6">
    <!-- You can open the modal using ID.showModal() method -->
    <button class="btn btn-primary rounded-3xl drop-shadow-xl" onclick="my_modal_3.showModal()">Add New Post
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
    </button>
    <dialog id="my_modal_3" class="modal">
      <div class="modal-box w-full">
        <form method="dialog">
          <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <form action="{{url('employer/post')}}" method="POST" class="flex flex-col justify-between">
            @csrf
            <label for="">Job Title</label>
            <input type="text" placeholder="We are hiring!!" name="title" class="input input-bordered" />
            @error('title')
            <div class="text-error flex mb-5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
                {{$message}}</div>
            @enderror

            <label for="">Category</label>
            <select name="category" class="select select-ghost w-full border-b-gray-300">
                <option disabled selected>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category')
            <div class="text-error flex mb-5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
                {{$message}}</div>
            @enderror

            <label for="">Position</label>
            <input type="text" placeholder="Enter position" name="position" class="input input-bordered w-full" >
            @error('position')
            <div class="text-error flex mb-5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
                {{$message}}</div>
            @enderror

            <label for="">Salary</label>
            <input type="text" placeholder="Enter your salary" name="salary" class="input input-bordered w-full" >
            @error('salary')
            <div class="text-error flex mb-5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
                {{$message}}</div>
            @enderror

            <label>Description</label>
            <textarea id="" rows="10" class="textarea textarea-bordered" name="description"></textarea>
            <button type="submit" class="btn btn-primary mt-5">Post</button>
            <small class="text-gray-600">(Don't forget to check if you've filled all of the required fields before you post)</small>
        </form>
      </div>
    </dialog>
    </div>

    {{--main content--}}
    <div class="grid grid-cols-2 gap-3">
        @foreach($posts as $post)
            <div class="card card-side bg-base-100 shadow-xl" style="display:{{$post->showhide_status === 'hide' ? 'none' : ''}}">
        <div class="card-body">
            <div class="flex justify-between">
                <h2 class="card-title">{{$post->title}}</h2>
                <small>{{$post->created_at->diffForHumans()}}</small>
            </div>
            <h2 class="font-black">Category : <span>{{$post->category->name}}</span></h2>
            <h2 class="font-black">Salary: {{$post->salary}}</h2>
            <h2 class="font-black">Description :</h2>
            <p class="max-h-[200px] overflow-y-scroll">{{$post->description}}</p>
            <div class="card-actions justify-start">
                <form action="{{url('employer/post/'.$post->id)}}" method="POST" class="flex items-center space-x-2">
                    @csrf
                    @method('DELETE')
                    <a href="{{url('employer/post/'.$post->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" class="btn btn-error btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        </div>
        @endforeach
    </div>
@endsection
