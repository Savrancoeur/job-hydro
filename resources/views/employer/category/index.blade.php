@extends('employer.layout.master')
@section('content')
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

    <div class="flex justify-between items-center mb-4">
        <h3 class="font-bold">Categories</h3>
        <a href="{{url('employer/category/create')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i> Create
            Category</a>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-xs">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                    <tr>
                        <th>{{ $index + 1}}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <form action="{{ url('employer/category/'.$category->id) }}" method="POST" class="flex items-center space-x-2">
                                @csrf
                                @method('DELETE')
                                <a href="{{ url('employer/category/'.$category->id.'/edit') }}" class="btn btn-sm btn-accent"
                                    title="edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>

                                <button type="submit" class="btn btn-sm btn-error" title="delete"
                                    onclick="return confirm('Are you sure you want to delete?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
