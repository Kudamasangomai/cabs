<div class="min-h-screen bg-gray-200 bg-gradient-to-b">
    @include('layouts.navigation')

    <nav id="sidebar-menu" x-description="Mobile menu" x-bind:aria-expanded="open"
    :class="{ 'w-56 ml-0 md:w-20 sidebar-small': open, 'w-64 -ml-64 md:ml-0': !(open) }"
    class="fixed z-40 w-56 h-screen text-white transition-all duration-500 ease-in-out "
    style="background-image: url('/images/trucknew.jpg'); background-size: cover; background-position: center;">
    <div class="h-full overflow-y-auto sidebar-small-overflow scrollbars show bg-[#0437F2]">


        <ul id="side-menu" x-data="{ selected: 1 }"
                class="flex flex-col float-none w-full px-1 pb-6 mt-10 text-center ont-medium s sidebar-small-menu ">
                <!-- dropdown -->
                <li class="relative px-5">
                    <Link href="/dashboard" :class="{ 'text-cyan-500 bg-slate-700': selected == 1 }"
                        @click="selected !== 1 ? selected = 1 : selected = null"
                        class="flex items-center py-2.5 px-6 mb-2 rounded hover:bg-slate-700 hover:text-cyan-500"
                        href="javascript:;">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 640 512"
                        fill="#ffffff"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm320 96c0-26.9-16.5-49.9-40-59.3V88c0-13.3-10.7-24-24-24s-24 10.7-24 24V292.7c-23.5 9.5-40 32.5-40 59.3c0 35.3 28.7 64 64 64s64-28.7 64-64zM144 176a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm-16 80a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM400 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
                    </svg>
                    <span class="ml-2 sidebar-small-text">Dashboard</span>
                    <!-- caret -->


                   
                        </Link>
               
                        <Link href="/account"
                            class="flex items-center py-2.5 px-6  rounded hover:bg-slate-700 mb-2 hover:text-cyan-500"
                            href="javascript:;">
                        <svg fill="#ffffff" viewBox="0 0 36 36" height="2em" version="1.1"
                            preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>assign-user-solid</title>
                                <circle cx="17.99" cy="10.36" r="6.81"
                                    class="clr-i-solid clr-i-solid-path-1">
                                </circle>
                                <path
                                    d="M12,26.65a2.8,2.8,0,0,1,4.85-1.8L20.71,29l6.84-7.63A16.81,16.81,0,0,0,18,18.55,16.13,16.13,0,0,0,5.5,24a1,1,0,0,0-.2.61V30a2,2,0,0,0,1.94,2h8.57l-3.07-3.3A2.81,2.81,0,0,1,12,26.65Z"
                                    class="clr-i-solid clr-i-solid-path-2"></path>
                                <path d="M28.76,32a2,2,0,0,0,1.94-2V26.24L25.57,32Z"
                                    class="clr-i-solid clr-i-solid-path-3">
                                </path>
                                <path
                                    d="M33.77,18.62a1,1,0,0,0-1.42.08l-11.62,13-5.2-5.59A1,1,0,0,0,14.12,26a1,1,0,0,0,0,1.42l6.68,7.2L33.84,20A1,1,0,0,0,33.77,18.62Z"
                                    class="clr-i-solid clr-i-solid-path-4"></path>
                                <rect x="0" y="0" width="36" height="36" fill-opacity="0">
                                </rect>
                            </g>
                        </svg>
                       
               
                                       
                        <span class="ml-2 sidebar-small-text">Account
                            {{-- <span class="justify-center px-1 text-xs text-center text-white bg-green-500 rounded-full">9 </span></span> --}}
                        <!-- caret -->

                        </Link>
                        @if(Auth::user()->is_admin)
                        <Link href="/users"
                            class="flex items-center py-2.5 px-6  rounded hover:bg-slate-700 mb-2 hover:text-cyan-500"
                            href="javascript:;">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 640 512"
                            fill="#ffffff"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                        <span class="ml-2 sidebar-small-text">Users</span>
                        <!-- caret -->

                        </Link>

                            <Link href="/cards"
                            class="flex items-center py-2.5 px-6  rounded hover:bg-slate-700 mb-2 hover:text-cyan-500"
                            href="javascript:;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        <span class="ml-2 sidebar-small-text">Cards</span>
                        <!-- caret -->

                        </Link>
@endif
                        {{-- <Link href="/reports"
                            class="flex items-center py-2.5 px-6  rounded hover:bg-slate-700 mb-2 hover:text-cyan-500"
                            href="javascript:;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        <span class="ml-2 sidebar-small-text">Reports</span>
                        <!-- caret -->

                        </Link> --}}


                        



                        @can('manage_all')
                            <Link href="/users"
                                class="flex items-center mb-2 py-2.5 px-6 rounded hover:bg-slate-700 hover:text-cyan-500"
                                href="javascript:;">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 640 512" fill="#ffffff">


                                <path
                                    d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                            </svg>
                            <span class="ml-2 sidebar-small-text">Users</span>
                            <!-- caret -->

                            </Link>
                        @endcan



                      

                     









                </li>


            </ul>
           
        </div>
    </nav>



    <!-- Page Content -->
    <div class="md:ml-60">
        <main class="pt-16 pb-20 lg:pb-10">
            <div class="py-12">
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="p-2 overflow-auto bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
