<?php

namespace App\Http\Controllers;

use App\Models\Card;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cards.cards', [
            'cards' => SpladeTable::for(Card::class)
                ->withGlobalSearch(columns: ['user_id'])
                ->column('cardno', 'Accoutn No')
                ->column('user.name', 'name')
                ->column('Collected', 'Collected')
                ->column('created_at', 'Date Approved')
                ->column('actions')
                ->paginate(20),
        ]);
    }

    public function show()
    {
        return redirect()->back();
    }

    public function cardcollected($id)
    {
        $card = Card::find($id);
        $card->update([
            'Collected' => 'Yes'
        ]);

        Toast::title('Card Collected')
            ->success()->center()->backdrop()->autoDismiss(2);
        return redirect()->back();
    }
}
