<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Create Employee</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('employees.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-semibold">First Name *</label>
                    <input type="text" name="first_name" class="w-full border p-2" required value="{{ old('first_name') }}">
                    @error('first_name') <span class="text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Last Name *</label>
                    <input type="text" name="last_name" class="w-full border p-2" required value="{{ old('last_name') }}">
                    @error('last_name') <span class="text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Company *</label>
                    <select name="company_id" class="w-full border p-2" required>
                        <option value="">Select Company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('company_id') <span class="text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Email</label>
                    <input type="email" name="email" class="w-full border p-2" value="{{ old('email') }}">
                    @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Phone</label>
                    <input type="text" name="phone" class="w-full border p-2" value="{{ old('phone') }}">
                    @error('phone') <span class="text-red-600">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Create</button>
                <a href="{{ route('employees.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded">Cancel</a>
            </form>
        </div>
    </div>
</x-app-layout>
