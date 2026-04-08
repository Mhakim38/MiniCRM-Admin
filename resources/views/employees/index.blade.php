<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Employees</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('employees.create') }}" class="mb-4 px-4 py-2 bg-blue-600 text-white rounded">
                Add Employee
            </a>

            @if ($employees->count())
                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">First Name</th>
                            <th class="border p-2">Last Name</th>
                            <th class="border p-2">Company</th>
                            <th class="border p-2">Email</th>
                            <th class="border p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td class="border p-2">{{ $employee->first_name }}</td>
                                <td class="border p-2">{{ $employee->last_name }}</td>
                                <td class="border p-2">{{ $employee->company->name }}</td>
                                <td class="border p-2">{{ $employee->email }}</td>
                                <td class="border p-2">
                                    <a href="{{ route('employees.show', $employee) }}" class="text-blue-600">View</a>
                                    <a href="{{ route('employees.edit', $employee) }}" class="text-yellow-600">Edit</a>
                                    <form method="POST" action="{{ route('employees.destroy', $employee) }}" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600" onclick="return confirm('Delete?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $employees->links() }}
            @else
                <p>No employees found.</p>
            @endif
        </div>
    </div>
</x-app-layout>
