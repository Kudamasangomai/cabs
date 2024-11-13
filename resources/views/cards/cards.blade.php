<x-app-layout>
    <div class="flex flex-row flex-wrap">
        <div class="flex-shrink w-full max-w-full px-3 md:px-4">
            <div class="flex flex-row items-center justify-between">
                <p class="my-3 text-lg font-bold">Cards To Be Collected </p>
                <!-- btn action -->
                <div class="flex flex-row items-center justify-between">
                </div>
    
    
            </div>
    
        </div>
    </div>

    <div class="flex flex-col w-full px-2 mx-auto mb-6 shadow-2xl sm:1/2 md:w-full">

        <x-splade-table :for="$cards" striped class="w-full mt-5" striped>
            <x-splade-cell cardno as="$card">

                <Link href="{{ route('cards.show', $card->id) }}" class="text-blue-500">
                {{ $card->cardno }}
                </Link>


            </x-splade-cell>

            <x-splade-cell actions as="$card">

                @if ($card->Collected == "No")

                <x-splade-form method="post"  
                :action="route('cards.cardcollected', $card->id)" 
                :confirm="__('Confirm Everything Is Correct')" 
                :confirm-button="__('Confirm')">
                <x-splade-submit :label="__('Confirm')" />
            </x-splade-form>
@endif
            </x-splade-cell>
        </x-splade-table>

    </div>

</x-app-layout>