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
                    <x-primary-button>
                        <a href="{{ route('companies.create') }}" class="btn btn-primary">add company</a>
                    </x-primary-button>
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-base text-blue-900">
                                Company Logo
                            </th>
                            <th scope="col" class="px-6 py-3 text-base text-blue-900">
                                Company Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-base text-blue-900">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-base text-blue-900">
                                Website
                            </th>
                            <th scope="col" class="px-6 py-3 text-base text-blue-900">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex justify-left rounded border border-y-sky-800 border-x-sky-950 w-20 h-20"
                                        id="logo-holder">
                                        <img id="company-logo" src="{{ asset('storage/' . $company->logo) }}"
                                            class="rounded">
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $company->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $company->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $company->website }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('companies.edit', $company) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <form method="POST" action="{{ route('companies.destroy', $company) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('companies.destroy', $company) }}"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                            onclick="event.preventDefault(); this.closest('form').submit();">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-6 py-3">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
