<!DOCTYPE HTML>

<html>
<head>
    <title></title>
</head>

<body>
<h1>BookMarker</h1>
<ul>
    @forelse($books as $book)
        <li><a href="{{$book->path()}}">{{$book->title}}</a></li>
        <li>{{$book->ISBN}}</li>
    @empty
    <p>No Books Found</p>
    @endforelse
</ul>

</body>

</html>