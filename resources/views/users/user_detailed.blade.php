<x-app-layout>



  <div class="flex flex-row flex-wrap">
    <div class="flex-shrink w-full max-w-full px-3 md:px-4"> 
      <div class="flex flex-row items-center justify-between">
        <p class="my-3 text-lg font-bold">User </p>
      
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

     
  

                <div class="flex-shrink w-full max-w-full px-3 md:px-4"> 
                  <p class="my-3 text-lg font-bold">{{ $user->name }}</p>
                </div> 
                
      
      
    
    

    
   


</x-app-layout>