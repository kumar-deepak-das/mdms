<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{$mailData['subject']}}</title>
</head>
<body>
	<H4>Dear {{$mailData['name']}},</H4>

	@foreach($mailData['body'] as $text)
		<H4> {{$text}} </H4>
	@endforeach	

	<span style="color:#FF0000;">Never Share the password to any one.</span>

	<H4>Regards:</H4>
	<H4>Team, KIIT National Mathematics Olympiad,<br>KIIT - DU, Bhubaneswar</H4>

</body>
</html>