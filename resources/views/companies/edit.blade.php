<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Company') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf
                        @method('patch')
                        <div>
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                                <input type="text" name="name" x-model="name"
                                    value="{{ old('name', $company->name) }}" id="name"
                                    class="@error('name') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required>
                            </div>
                            @error('name')
                                <div class="invalid-feedback mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="email"
                                class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2">
                                <input type="email" name="email" x-model="email"
                                    value="{{ old('email', $company->email) }}" id="email"
                                    class="@error('email') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('email')
                                <div class="invalid-feedback mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="logo" class="block text-sm font-medium leading-6 text-gray-900">Company
                                Logo</label>
                            <div class="mt-2">
                                <div class="mb-5 w-24 h-24">
                                    <img id="image-preview" src="{{ asset('storage/' . $company->logo) }}"
                                        alt="Company Logo" class="img-thumbnail">
                                </div>
                                <input type="file" name="logo" id="logo" class="@error('logo') is-invalid @enderror form-control-file"
                                    accept="image/*" onchange="previewImage(event)">
                            </div>
                            @error('logo')
                                <div class="invalid-feedback mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="website"
                                class="block text-sm font-medium leading-6 text-gray-900">Website</label>
                            <div class="mt-2">
                                <input type="text" name="website" @change="handleFileUpload"
                                    value="{{ old('website', $company->website) }}" id="website"
                                    class="@error('website') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('website')
                                <div class="invalid-feedback mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <x-primary-button type="submit" class="btn btn-primary">Update Company</x-primary-button>
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
