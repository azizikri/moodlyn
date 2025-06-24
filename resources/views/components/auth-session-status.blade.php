@props(['status'])

@if ($status)
    <div
        {{ $attributes->merge(['class' => 'font-medium text-sm text-[#8B6F47] bg-[#F7E7D3] px-4 py-2 rounded-lg border border-[#E5D5C8]']) }}>
        {{ $status }}
    </div>
@endif
