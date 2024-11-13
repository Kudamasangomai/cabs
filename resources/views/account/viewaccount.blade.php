<x-app-layout>
    <div class="flex flex-row flex-wrap">
        <div class="flex-shrink w-full max-w-full px-3 md:px-4">
            <div class="flex flex-row items-center justify-between">
                <p class="my-3 text-lg font-bold ">Accounts of {{ $account->user->name }}</p>
                <!-- btn action -->
                <div class="flex flex-row items-center justify-between">

                    <Link modal href="/account">

                    <button type="submit" form="user-setting" data-original-title="Delete"
                        class="inline-flex items-center px-4 py-2 mb-3 mr-1 text-sm leading-5 text-center bg-blue-500 border rounded text-slate-100">
                        <svg fill="#ffffff" class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg>
                        </i>Back
                    </button>
                    </Link>

                </div>
              

            </div>

        </div>
    </div>

    <div class="flex flex-row flex-wrap items-center -mx-4">
        <div class="flex-shrink w-1/2 max-w-full px-4 mb-4 place-items-center">
            <h5>Name : {{ $account->user->name }}</h5>
            <h5>Email {{ $account->user->email }}</h5>
            <h5>National ID : {{ $account->nationalid }}</h5>
            <h5> Contact No : {{ $account->phonenumber }}</h5>
            <h5> DOB :{{ $account->dateofbirth }}</h5>
        </div>


        <div class="flex-shrink w-1/2 max-w-full px-4 mb-4 place-items-center">
            <h5> Account number - {{ $account->accountno }}</h5>
            <h5> Account Status - {{ $account->status }}</h5>

            @if($account->status == 'Rejected')
            <h5> Rejection reason - {{ $account->statusinfo }}</h5>
            @endif
           
        </div>
    </div>

    <div class="flex flex-row flex-wrap -mx-4">
        <div class="flex-shrink w-1/2 max-w-full px-4 mb-4">

            <div class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                 Passport photo
                <img
                  class="object-cover object-center rounded-full h-60 w-60"
                src="{{ Storage::url( $account->photo) }}"
                  alt=" image"
                />
              </div>
        </div>

        <div class="flex-shrink w-1/2 max-w-full px-4 mb-4">
            <div class="grid min-h-[140px] w-full place-items-center p-6">
                Identity 
                 <img
                   class="object-cover object-center mt-10"
                 src="{{ Storage::url( $account->image) }}"
                   alt=" image"
                 />
               </div>
        </div>
    </div>


    <div class="flex flex-row flex-wrap -mx-4">
        <div class="flex-shrink w-1/2 max-w-full px-4 mb-4 place-items-center">
            <h5> Proof Of Income</h5>
              <embed src="{{ asset('storage/' . $account->proofofincome) }}" type="application/pdf" width="100%" height="400px" />
  
        </div>
        <div class="flex-shrink w-1/2 max-w-full px-4 mb-4 place-items-center">
            <h5> Proof Of Residence</h5>
            <embed src="{{ asset('storage/' . $account->proofofresidency) }}" type="application/pdf" width="100%" height="400px" />

      </div>
    </div>

    @if(Auth::user()->is_admin)
    @if($account->status == 'Pending')
    <div class="flex flex-row items-center gap-2 mt-6">
        <x-splade-form method="post"  
            :action="route('account.approve', $account->id)" 
            :confirm="__('Confirm Everything Is Correct')" 
            :confirm-button="__('Approve')">
            <x-splade-submit :label="__('Approve')" />
        </x-splade-form>
        <div class="flex flex-row">

           
         

        </div>
    </div>

    <div class="flex flex-row items-center gap-2 mt-4">
        <x-splade-form method="post" 
            :action="route('account.reject', $account->id)" 
            :confirm="__('Are you sure you want to delete your account?')" 
            :confirm-button="__('Reject')" 
            class="flex items-center gap-2">
            
            <x-splade-input name="statusinfo" label="Reject Reason" required class="w-full" /> 
    
            <x-splade-submit danger :label="__('Reject')" class="h-full mt-6" />
        </x-splade-form>
    </div>
    @endif
@endif

</x-app-layout>
