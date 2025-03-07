@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center py-10">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-3xl overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white text-center py-5">
            <h3 class="text-xl font-semibold">Edit User</h3>
        </div>
        <div class="px-6 py-6">
            <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Name</label>
                    <input type="text" name="name" class="w-full p-3 rounded-lg shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" value="{{ $user->name }}" placeholder="Enter full name" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" class="w-full p-3 rounded-lg shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" value="{{ $user->email }}" placeholder="Enter email address" required>
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('users.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                        Back to Users
                    </a>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg shadow-md transition">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
