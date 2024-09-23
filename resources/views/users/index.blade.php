@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8 ">
        <h1 class="text-3xl font-bold mb-6">Users</h1>

        <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6 inline-block">
            Create New User
        </a>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <table class="min-w-full h-96 bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase">Name</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase">Email</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 border-b border-gray-300">{{ $user->name }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $user->email }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">
                            <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700 mr-4">Edit</a>
                            <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 hover:text-blue-700 mr-4">Show</a>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
       <!-- Pagination Links -->
       <div class="mt-6">
        {{ $users->links('pagination::tailwind') }}
    </div>

@endsection
