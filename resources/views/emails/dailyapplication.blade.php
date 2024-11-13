<!DOCTYPE html>
<html>

<head>
    <title>Repairs List</title>
    <style>
        body {
            padding: 10px;
        }



        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #E1E1E1;
        }

    
        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #c6d7e0;
            color: black;
        }

        .information {
            background-color: #7CB9E8;
            font-size: 14px;
            font-weight: 600;
            color: black;
            padding: 5px;


        }
    </style>
</head>

<body>
    <div class="information">



        
        <h2>End Of Day Repoart </h2>
        <h3>Cabs</h3>
        <p>{{ Carbon\carbon::now()->format('Y-m-d') }}</p>




        </table>
    </div>
    <table id="customers">
        <thead>
            <tr>
                <th>Account No</th>
                <th>Name </th>
                <th>Status </th>
                <th>Comment</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->accountno }}</td>
                    <td>{{ $account->user->name }}</td>
                    <td>{{ $account->status}}</td>
                    <td>{{ $account->statusinfo}}</td>
                    <td>{{ $account->created_at->format('Y-m-d') }}</td>



                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
