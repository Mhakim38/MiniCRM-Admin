<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800">{{ $employee->first_name }} {{ $employee->last_name }}</h2>
            <a href="{{ route('employees.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">← Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-6">Employee Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-gray-600 text-sm">First Name</p>
                                    <p class="text-gray-900 font-semibold text-lg">{{ $employee->first_name }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm">Last Name</p>
                                    <p class="text-gray-900 font-semibold text-lg">{{ $employee->last_name }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm">Email</p>
                                    <p class="text-gray-900">{{ $employee->email ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm">Phone</p>
                                    <p class="text-gray-900">{{ $employee->phone ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-6">Company</h3>
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <p class="text-gray-600 text-sm mb-2">Assigned to</p>
                                <a href="{{ route('companies.show', $employee->company) }}" class="text-blue-600 hover:underline font-semibold text-lg">{{ $employee->company->name }}</a>
                                @if($employee->company->email)
                                    <p class="text-gray-600 text-sm mt-4">{{ $employee->company->email }}</p>
                                @endif
                                @if($employee->company->website)
                                    <a href="{{ $employee->company->website }}" target="_blank" class="text-blue-600 hover:underline text-sm block mt-2">{{ $employee->company->website }}</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="border-t pt-6 flex gap-4">
                        <a href="{{ route('employees.edit', $employee) }}" class="px-6 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition font-semibold">Edit Employee</a>
                        <a href="{{ route('companies.show', $employee->company) }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold">View Company</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
