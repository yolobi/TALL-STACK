<div class="min-h-screen w-full flex justify-center">
    <div class="bg-white shadow p-4 rounded-lg">
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button wire:click="logout" type="submit" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Logout</button>
        </div>
        @if ($statusEdit)
            @livewire('berkas-update')
        @else
            @livewire('upload-berkas')
        @endif
        @livewire('berkas-index')
    </div>
</div>