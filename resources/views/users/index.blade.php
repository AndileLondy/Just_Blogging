@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <div class="flex justify-center">
        <div class="w-full lg:w-3/4 xl:w-2/3">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gradient-to-r from-blue-400 to-blue-500 text-black p-4 flex justify-between items-center rounded-t-lg">
                    <h4 class="text-xl font-semibold">Users List</h4>
                    <a href="{{ route('users.create') }}" class="text-blue-600 hover:bg-blue-100 rounded-lg py-2 px-4 text-sm font-bold flex items-center">
                        Add Users 
                    </a>
                </div>
                <div class="p-6">
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white shadow-md rounded-lg">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">Name</th>
                                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">Email</th>
                                    <th class="py-3 px-6 text-center text-sm font-medium text-gray-600">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-4 px-6 text-sm font-medium text-gray-700">{{ $user->name }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-500">{{ $user->email }}</td>
                                    <td class="py-4 px-6 text-center">
                                        <a href="{{ route('users.edit', $user) }}" class="bg-yellow-500 text-gray-600 hover:bg-yellow-600 rounded-lg py-1 px-3 text-xs font-semibold">
                                            Edit
                                        </a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-gray-600 hover:bg-red-600 rounded-lg py-1 px-3 text-xs font-semibold ml-2" onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="bg-gray-50 text-center py-3 rounded-b-lg">
                    <small class="text-gray-600 text-sm">Manage users efficiently with this dashboard.</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


