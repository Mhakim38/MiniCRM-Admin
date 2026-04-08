 <x-app-layout>
     <x-slot name="header">
         <div class="flex justify-between items-center">
             <h2 class="font-semibold text-2xl text-gray-800">{{ $company->name }}</h2>
             <a href="{{ route('companies.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">← Back</a>
         </div>
     </x-slot>
 
     <div class="py-12">
         <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                 <div class="p-8">
                     <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                         <div>
                             <h3 class="text-lg font-semibold text-gray-800 mb-6">Company Details</h3>
                             <div class="space-y-4">
                                 <div>
                                     <p class="text-gray-600 text-sm">Name</p>
                                     <p class="text-gray-900 font-semibold text-lg">{{ $company->name }}</p>
                                 </div>
                                 <div>
                                     <p class="text-gray-600 text-sm">Email</p>
                                     <p class="text-gray-900">{{ $company->email ?? '-' }}</p>
                                 </div>
                                 <div>
                                     <p class="text-gray-600 text-sm">Website</p>
                                     @if ($company->website)
                                         <a href="{{ $company->website }}" target="_blank" class="text-blue-600 hover:underline">{{ $company->website }}</a>
                                     @else
                                         <p class="text-gray-900">-</p>
                                     @endif
                                 </div>
                             </div>
                         </div>
                         <div>
                             <h3 class="text-lg font-semibold text-gray-800 mb-6">Logo</h3>
                             @if($company->logo)
                                 <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="h-32 w-32 rounded-lg object-cover shadow-md">
                             @else
                                 <div class="h-32 w-32 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                     No logo
                                 </div>
                             @endif
                         </div>
                     </div>
 
                     <div class="border-t pt-8">
                         <div class="flex justify-between items-center mb-6">
                             <h3 class="text-lg font-semibold text-gray-800">Employees</h3>
                             <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full font-semibold">{{ $company->employees->count() }} total</span>
                         </div>
                         @if($company->employees->count())
                             <div class="space-y-2">
                                 @foreach($company->employees as $employee)
                                     <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                         <div>
                                             <p class="font-semibold text-gray-900">{{ $employee->first_name }} {{ $employee->last_name }}</p>
                                             <p class="text-sm text-gray-600">{{ $employee->email }}</p>
                                         </div>
                                         <a href="{{ route('employees.edit', $employee) }}" class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition text-sm">Edit</a>
                                     </div>
                                 @endforeach
                             </div>
                         @else
                             <p class="text-gray-600">No employees yet.</p>
                         @endif
                     </div>
 
                     <div class="border-t mt-8 pt-6 flex gap-4">
                         <a href="{{ route('companies.edit', $company) }}" class="px-6 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition font-semibold">Edit Company</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>
