 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl">{{ $company->name }}</h2>
     </x-slot>
 
     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white p-6 rounded shadow">
                 <p><strong>Name:</strong> {{ $company->name }}</p>
                 <p><strong>Email:</strong> {{ $company->email }}</p>
                 <p><strong>Website:</strong> {{ $company->website }}</p>
                 <p><strong>Logo:</strong> 
                     @if($company->logo)
                         <img src="{{ asset('storage/' . $company->logo) }}" width="100">
                     @else
                         No logo
                     @endif
                 </p>
                 <p><strong>Employees:</strong> {{ $company->employees->count() }}</p>
 
                 <a href="{{ route('companies.edit', $company) }}" class="mt-4 px-4 py-2 bg-yellow-600 text-white rounded">Edit</a>
                 <a href="{{ route('companies.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded">Back</a>
             </div>
         </div>
     </div>
 </x-app-layout>
