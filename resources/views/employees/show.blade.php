<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">{{ $employee->first_name }} {{ $employee->last_name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <p><strong>First Name:</strong> {{ $employee->first_name }}</p>
                <p><strong>Last Name:</strong> {{ $employee->last_name }}</p>
                <p><strong>Company:</strong> {{ $employee->company->name }}</p>
                <p><strong>Email:</strong> {{ $employee->email }}</p>
                <p><strong>Phone:</strong> {{ $employee->phone }}</p>

                <a href="{{ route('employees.edit', $employee) }}" class="mt-4 px-4 py-2 bg-yellow-600 text-white rounded">Edit</a>
                <a href="{{ route('employees.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>
