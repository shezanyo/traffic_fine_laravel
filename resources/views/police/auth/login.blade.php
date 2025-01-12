<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Login</title>
</head>
<body>
<h1>Police Login</h1>
<form action="{{ route('police.login.submit') }}" method="POST">
    @csrf
    <div>
        <label for="batchnumber">Batch Number:</label>
        <input type="text" id="batchnumber" name="batchnumber" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Login</button>
</form>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
