<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800">Employees</h2>
            <a href="{{ route('employees.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold">
                + Add Employee
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($employees->count())
                <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="px-6 py-4 text-left font-semibold text-gray-700">First Name</th>
                                <th class="px-6 py-4 text-left font-semibold text-gray-700">Last Name</th>
                                <th class="px-6 py-4 text-left font-semibold text-gray-700">Company</th>
                                <th class="px-6 py-4 text-left font-semibold text-gray-700">Email</th>
                                <th class="px-6 py-4 text-left font-semibold text-gray-700">Phone</th>
                                <th class="px-6 py-4 text-left font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr class="border-b hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-semibold text-gray-900">{{ $employee->first_name }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $employee->last_name }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('companies.show', $employee->company) }}" class="text-blue-600 hover:underline">{{ $employee->company->name }}</a>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">{{ $employee->email ?? '-' }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $employee->phone ?? '-' }}</td>
                                    <td class="px-6 py-4 space-x-3 flex">
                                        <a href="{{ route('employees.show', $employee) }}" class="px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition text-sm font-semibold">View</a>
                                        <a href="{{ route('employees.edit', $employee) }}" class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition text-sm font-semibold">Edit</a>
                                        <form method="POST" action="{{ route('employees.destroy', $employee) }}" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition text-sm font-semibold" onclick="return confirm('Delete this employee?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $employees->links() }}
                </div>
            @else
                <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                    <p class="text-gray-600 text-lg">No employees found. <a href="{{ route('employees.create') }}" class="text-blue-600 hover:underline">Add one now!</a></p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
