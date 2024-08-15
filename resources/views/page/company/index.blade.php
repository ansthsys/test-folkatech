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

          <div class="my-8 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col">
              <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle">
                  <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5 border rounded-md">
                    <table class="min-w-full divide-y divide-gray-300">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col"
                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                          </th>
                          <th scope="col"
                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Name
                          </th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Website
                          </th>
                          <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 lg:pr-8">
                            <span class="sr-only">Edit</span>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($companies as $key => $company)
                          <tr>
                            <td
                              class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 text-center">
                              {{ $companies->firstItem() + $key }}
                            </td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                              <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0 overflow-hidden">
                                  <img class="rounded-full object-cover h-full border" src="{{ $company->logo }}"
                                    alt="{{ $company->name }}">
                                </div>
                                <div class="ml-4">
                                  <div class="font-medium text-gray-900">{{ $company->name }}</div>
                                  <div class="text-gray-500">{{ $company->email ?? '-' }}</div>
                                </div>
                              </div>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $company->website ?? '-' }}
                            </td>
                            <td
                              class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                              <a href="{{ route('companies.show', [$company->id]) }}"
                                class="text-indigo-600 hover:text-indigo-900 my-2">Detail<span
                                  class="sr-only">{{ $company->name }}</span></a>

                              <form action="{{ route('companies.destroy', [$company->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="text-indigo-600 hover:text-indigo-900 my-2">Delete<span
                                    class="sr-only">{{ $company->name }}</span></button>
                              </form>
                            </td>
                          </tr>
                        @endforeach

                        @if ($companies->isEmpty())
                          <tr>
                            <td colspan="4" class="py-4 pl-4 pr-3 text-sm text-gray-500 sm:pl-6 lg:pl-8 text-center">
                              No company found
                            </td>
                          </tr>
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div>
            {{ $companies->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
