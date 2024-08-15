<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Detail company') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="w-full grid grid-cols-1 my-5">
            <div class="col-span-1">
              <div class="w-1/2 mx-auto">
                <div class="size-36 mb-7 mx-auto">
                  <div
                    class="flex items-center justify-center rounded-lg overflow-hidden border bg-gray-600 h-full w-full">
                    <img src="{{ $company->logo }}" alt="{{ $company->name }}" class="h-full object-cover">
                  </div>
                </div>

                <div class="">
                  <x-input-label for="name" :value="__('Name')" />
                  <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$company->name"
                    readonly />
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="my-2">
                  <x-input-label for="email" :value="__('Email')" />
                  <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$company->email"
                    readonly />
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="my-2">
                  <x-input-label for="website" :value="__('Website')" />
                  <x-text-input id="website" class="block mt-1 w-full" type="url" name="website" :value="$company->website"
                    readonly />
                  <x-input-error :messages="$errors->get('website')" class="mt-2" />
                </div>

                <div class="flex flex-row items-center justify-end gap-5 mt-10 w-full">
                  <form action="{{ route('companies.destroy', [$company->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit"
                      class="border py-2 px-3 rounded-xl bg-red-400 text-gray-900 hover:bg-red-500 hover:text-gray-900">Delete</button>
                  </form>

                  <a href="{{ route('companies.index') }}"
                    class="border py-2 px-3 rounded-xl bg-gray-900 hover:bg-gray-100 hover:text-gray-900">Back
                  </a>

                  <a href="{{ route('companies.edit', [$company->id]) }}"
                    class="border py-2 px-3 rounded-xl bg-gray-900 hover:bg-gray-100 hover:text-gray-900">Edit
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
