<!DOCTYPE html>
<html>
<head>
    <title>Notepad</title>
</head>
<body>

<h1>Laravel Notepad Berhasil 🔥</h1>

@foreach($folders as $folder)
    <h3>{{ $folder->name }}</h3>

    @foreach($folder->notes as $note)
        <p>• {{ $note->title }}</p>
    @endforeach
@endforeach

</body>
</html>
