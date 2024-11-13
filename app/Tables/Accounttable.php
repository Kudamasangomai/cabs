<?php

namespace App\Tables;

use Carbon\Carbon;
use App\Models\Account;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;

class Accounttable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Account::orderBy('created_at', 'desc');
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $datenow =   Carbon::now();
        $table
            ->withGlobalSearch(columns: ['accountno'])
            ->perPageOptions(['25', '50', '100'])
            ->column('accountno', 'Account #')
            ->column('nationalid', 'ID')
            ->column('user.name', 'name', searchable: true)
            ->column('status', 'Status')
            ->column('created_at', 'Date Applied')
            ->column('actions',exportAs: false)
            ->paginate(20)
            ->export(
                label: 'CSV export',
                filename: 'Accounts_Application_'.$datenow.'.csv',
                type: Excel::CSV
            );
    }
}
