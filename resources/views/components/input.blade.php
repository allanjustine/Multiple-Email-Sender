@props([
    'type' => 'text',
    'name',
    'value',
    'placeholder',
    'label',
])

<div class="flex flex-col space-y-1">
    <label for="{{ $name }}" class="text-white">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}"
        class="w-full p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded-md border border-gray-300 text-white white"
        placeholder="{{ $placeholder }}" />
    @error($name)
        <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>
