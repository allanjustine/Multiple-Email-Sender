@extends('base')

@section('content')
    <div class="max-w-4xl mx-auto text-center mt-30">
        <div>
            <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mx-auto shadow-lg">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/014/440/980/small_2x/email-message-icon-design-in-blue-circle-png.png"
                    alt="LOGO">
            </div>
        </div>

        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
            Send emails with confidence
        </h1>

        <p class="text-xl md:text-2xl text-gray-100 mb-10 max-w-2xl mx-auto">
            Mailer delivers your transactional and marketing emails with 99.9% uptime and real-time analytics.
        </p>

        <div class="text-center">
            <a href="{{ route('emails.index') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-3 rounded-lg cursor-pointer">Proceed</a>
        </div>
    </div>
@endsection
