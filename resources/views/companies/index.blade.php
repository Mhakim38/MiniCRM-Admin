 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl">Companies</h2>
     </x-slot>
 
     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <a href="{{ route('companies.create') }}" class="mb-4 px-4 py-2 bg-blue-600 text-white rounded">
                 Add Company
             </a>
 
             @if ($companies->count())
                 <table class="w-full border">
                     <thead>
                         <tr class="bg-gray-100">
                             <th class="border p-2">Name</th>
                             <th class="border p-2">Email</th>
                             <th class="border p-2">Website</th>
                             <th class="border p-2">Actions</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($companies as $company)
                             <tr>
                                 <td class="border p-2">{{ $company->name }}</td>
                                 <td class="border p-2">{{ $company->email }}</td>
                                 <td class="border p-2">{{ $company->website }}</td>
                                 <td class="border p-2">
                                     <a href="{{ route('companies.show', $company) }}" class="text-blue-600">View</a>
                                     <a href="{{ route('companies.edit', $company) }}" class="text-yellow-600">Edit</a>
                                     <form method="POST" action="{{ route('companies.destroy', $company) }}" style="display:inline;">
                                         @csrf @method('DELETE')
                                         <button type="submit" class="text-red-600" onclick="return confirm('Delete?')">Delete</button>
                                     </form>
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
 
                 {{ $companies->links() }}
             @else
                 <p>No companies found.</p>
             @endif
         </div>
     </div>
 </x-app-layout>
