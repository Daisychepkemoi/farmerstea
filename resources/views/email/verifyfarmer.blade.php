<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2 style="color: green;">Litein Tea Factory</h2>
	<h1>Hello {{$farmername}}</h1>
<h3>Your Tea number Aplication has been reviewed!.</h3>
  @if($function == 'verified')


	<H4 style="text-transform: uppercase; font-size: 24px; color: black; font-weight:bold;"> Your application was successfull. <br> Your new Tea number is : <b style="color: red;">{{$teano}}</b></H4>
	@elseif($function == 'revoked')
	<H4 style="text-transform: uppercase; font-size: 24px; color: black; font-weight:bold;"> Your Tea Number Has been <b style="color: red">revoked</b>. Please contact the factory for more details!! </H4>
	@elseif($function == 'denied')
	<H4 style="text-transform: uppercase; font-size: 24px; color: black; font-weight:bold;"> Your have been denied a Tea Number <b style="color: red"></b>. Please contact the factory for more details!! </H4>
	@else
	@endif
<p>Thank You !!</p>
	
</body>
</html>