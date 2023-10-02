<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Employee') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf
                        @method('patch')
                        <div>
                            <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First
                                Name</label>
                            <div class="mt-2">
                                <input type="text" name="first_name" x-model="first_name"
                                    value="{{ old('first_name', $employee->first_name) }}" id="first_name"
                                    class="@error('first_name') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required>
                            </div>
                            @error('first_name')
                                <div class="invalid-feedback mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last
                                Name</label>
                            <div class="mt-2">
                                <input type="text" name="last_name" x-model="last_name"
                                    value="{{ old('last_name', $employee->last_name) }}" id="last_name"
                                    class="@error('first_name') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required>
                            </div>
                            @error('last_name')
                                <div class="invalid-feedback mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="company_id"
                                class="block text-sm font-medium leading-6 text-gray-900">Company</label>
                            <select name="company_id" id="company_id"
                                class="@error('company_id') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="" disabled selected>Select Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}"
                                        {{ $employee->company_id == $company->id ? 'selected' : '' }}>
                                        {{ $company->name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <div class="invalid-feedback mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="email"
                                class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2">
                                <input type="email" name="email" x-model="email"
                                    value="{{ old('email', $employee->email) }}" id="email"
                                    class="@error('email') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('email')
                                <div class="invalid-feedback mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="phone"
                                class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                            <div class="mt-2">
                                <input type="text" name="phone" x-model="phone"
                                    value="{{ old('phone', $employee->phone) }}" id="phone"
                                    class="@error('phone') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('phone')
                                <div class="invalid-feedback mt-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <x-primary-button type="submit" class="btn btn-primary">Update Employee</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function previewImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imagePreview = document.getElementById('image-preview');
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
