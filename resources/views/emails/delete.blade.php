@extends('base')

@section('content')
    <div class="bg-gray-700 rounded-lg shadow-xl overflow-hidden w-full max-w-md mx-4 h-fit">
        <!-- Card Header -->
        <div class="bg-red-50 px-6 py-4 border-b border-red-100 flex items-center">
            <h3 class="text-lg font-semibold text-gray-800">Deleting {{ $email->name }}&apos;s email...</h3>
        </div>

        <!-- Card Body -->
        <div class="p-6">
            <p class="text-white mb-4">Are you sure you want to delete this {{ $email->email }} email?</p>
            <p class="text-sm text-white">This action cannot be undone. The email will be permanently removed.</p>
        </div>

        <!-- Card Footer -->
        <div class="bg-gray-600 px-6 py-4 flex justify-end space-x-3">
            <form action="{{ route('emails.destroy', $email->id) }}" method="POST" class="space-x-1">
                @csrf
                @method('DELETE')
                <a href="{{ route('emails.index') }}"
                    class="px-4 py-2 text-white font-medium rounded-md border border-gray-300 hover:bg-gray-700 transition">
                    Cancel
                </a>
                <button type="submit"
                    class="px-4 py-2 cursor-pointer bg-red-600 text-white font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition">
                    Delete
                </button>
            </form>
        </div>
    </div>
@endsection
