<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Employees') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="flex flex-row items-center justify-end w-full">

            <a href="{{ route('employees.create') }}"
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
                          <th scope="col"
                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                            Email
                          </th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Phone
                          </th>
                          <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 lg:pr-8">
                            <span class="sr-only">Edit</span>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($employees as $key => $employee)
                          <tr>
                            <td
                              class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 text-center">
                              {{ $employees->firstItem() + $key }}
                            </td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                              <div class="flex items-center">
                                <div class="ml-4">
                                  <div class="font-medium text-gray-900">
                                    {{ "$employee->first_name $employee->last_name" }}</div>
                                  <div class="text-gray-500">{{ $employee->company->name }}</div>
                                </div>
                              </div>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                              {{ $employee->email ?? '-' }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                              {{ $employee->phone ?? '-' }}
                            </td>
                            <td
                              class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                              <a href="{{ route('employees.show', [$employee->id]) }}"
                                class="text-indigo-600 hover:text-indigo-900 my-2">Detail<span
                                  class="sr-only">{{ $employee->name }}</span></a>
                            </td>
                          </tr>
                        @endforeach

                        @if ($employees->isEmpty())
                          <tr>
                            <td colspan="4" class="py-4 pl-4 pr-3 text-sm text-gray-500 sm:pl-6 lg:pl-8 text-center">
                              No employee found
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
            {{ $employees->onEachSide(1)->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
