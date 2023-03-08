@props(['value', 'required' => false])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    <span>{{ $value ?? $slot }}</span>
    @if ($required)
        <span class="text-red-500">*</span>
    @endif
</label>
