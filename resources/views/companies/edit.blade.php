<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">Edit Company</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <form method="POST" action="{{ route('companies.update', $company) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Name *</label>
                        <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required value="{{ old('name', $company->name) }}">
                        @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('email', $company->email) }}">
                        @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Logo (100x100 min)</label>
                        @if($company->logo)
                            <div class="mb-3 flex items-center gap-4">
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Current logo" class="h-16 w-16 rounded-lg object-cover shadow">
                                <span class="text-sm text-gray-600">Current logo</span>
                            </div>
                        @endif
                        <input type="file" name="logo" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('logo') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Website</label>
                        <input type="url" name="website" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('website', $company->website) }}">
                        @error('website') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-semibold">Update</button>
                        <a href="{{ route('companies.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition font-semibold">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>