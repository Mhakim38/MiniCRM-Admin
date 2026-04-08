 <x-app-layout>
     <x-slot name="header">
         <div class="flex justify-between items-center">
             <h2 class="font-semibold text-2xl text-gray-800">Companies</h2>
             <a href="{{ route('companies.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold">
                 + Add Company
             </a>
         </div>
     </x-slot>
 
     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             @if ($companies->count())
                 <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
                     <table class="w-full">
                         <thead>
                             <tr class="bg-gray-100 border-b">
                                 <th class="px-6 py-4 text-left font-semibold text-gray-700">Logo</th>
                                 <th class="px-6 py-4 text-left font-semibold text-gray-700">Name</th>
                                 <th class="px-6 py-4 text-left font-semibold text-gray-700">Email</th>
                                 <th class="px-6 py-4 text-left font-semibold text-gray-700">Website</th>
                                 <th class="px-6 py-4 text-left font-semibold text-gray-700">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($companies as $company)
                                 <tr class="border-b hover:bg-gray-50 transition">
                                     <td class="px-6 py-4">
                                         @if ($company->logo)
                                             <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="h-10 w-10 rounded object-cover">
                                         @else
                                             <span class="text-gray-400 text-sm">No logo</span>
                                         @endif
                                     </td>
                                     <td class="px-6 py-4 font-semibold text-gray-900">{{ $company->name }}</td>
                                     <td class="px-6 py-4 text-gray-600">{{ $company->email ?? '-' }}</td>
                                     <td class="px-6 py-4 text-gray-600">
                                         @if ($company->website)
                                             <a href="{{ $company->website }}" target="_blank" class="text-blue-600 hover:underline">Visit</a>
                                         @else
                                             -
                                         @endif
                                     </td>
                                     <td class="px-6 py-4 space-x-3 flex">
                                         <a href="{{ route('companies.show', $company) }}" class="px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition text-sm font-semibold">View</a>
                                         <a href="{{ route('companies.edit', $company) }}" class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition text-sm font-semibold">Edit</a>
                                         <form method="POST" action="{{ route('companies.destroy', $company) }}" style="display:inline;">
                                             @csrf @method('DELETE')
                                             <button type="submit" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition text-sm font-semibold" onclick="return confirm('Delete this company?')">Delete</button>
                                         </form>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
 
                 <div class="mt-6">
                     {{ $companies->links() }}
                 </div>
             @else
                 <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                     <p class="text-gray-600 text-lg">No companies found. <a href="{{ route('companies.create') }}" class="text-blue-600 hover:underline">Create one now!</a></p>
                 </div>
             @endif
         </div>
     </div>
 </x-app-layout>
