@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="text-indigo-600 hover:text-indigo-900">&larr; Back to Users</a>
    </div>

    <div class="bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-white mb-6">Create New User</h2>

            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <input id="password" type="password" name="password" required class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Role -->
                <div class="mb-6">
                    <label for="role" class="block text-sm font-medium text-gray-300">Role</label>
                    <select id="role" name="role" class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end">
                    <a href="{{ route('admin.users.index') }}" class="mr-3 text-sm text-gray-300 hover:text-white">Cancel</a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-200 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 transition ease-in-out duration-150">
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
