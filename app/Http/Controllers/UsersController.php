<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\Usercreateformrequest;
use Carbon\Carbon;

class UsersController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorizeResource(User::class, 'users');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {

      
        
        $this->authorize('view',$user);
        return view('users.users', [
            'users' => SpladeTable::for(User::class)
                ->withGlobalSearch(columns: ['name', 'email'])
                ->perPageOptions(['10', '20'])
                ->column('name', searchable: true)
                ->column('email')
                ->column('is_admin')
                ->column('created_at')
                ->column('actions')
                ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->can('create',User::class))
        {
            return view('users.user_create');
        }
        abort(404);
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Usercreateformrequest $request)
    {
        $user = $request->validated();
        $user['is_admin'] = 0;
        $user =  User::create($user);
        Toast::title($user->name . 's Account Successfully Created!')
            ->success()->center()->backdrop()->autoDismiss(2);
        return redirect()->route('users.show', $user->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.user_detailed', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.user_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update',$user);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',


        ]);


        $user = User::find($user->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->is_admin = $request->input('is_admin');
        $newPassword = $request->input('password');

        if (!empty($newPassword)) {
            $user->password = $request->input('password');
        }
        $user->save();
        Toast::title($user->name.' Profile updated!')
            ->success()
            ->center()
            ->backdrop()
            ->autoDismiss(2);
        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        Toast::title('User Succefully Deleted')
            ->success()
            ->center()
            ->backdrop()
            ->autoDismiss(2);
        return redirect()->route('users.index');
    }
}
