<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>THIS IS A HELLO WORLD</h1>
    <p>2 + 2 = {{ 2 + 2 }}</p>
    <p>current date is {{ date('d/m/y') }}</p>

    <h3>{{ $name  }}</h3>
    <h3>{{ $catname }}</h3>
    <ul>
        @foreach ($all_animals as $animal)
            <li> {{ $animal }}</li>
        @endforeach
    </ul>
    <a href="/teste">teste</a>
</body>
</html>