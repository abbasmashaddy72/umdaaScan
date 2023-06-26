@can('prescription_view')
    <div class="flex mt-2 space-x-2">
        @foreach ($prescription_images as $item)
            <a href="{{ asset('storage/' . $item) }}" data-lightbox="prescription_images{{ $name }}">
                <img class="w-12 h-12 rounded-lg shadow-md" src='{{ asset('storage/' . $item) }}' />
            </a>
        @endforeach
    </div>
@endcan
