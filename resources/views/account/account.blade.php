<x-app-layout>
    <div class="flex flex-row flex-wrap">
        <div class="flex-shrink w-full max-w-full px-3 md:px-4">
            <div class="flex flex-row items-center justify-between">
                <p class="my-3 text-lg font-bold">Accounts </p>
                <!-- btn action -->
                <div class="flex flex-row items-center justify-between">

                    <Link modal href="/account/create">

                    <button type="submit" form="user-setting" data-original-title="Delete"
                        class="inline-flex items-center px-4 py-2 mb-3 mr-1 text-sm leading-5 text-center bg-blue-500 border rounded text-slate-100">
                        <svg fill="#ffffff" class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg>
                        </i>Create
                    </button>
                    </Link>

                </div>


            </div>

        </div>
    </div>


    <div class="flex flex-col w-full px-2 mx-auto mb-6 shadow-2xl sm:1/2 md:w-full">

        <x-splade-table :for="$accounts" striped class="w-full mt-5" striped>
            <x-splade-cell accountno as="$account">

                <Link href="{{ route('account.show', $account->id) }}" class="text-blue-500">
                {{ $account->accountno }}
                </Link>


            </x-splade-cell>

            <x-splade-cell status as="$account">
                @if ($account->status == 'Rejected')
                <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold">
                    <span class="w-3 h-3 bg-red-600 rounded-full"></span>
                     

                </span>
            @elseif ($account->status == 'Pending')
                <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold ">
                    <span class="w-3 h-3 bg-yellow-600 rounded-full"></span>

                </span>
            @else
                <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold ">
                    <span class="w-3 h-3 bg-green-600 rounded-full"></span>

                </span>
            @endif
            {{ $account->status }}
            </x-splade-cell>

            <x-splade-cell actions as="$account">



             
          
                @if ($account->status == "Approved")

                @can('manage_all')
                <Link href="/account/{{ $account->id }}/edit" class="text-white ">
                    <svg fill="#1F51FF" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                    </svg> </Link>
                <x-splade-form action="{{ route('account.destroy', $account) }}" method="delete" confirm>

                    <x-splade-submit
                        class="px-4 py-2 font-bold bg-white border-none rounded-none shadow-none focus:outline-none focus:ring-none focus:ring-opacity-0 focus:border-none">
                        <svg fill="#1F51FF" xmlns="http://www.w3.org/2000/svg" class="ml-2" height="1em"
                            viewBox="0 0 448 512">
                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                        </svg>

                    </x-splade-submit>
                </x-splade-form>
                @endcan
              @else
              <Link href="/account/{{ $account->id }}/edit" class="text-white ">
                <svg fill="#1F51FF" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                    <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                </svg> </Link>
            <x-splade-form action="{{ route('account.destroy', $account) }}" method="delete" confirm>

                <x-splade-submit
                    class="px-4 py-2 font-bold bg-white border-none rounded-none shadow-none focus:outline-none focus:ring-none focus:ring-opacity-0 focus:border-none">
                    <svg fill="#1F51FF" xmlns="http://www.w3.org/2000/svg" class="ml-2" height="1em"
                        viewBox="0 0 448 512">
                        <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                    </svg>

                </x-splade-submit>
            </x-splade-form>
                @endif
               

            </x-splade-cell>
        </x-splade-table>

    </div>
</x-app-layout>
