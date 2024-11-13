<x-app-layout>
    <div class="flex flex-row flex-wrap">
        <div class="flex-shrink w-full max-w-full px-3 md:px-4">
            <div class="flex flex-row items-center justify-between">
                <p class="my-3 text-lg font-bold">Edit Account </p>
                <!-- btn action -->
                <div class="flex flex-row items-center justify-between">
    
               
    
                </div>
    
    
            </div>
    
        </div>
    </div>


    <x-splade-form :default="$account" action="{{ route('account.update',$account->id) }}" method="PUT" class="flex flex-row flex-wrap -mx-4 valid-form">
    
        <div class="flex-shrink w-1/2 max-w-full px-4 mb-4 form-group">
  
          <x-splade-input name="nationalid" label="National ID" value="{{ $account->nationalid }}" />  
          
        </div>

        <div class="flex-shrink w-1/2 max-w-full px-4 mb-4 form-group">

            <x-splade-input name='dateofbirth' label="DOB" date  />
        </div>

        <div class="flex-shrink w-1/2 max-w-full px-4 mb-4 form-group">

            <x-splade-input name='phonenumber' label="Mobile Number"  />
        </div>

        <div class="flex-shrink w-1/2 max-w-full px-4 mb-4 form-group md:w-1/2">
            <x-splade-select name="gender" label="Gender" placeholder="Select Role">
  
              <option value="" disabled>Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
  
          </x-splade-select>
          </div>

        <div class="flex-shrink w-full max-w-full px-4 mb-4 form-group">
            <label> National ID </label><br/>
            <label> (Valid Passport / Driver's Silence)</label>
            <x-splade-file name="identity" class="block w-full text-gray-900 border rounded-lg cursor-pointer bg-gray-50 "/>
        </div>


        <div class="flex-shrink w-full max-w-full px-4 mb-4 form-group">

            <embed src="{{ asset('storage/' . $account->proofofresidency) }}" type="application/pdf" width="100%" height="400px" />
  
            <label> Proof of Residency - (Current utility bill (Zesa, Stamped current bank statement from another bank bearing current address) )</label>
            <x-splade-file name="proofofresidency" class="block w-full text-gray-900 border rounded-lg cursor-pointer bg-gray-50 "/>
        </div>
          

        <div class="flex-shrink w-full max-w-full px-4 mb-4 form-group">

            <embed src="{{ asset('storage/' . $account->proofofincome) }}" type="application/pdf" width="100%" height="400px" />
  
            <label>Proof of income – Current Payslip (less than three months old)/Valid contract/ Letter from employer confirming employment.</label>
            <x-splade-file name="proofofincome" class="block w-full text-gray-900 border rounded-lg cursor-pointer bg-gray-50 "/>
        </div>

        
        <div class="flex-shrink w-full max-w-full px-4 mb-4 form-group">
            <label>Passport Size Photo</label>
            <x-splade-file name="photo" class="block w-full text-gray-900 border rounded-lg cursor-pointer bg-gray-50 "/>
        </div>
       
         
  
     
      
          <div class="flex-shrink w-full max-w-full px-4 mb-4 form-group md:w-1/2">
          <x-splade-submit  class="inline-block px-4 py-1 mb-3 text-sm leading-5 text-center bg-blue-500 border border-blue-500 rounded text-slate-100 hover:text-white hover:bg-cyan-600 hover:ring-0 hover:border-cyan-600 focus:bg-cyan-600 focus:border-cyan-600 focus:outline-none focus:ring-0"/>
          </div>
        
</x-splade-form>

</x-app-layout>