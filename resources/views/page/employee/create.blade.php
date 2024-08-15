<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Create employee') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="w-full grid grid-cols-1 my-5">
            <div class="col-span-1">
              <div class="w-1/2 mx-auto">
                <form enctype="multipart/form-data" action="{{ route('employees.store') }}" method="POST">
                  @csrf

                  <div class="">
                    <x-input-label for="company_id" :value="__('Company')" />
                    <select class="select2 block mt-1 w-full" name="company_id" id="company_id"
                      value="{{ old('company_id') }}">
                      <option></option>
                      @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                      @endforeach

                      @if ($companies->isEmpty())
                        <option disabled selected>No companies available</option>
                      @endif
                    </select>
                    <x-input-error :messages="$errors->get('company_id')" class="mt-2" />
                  </div>

                  <div class="my-2">
                    <x-input-label for="first_name" :value="__('First name')" />
                    <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                      :value="old('first_name')" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                  </div>

                  <div class="my-2">
                    <x-input-label for="last_name" :value="__('Last name')" />
                    <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                      :value="old('last_name')" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                  </div>

                  <div class="my-2">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                      :value="old('email')" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>

                  <div class="my-2">
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                      :value="old('phone')" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                  </div>

                  <div class="flex flex-row items-center justify-end gap-5 mt-10 w-full">
                    <a href="{{ route('employees.index') }}"
                      class="border py-2 px-3 rounded-xl bg-gray-900 hover:bg-gray-100 hover:text-gray-900">Cancel
                    </a>

                    <button type="submit"
                      class="border py-2 px-3 rounded-xl bg-gray-900 hover:bg-gray-100 hover:text-gray-900">Create
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('.select2').select2({
        placeholder: "Choose company"
      });
    });
  </script>
</x-app-layout>
