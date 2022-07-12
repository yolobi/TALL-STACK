<form wire:submit.prevent="store" action="#" method="POST">
    <div class="shadow sm:rounded-md sm:overflow-hidden">
      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
        <div class="grid grid-cols-3 gap-6">
          <div class="col-span-3 sm:col-span-2">
            <label for="file-name" class="block text-sm font-medium text-gray-700"> File Name </label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input wire:model="name" type="text" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="File Name">
            </div>
          </div>
        </div>

        <div>
          <div class="mt-1 flex  pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="space-y-1 text-center">
              <div class="flex text-sm text-gray-600">
                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                  @if (empty($berkas))
                    <span>Upload a file</span>
                  @else
                    <span>{{ $berkas->getClientOriginalName() }}</span>
                  @endif
                  <input wire:model="berkas" id="file-upload" name="file-upload" type="file" class="sr-only">
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Upload</button>
      </div>
    </div>
</form>