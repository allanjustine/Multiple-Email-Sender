@extends('base')

@section('content')
    <div class="border w-1/2 border-gray-500 p-10 rounded-lg h-fit">
        <div class="flex flex-col items-center">
            <a href="{{ route('emails.index') }}"
                class="text-blue-500 hover:text-blue-600 text-xl font-bold hover:underline">Go to list of emails</a>
            <h1 class="text-white text-xl font-bold">
                Send Email
            </h1>
        </div>
        <form action="{{ route('send-email.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="space-y-5">
                <div>
                    <x-input name="subject" value="{{ old('subject') }}" type="text" label="Subject"
                        placeholder="Enter subject"></x-input>
                </div>
                <div>
                    <x-input name="from_email" value="{{ old('from_email') }}" type="text" label="From email"
                        placeholder="Enter from email"></x-input>
                </div>
                <div>
                    <x-input name="from_name" value="{{ old('from_name') }}" type="text" label="From name"
                        placeholder="Enter from name"></x-input>
                </div>
                <div>
                    <x-input name="reply_to_email" value="{{ old('reply_to_email') }}" type="text" label="Reply to email"
                        placeholder="Enter reply to email"></x-input>
                </div>
                <div>
                    <x-input name="reply_to_name" value="{{ old('reply_to_name') }}" type="text" label="Reply to name"
                        placeholder="Enter reply to name"></x-input>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="content" class="text-white">Content</label>
                    <textarea name="content" name="content" placeholder="Enter content" cols="30" rows="10"
                        class="resize-none w-full p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded-md border border-gray-300 text-white">{{ old('content') }}</textarea>
                    @error('content')
                        <small class="text-red-500">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full p-2 bg-blue-500 text-white hover:bg-blue-600 cursor-pointer rounded-lg">Send</button>
            </div>
        </form>
    </div>
@endsection
