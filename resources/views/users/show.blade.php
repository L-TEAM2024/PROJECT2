@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">{{ $user->name }}</h1>

        <div class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
            <p class="text-gray-700 text-lg mb-4"><strong>Email:</strong> {{ $user->email }}</p>

            <a href="{{ route('users.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back to Users
            </a>
        </div>
    </div>
@endsection
