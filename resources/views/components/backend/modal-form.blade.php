@props(['formAction' => false, 'title' => null])

<div>
    @if ($formAction)
        <form wire:submit.prevent="{{ $formAction }}">
    @endif
    <div class="p-4 bg-white border-b sm:px-6 sm:py-4 border-gray-150">
        @if (!empty($title))
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                Update {{ $title }}
            </h3>
        @else
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                Add
            </h3>
        @endif
    </div>
    <div class="px-4 bg-white sm:p-6">
        {{ $slot }}
    </div>

    <div class="justify-between px-4 pb-5 bg-white sm:px-4 sm:flex">
        <button wire:click="$emit('closeModal')" type="button" class="btn btn-danger">Close</button>
        <button class="btn btn-primary" type="submit">
            @if (!empty($title))
                Update
            @else
                Save
            @endif
        </button>
    </div>
    @if ($formAction)
        </form>
    @endif
</div>
