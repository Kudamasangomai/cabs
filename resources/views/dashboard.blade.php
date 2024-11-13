<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
             {{ __('Dashboard') }}
        </h2>
    </x-slot>

 
    <!-- row -->
    <div class="flex flex-row flex-wrap">
        <div class="flex-shrink w-full max-w-full px-3 md:px-4">
            <div class="flex flex-row items-center justify-between mb-2">
                <p class="my-3 text-base font-bold">Dashboard</p>

            </div>
        </div>
    </div>

    <!-- row -->
    @if (Auth::user()->is_admin)
        
   
    <div class="flex flex-row flex-wrap">
        <div class="flex-shrink w-full max-w-full px-3 mb-6 md:px-4 lg:w-1/2">
            <!-- box card -->
            <div
                class="h-full rounded bg-white shadow-[rgba(0,_0,_0,_0.4)_0px_30px_90px]" >
                <div class="relative px-4 py-1">

                    <div class="flex flex-row justify-between">
                        <div>
                        <h2 class="my-2 text-base font-semibold text-left text-slate-800">Rejected Application
                            <span class="w-3 h-3 px-2 text-white bg-red-600 rounded-full"> {{  $totalapplicationrejected }} </span> </h2>
                          
                        </div>
                    <div class="flex flex-row my-2 justify-normal">
                        <Link href="/notices" class="text-base font-semibold text-slate-800">
                            <svg  height="1em" viewBox="0 0 576 512">
                                <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                        </Link>

                        <Link href="/notices/create" class="ml-2 text-base font-semibold text-slate-800">
                            <svg  height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                        </Link>
                    </div>
                        
                    </div>
                    
                    <div class="splide nav-hidden" role="group" aria-label="Splide Basic HTML Example">
                        <div class="splide__track" >
                            
                    
                     
                         
                       
           

                            <div class="relative flex h-48 overflow-y-auto">
                                <table class="w-full text-sm text-left table-bordered-bottom table-sm">
                                    <thead>
                                        <tr>
                                           
                                            <th>Username </th>
                                            <th>Reason For rejection</th>
                                    
                                        </tr>
                                    </thead>
                                    <tbody>
        
                                        @foreach ($rejectedapplication as $app)
                                      <tr class="border-b dark:border-neutral-200 even:bg-gray-100 odd:bg-white">
                                        <td class="py-3">
                                            <div>
                                                 {{ $app->user->name }}
                                            </div>
                                        </td>

                                        <td class="py-3">
                                            <div>
                                                {{ $app->statusinfo }}
                                            </div>
                                        </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-shrink w-full max-w-full lg:w-1/2">
            <!-- row -->
            <div class="flex flex-row flex-wrap">
                <div class="flex-shrink w-1/2 max-w-full px-3 mb-6 md:px-4">
                    <!-- box card -->
                    <div
                        class="relative h-full p-3 overflow-hidden rounded shadow-[rgba(0,_0,_0,_0.4)_0px_30px_90px] sm:p-5 bg-[#0ea5e9]  ">
                        <div class="relative dark:text-slate-100">
                            <h2 class="mb-2 text-center">Total Application</h2>
                            <h3 class="text-4xl font-bold text-center">   {{ $totalapplication }}</h3>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-20">
                            <i class="text-6xl bx bx-smile text-cyan-500"></i>
                        </div>
                    </div>
                </div>

                <div class="flex-shrink w-1/2 max-w-full px-3 mb-6 md:px-4">
                    <!-- box card -->
                    <div
                        class="relative h-full p-3 overflow-hidden rounded shadow-[rgba(0,_0,_0,_0.4)_0px_30px_90px] sm:p-5 bg-[#ece02b]">
                        <div class="relative dark:text-slate-100">
                            <h2 class="mb-2 text-center">Pending Application </h2>
                            <h3 class="text-4xl font-bold text-center"> {{ $totalapplicationpending }} </h3>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-20">
                            <i class="text-6xl text-red-500 bx bx-sad"></i>
                        </div>
                    </div>
                </div>

                <div class="flex-shrink w-1/2 max-w-full px-3 mb-6 md:px-4">
                    <!-- box card -->
                    <div
                        class="relative h-full p-3 overflow-hidden rounded shadow-[rgba(0,_0,_0,_0.4)_0px_30px_90px] sm:p-5 bg-[#ff0000] ">
                        <div class="relative dark:text-slate-100">
                            <h2 class="mb-2 text-center">Rejected Application</h2>
                            <h3 class="text-4xl font-bold text-center"> {{ $totalapplicationrejected }} </h3>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-20">
                        
                        </div>
                    </div>
                </div>

                <div class="flex-shrink w-1/2 max-w-full px-3 mb-6 md:px-4">
                    <!-- box card -->
                    <div
                        class="relative h-full p-3 overflow-hidden rounded shadow-[rgba(0,_0,_0,_0.4)_0px_30px_90px] sm:p-5 bg-[#10b981]">
                        <div class="relative dark:text-slate-100">
                            <h2 class="mb-2 text-center">Aproved Application</h2>
                            <h3 class="text-4xl font-bold text-center">{{ $totalapplicationapproved }} </h3>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-20">
                            <i class="text-6xl text-green-500 bx bx-dollar-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
    </div>
    @else

    All your Account activity will be displayed here once you start Transacting
    @endif




</x-app-layout>
