@props(['header' => null])

<div {{ $attributes->merge(['class' => 'py-4']) }}>
    @if (isset($header))
        <div class="mb-4">
            {{ $header }}
        </div>
    @endif

    {{ $slot }}
</div>
