<x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl">Edit Company</h2>
     </x-slot>
 
     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <form method="POST" action="{{ route('companies.update', $company) }}" enctype="multipart/form-data">
                 @csrf @method('PUT')
 
                 <div class="mb-4">
                     <label class="block font-semibold">Name *</label>
                     <input type="text" name="name" class="w-full border p-2" required value="{{ old('name', $company->name) }}">
                     @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
                 </div>
 
                 <div class="mb-4">
                     <label class="block font-semibold">Email</label>
                     <input type="email" name="email" class="w-full border p-2" value="{{ old('email', $company->email) }}">
                     @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
                 </div>
 
                 <div class="mb-4">
                     <label class="block font-semibold">Logo (100x100 min)</label>
                     <input type="file" name="logo" class="w-full border p-2">
                     @error('logo') <span class="text-red-600">{{ $message }}</span> @enderror
                 </div>
 
                 <div class="mb-4">
                     <label class="block font-semibold">Website</label>
                     <input type="url" name="website" class="w-full border p-2" value="{{ old('website', $company->website) }}">
                     @error('website') <span class="text-red-600">{{ $message }}</span> @enderror
                 </div>
 
                 <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update</button>
                 <a href="{{ route('companies.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded">Cancel</a>
             </form>
         </div>
     </div>
 </x-app-layout>