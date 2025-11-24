<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{$mailData['subject']}}</title>
</head>
<body>
	<H4>Dear {!!$mailData['name']!!},</H4>

	@foreach($mailData['body'] as $text)
		<p>{!!$text!!}</p>
	@endforeach	

	<br/>
	<H4>
		Thank you.
		Regards:<br/>
		Warm regards,<br/>
		Office of the COE,<br/>
		KIIT - DU, Bhubaneswar
	</H4>
	
	<H4 style="color:#0000FF;">Do not reply to this email, as it is auto-generated.</H4>

</body>
</html>