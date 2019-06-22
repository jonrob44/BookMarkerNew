<!DOCTYPE HTML>

<html>
<head>
    <title></title>
</head>

<body>
<ul>
    @foreach($books as $book)
        <li>{{$book->title}}</li>
        <li>{{$book->ISBN}}</li>
    @endforeach
</ul>

</body>

</html>