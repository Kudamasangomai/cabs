<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Card;
use App\Models\Account;
use App\Tables\Accounttable;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Http\enum\AccountStatus;
use App\Jobs\ProcessAccountapproval;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datenow =   Carbon::now();
        $user = Auth::user();
        if ($user->is_admin) {
            return view('account.account', [
                'accounts' => Accounttable::class
            ]);
        }

        return view('account.account', [
            'accounts' => SpladeTable::for(Account::where('user_id', $user->id))
                ->withGlobalSearch(columns: ['accountno'])
                ->column('accountno', 'Account #')
                ->column('nationalid', 'ID')
                ->column('user.name', 'name')
                ->column('status', 'Status')
                ->column('created_at', 'Date Applied')
                ->column('actions')
                ->paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('account.createaccount');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        $applicationdata = $request->validated();
        $accountno = rand(10000000, 99999999);


        if ($request->hasFile('proofofresidency')) {
            $por = $request->file('proofofresidency');
            $proofofresidencypath = $por->store('proof_of_residency', 'public');
        }
        if ($request->hasFile('proofofincome')) {
            $poi = $request->file('proofofincome');
            $proofofincomepath = $poi->store('proof_of_income', 'public');
        }
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photopath = $photo->store('photos', 'public');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $indentitypath = $image->store('photos', 'public');
        }


        $applicationdata['image'] =  $indentitypath;
        $applicationdata['proofofincome'] =  $proofofincomepath;
        $applicationdata['proofofresidency'] =  $proofofresidencypath;
        $applicationdata['photo'] =  $photopath;


        $totalaccounts  = Account::where('user_id', Auth::id())->count();

        if ($totalaccounts > 2) {
            Toast::title('You are Required To Have Only 2 Accounts')
                ->warning()
                ->center()
                ->backdrop()
                ->autoDismiss(2);
            return redirect()->route('account.index');
        } else {
            Account::create($applicationdata +
                [
                    'accountno' => $accountno,
                    'user_id' => Auth::id()

                ]);
            Toast::title('Account Application Created')
                ->success()
                ->center()
                ->backdrop()
                ->autoDismiss(2);
            return redirect()->route('account.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        $account = Account::with('user')->findOrFail($account->id);
        return view('account.viewaccount', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        $account = Account::with('user')->findOrFail($account->id);
        return view('account.editaccount', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->update($request->all());
        Toast::title('Account Application Updated')
            ->success()
            ->center()
            ->backdrop()
            ->autoDismiss(2);
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {

        $account->delete();
        Toast::title('Application Succesfully Deleted!')
            ->success()
            ->center()
            ->backdrop()
            ->autoDismiss(2);
        return redirect()->back();
    }

    public function reject(Request $request, $id)
    {

        $this->validate($request, [
            'statusinfo' => 'required',
        ]);

        $account = Account::where('id', $id)->first();

        $account->status = AccountStatus::Rejected->value;
        $account->statusinfo = $request->input('statusinfo');
        $account->save();


        ProcessAccountapproval::dispatch($account, Auth::user());



        Toast::title('Account Application rejected')
            ->warning()
            ->center()
            ->backdrop()
            ->autoDismiss(2);
        return redirect()->back();
    }

    public function approve($id)
    {

   
        $account = Account::where('id', $id)->first();


        if (!$account) {
            Toast::title('Account not found.')
                ->warning()
                ->center()
                ->backdrop()
                ->autoDismiss(2);
            return redirect()->back();
        }

        $account->status = AccountStatus::Aprroved->value;
        $account->statusinfo = AccountStatus::Aprroved->value;
        $account->save();
     

        ProcessAccountapproval::dispatch($account, Auth::user());
        try{
        if ($account->user) {
            Card::create([
                'cardno' => $account->accountno,
                'user_id' => $account->user->id,
            ]);
        } else {
            Toast::title('User not found.')
                ->warning()
                ->center()
                ->backdrop()
                ->autoDismiss(2);
            return redirect()->back();
        }
    }catch(Exception $e)
    {
        $message = $e->getCode() == '23000' 
        ? 'This card number already exists and has been approved.' 
        : 'An error occurred while creating the card.';

    Toast::title($message)
        ->warning()
        ->center()
        ->backdrop()
        ->autoDismiss(3);
        return redirect()->back();
    }
        Toast::title('Account Application Approved')
            ->success()
            ->center()
            ->backdrop()
            ->autoDismiss(2);
        return redirect()->back();
    }
}
