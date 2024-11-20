<x-app-layout>

    <div class="flex flex-row flex-wrap">
        <div class="flex-shrink w-full max-w-full px-3 md:px-4"> 
          <div class="flex flex-row items-center justify-between">
            <p class="my-3 text-lg font-bold">Users</p>
          
            <div class="flex flex-row items-center justify-between">
              
      
         

              <Link href="/users" >
                <button type="submit" form="user-setting" data-original-title="Delete" class="inline-block px-4 py-1 mb-3 mr-2 text-sm leading-5 text-center bg-green-500 border rounded text-slate-100 hover:text-white">
                  <i class="mr-1 text-base bx bx-save"></i>Back
                </button>
              </Link>

           

    
            </div>
          </div>
        </div> 
      </div>

  
      <x-splade-form action="{{ route('users.store') }}" method="POST" class="flex flex-row flex-wrap -mx-4 valid-form">
    
      <div class="flex-shrink w-1/2 max-w-full px-4 mb-4 form-group">

        <x-splade-input name="name" label="name" />  </div>
        <div class="flex-shrink w-full max-w-full px-4 mb-4 form-group md:w-1/2">
       
          <x-splade-input name="email" label="Email address" />
        </div>
        
       
        
        
        <div class="flex-shrink w-full max-w-full px-4 mb-4 form-group md:w-1/2">
          <x-splade-select name="is_admin" label="Is Admin" placeholder="Select Role">

            <option value="" disabled>Select User Role</option>
            <option value="1">Yes</option>
            <option value="0">No</option>

        </x-splade-select>
        </div>

        <div class="flex-shrink w-full max-w-full px-4 mb-4 form-group md:w-1/2">

          <x-splade-input type="password" name="password" label="password" />
        </div>
    
        <div class="flex-shrink w-full max-w-full px-4 mb-4 form-group md:w-1/2">
        <x-splade-submit  class="inline-block px-4 py-1 mb-3 text-sm leading-5 text-center bg-blue-500 border border-blue-500 rounded text-slate-100 hover:text-white hover:bg-cyan-600 hover:ring-0 hover:border-cyan-600 focus:bg-cyan-600 focus:border-cyan-600 focus:outline-none focus:ring-0"/>
        </div>
      
      </x-splade-form>

</x-app-layout>