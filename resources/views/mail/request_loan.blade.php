<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
</head>
<body>
   <h1>Welcome {{$data['user']->name}}</h1>
   Your request for a loan is submitted successfully. Admin will soon verify and take action against the request for a loan.<br />
   <br />
   <strong>Loan Details:</strong>
   <br />
   <br />
   <table width="80%">
      <tr>
         <td width="50%"><strong>Loan Requested</strong></td>
         <td>{{$data['loan']->loan_amount}}</td>
      </tr>
      <tr>
         <td><strong>Loan Requested Date</strong></td>
         <td>{{ \Carbon\Carbon::parse($data['loan']->created_at)->format('d/m/Y') }} </td>
      </tr>
      <tr>
         <td><strong>Loan Tenure</strong></td>
         <td>{{$data['loan']->tenure}}</td>
      </tr>     
   </table>
</body>
</html>