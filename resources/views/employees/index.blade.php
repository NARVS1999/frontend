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
                    <x-primary-button>
                        <a href="{{ route('employees.create') }}" class="btn btn-primary">add employee</a>
                    </x-primary-button>
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-base text-blue-900">
                                Employee Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-base text-blue-900">
                                Company
                            </th>
                            <th scope="col" class="px-6 py-3 text-base text-blue-900">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-base text-blue-900">
                                Phone
                            </th>
                            <th scope="col" class="px-6 py-3 text-base text-blue-900">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $employee->first_name . ' ' . $employee->last_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $employee->company_id ? $employee->company->name : 'No Company' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $employee->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $employee->phone }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('employees.edit', $employee) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <form method="POST" action="{{ route('employees.destroy', $employee) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('employees.destroy', $employee) }}"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                            onclick="event.preventDefault(); this.closest('form').submit();">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-6 py-3">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
