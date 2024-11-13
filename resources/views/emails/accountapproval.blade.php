<!DOCTYPE html>
<html>

<head>
    <title> Application Approval</title>
</head>

<body>
    <h4>Dear {{ $user->name }} </h4>

    Thank you for applying for an account at Cabs.
    We appreciate the time, effort, and interest
    you've shown in becoming a part of our family.

    <p> We are delighted to inform you that your Account application
        has been {{ $account->status }} After a thorough review. </p>
        <p>Reason {{ $account->statusinfo }}</p>


            @if ($account->status == "Approved")
            Next steps:

            please visit the HQ of Cabs at addres for the collection of your debit card  
            @else
                Please fix the issues
            @endif


</body>

</html>
