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
        <form action="{{ route('send-email.store') }}" method="POST" enctype="multipart/form-data">
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
                <div>
                    <x-input name="attachments[]" hidden value="{{ old('attachments[]') }}" type="file" multiple
                        label="Attachments" placeholder="Enter attachments" id="attachments"></x-input>
                    @error('attachments.*')
                        <small class="text-red-500">
                            {{ $message }}
                        </small>
                    @enderror
                    <button class="w-full bg-blue-500 hover:bg-blue-600 py-2 cursor-pointer rounded-lg text-white"
                        type="button" onclick="document.getElementById('attachments').click()">Add Attachments</button>
                    <ul id="file-list" class="mt-2 text-sm text-gray-700 space-y-2"></ul>
                </div>
                <button type="submit"
                    class="w-full p-2 bg-blue-500 text-white hover:bg-blue-600 cursor-pointer rounded-lg">Send</button>
            </div>
        </form>
        <script>
            const fileInput = document.getElementById('attachments');
            const fileList = document.getElementById('file-list');

            let selectedFiles = [];

            fileInput.addEventListener('change', function() {
                selectedFiles = selectedFiles.concat(Array.from(fileInput.files));

                renderFileList();

                fileInput.value = '';
            });

            function renderFileList() {
                fileList.innerHTML = '';

                selectedFiles.forEach((file, index) => {
                    const li = document.createElement('li');
                    li.className = 'flex items-center gap-4 p-2 border rounded-md bg-gray-50';

                    const preview = document.createElement('div');
                    preview.className = 'w-16 h-16 flex items-center justify-center bg-white rounded border';

                    if (file.type.startsWith('image/')) {
                        const img = document.createElement('img');
                        img.src = URL.createObjectURL(file);
                        img.className = 'w-full h-full object-cover rounded';
                        preview.appendChild(img);
                    } else {
                        preview.innerHTML = '📄';
                    }

                    const info = document.createElement('div');
                    info.className = 'flex-1';
                    info.innerHTML = `
                <p class="font-medium">${file.name}</p>
                <p class="text-sm text-gray-500">${(file.size / 1024).toFixed(1)} KB</p>
            `;

                    const removeBtn = document.createElement('button');
                    removeBtn.className = 'text-red-500 hover:text-red-700 font-bold';
                    removeBtn.textContent = '✕';
                    removeBtn.onclick = () => {
                        selectedFiles.splice(index, 1);
                        renderFileList();
                    };

                    li.appendChild(preview);
                    li.appendChild(info);
                    li.appendChild(removeBtn);

                    fileList.appendChild(li);
                });
            }

            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', (e) => {
                    const dataTransfer = new DataTransfer();
                    selectedFiles.forEach(file => dataTransfer.items.add(file));
                    fileInput.files = dataTransfer.files;
                });
            }
        </script>

    </div>
@endsection
