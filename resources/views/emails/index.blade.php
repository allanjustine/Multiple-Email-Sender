@extends('base')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-white">Email Management</h1>
            <div class="flex gap-1">
                <a href="{{ route('send-email') }}"
                    class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg flex items-center cursor-pointer">
                    Send Email
                </a>
                <a href="{{ route('emails.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center cursor-pointer">
                    Add Email
                </a>
            </div>
        </div>

        <div class="bg-gray-700 rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-800">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Email</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Name</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Created At</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-700 divide-y divide-gray-200">
                        @forelse ($emails as $email)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $email->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{ $email->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{ $email->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                    {{ $email->created_at->format('Y-m-d H:i:s') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('emails.edit', $email->id) }}"
                                        class="cursor-pointer text-blue-500 hover:text-blue-600 mr-3 edit-btn">Edit</a>
                                    <a href="{{ route('emails.delete', $email->id) }}"
                                        class="cursor-pointer text-red-500 hover:text-red-600 delete-btn">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-white font-bold text-md py-5">
                                    No emails found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
