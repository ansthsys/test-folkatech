<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Detail employee') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="w-full grid grid-cols-1 my-5">
            <div class="col-span-1">
              <div class="w-1/2 mx-auto">
                <div class="my-2">
                  <x-input-label for="company_id" :value="__('Company')" />
                  <x-text-input id="company_id" class="block mt-1 w-full" type="text" name="company_id"
                    :value="$employee->company->name" readonly />
                  <x-input-error :messages="$errors->get('company_id')" class="mt-2" />
                </div>

                <div class="my-2">
                  <x-input-label for="first_name" :value="__('First name')" />
                  <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                    :value="$employee->first_name" readonly />
                  <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </div>

                <div class="my-2">
                  <x-input-label for="last_name" :value="__('Last name')" />
                  <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                    :value="$employee->last_name" readonly />
                  <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </div>

                <div class="my-2">
                  <x-input-label for="email" :value="__('Email')" />
                  <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="$employee->email" readonly />
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="my-2">
                  <x-input-label for="phone" :value="__('Phone')" />
                  <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                    :value="$employee->phone" pattern="[0-9]" readonly />
                  <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="flex flex-row items-center justify-end gap-5 mt-10 w-full">
                  <form action="{{ route('employees.destroy', [$employee->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit"
                      class="border py-2 px-3 rounded-xl bg-red-400 text-gray-900 hover:bg-red-500 hover:text-gray-900">Delete</button>
                  </form>

                  <a href="{{ route('employees.index') }}"
                    class="border py-2 px-3 rounded-xl bg-gray-900 hover:bg-gray-100 hover:text-gray-900">Back
                  </a>

                  <a href="{{ route('employees.edit', [$employee->id]) }}"
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

  <script></script>
</x-app-layout>
