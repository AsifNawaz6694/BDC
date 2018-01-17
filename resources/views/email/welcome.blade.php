<!DOCTYPE html>
<html>
<head>
	<title></title>	
</head>
<body>
<h1>Hello BDC Admin, Someone contacted you on your Site.</h1>
<b>Subject: </b><h1>{{$request['description_subject']}}</h1>
<b>Message: </b><p> {{$request['description_message']}} </p>
<b>File: </b><h1>{{ asset('bdc-4\public\storage/'. $path)}}</h1>
</body>
</html>