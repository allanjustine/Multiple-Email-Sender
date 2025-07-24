@extends('base');

@section('content')
    <div class="border w-1/2 border-gray-500 p-10 rounded-lg h-fit">
        <div class="flex flex-col items-center">
            <a href="{{ route('emails.index') }}"
                class="text-blue-500 hover:text-blue-600 text-xl font-bold hover:underline">Back to list of emails</a>
            <h1 class="text-white text-xl font-bold">
                Create Email
            </h1>
        </div>
        <form action="{{ route('emails.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="space-y-5">
                <div>
                    <x-input name="email" value="{{ old('email') }}" type="email" label="Email"
                        placeholder="Enter subject"></x-input>
                </div>
                <div>
                    <x-input name="name" value="{{ old('name') }}" type="text" label="Name"
                        placeholder="Enter name"></x-input>
                </div>
                <button type="submit"
                    class="w-full p-2 bg-blue-500 text-white hover:bg-blue-600 cursor-pointer rounded-lg">Create</button>
            </div>
        </form>
    </div>
@endsection
