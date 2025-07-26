@props([
    'type' => 'text',
    'name',
    'value',
    'placeholder',
    'label',
    'multiple' => false,
    'hidden' => false,
    "id" => '',
])

<div class="flex flex-col space-y-1">
    <label for="{{ $name }}" class="text-white">{{ $label }}</label>
    <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}"
        class="w-full p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded-md border border-gray-300 text-white white"
        @if ($multiple) multiple @endif @if ($hidden) hidden @endif
        placeholder="{{ $placeholder }}" />
    @error($name)
        <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>
