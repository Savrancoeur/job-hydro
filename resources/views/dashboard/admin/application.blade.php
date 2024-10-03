@extends('dashboard.layout.admin')
@section('content')
    <div class="overflow-x-auto ">

        <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-green-100 rounded-lg p-4 shadow">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold mb-2">Employers</h2>
                    <i class="fa-solid fa-user-tie text-2xl"></i>
                </div>
                <p class="text-2xl font-bold">{{$users->where('role','0')->count()}}</p>
            </div>

            <div class="bg-blue-100 rounded-lg p-4 shadow">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold mb-2">Employees</h2>
                    <i class="fa-solid fa-users text-2xl"></i>
                </div>
                <p class="text-2xl font-bold">{{$users->where('role','1')->count()}}</p>
            </div>

            <div class="bg-yellow-100 rounded-lg p-4 shadow">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold mb-2">Paid Users</h2>
                    <i class="fa-solid fa-user-check text-2xl"></i>
                </div>
                <p class="text-2xl font-bold">{{$count}}</p>
            </div>
        </div>
    </div>
@endsection
