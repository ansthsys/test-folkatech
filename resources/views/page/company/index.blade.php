<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Companies') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="flex flex-row items-center justify-end w-full">
            {{-- <h2>Company lists</h2> --}}

            <a href="{{ route('companies.create') }}"
              class="border py-2 px-3 rounded-xl bg-gray-900 hover:bg-gray-100 hover:text-gray-900">Create
            </a>
          </div>

          <div class="overflow-auto bg-gray-800 my-5 w-full">
            <table class="border rounded-xl overflow-auto w-full">
              <thead class="border rounded-xl">
                <tr class="border">
                  <th class="text-center py-2"></th>
                  <th class="text-center py-2"></th>
                  <th class="text-center py-2">Name</th>
                  <th class="text-center py-2">Email</th>
                  <th class="text-center py-2">Website</th>
                  <th class="text-center py-2">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($companies as $company)
                  <tr class="hover:bg-gray-700">
                    <td class="text-center min-w-10">{{ $company->id }}</td>
                    <td class="">
                      <div
                        class="flex items-center justify-center m-2 size-14 rounded-lg overflow-hidden border bg-gray-600">
                        <img src="{{ $company->logo }}" alt="{{ $company->name }}" class="">
                      </div>
                    </td>
                    <td class="">{{ $company->name }}</td>
                    <td class="">{{ $company->email }}</td>
                    <td class="">{{ $company->website }}</td>
                    <td class="">
                      <div class="flex flex-row items-center justify-evenly">
                        <a href="{{ route('companies.show', $company->id) }}"
                          class="border py-1 px-2 text-sm rounded-full bg-gray-900 hover:bg-gray-100 hover:text-gray-900">Detail
                        </a>
                        <a href="{{ route('companies.edit', $company->id) }}"
                          class="border py-1 px-2 text-sm rounded-full bg-gray-900 hover:bg-gray-100 hover:text-gray-900">Edit
                        </a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit"
                            class="border py-1 px-2 text-sm rounded-full bg-gray-900 hover:bg-gray-100 hover:text-gray-900">Delete
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div>
            {{ $companies->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
