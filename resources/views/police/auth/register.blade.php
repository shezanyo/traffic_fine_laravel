<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Registration</title>
</head>
<body>
<h1>Police Registration</h1>
<form action="{{ route('police.registerPost') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="batchnumber">Batch Number:</label>
        <input type="text" id="batchnumber" name="batchnumber" required>
    </div>
    <div>
        <label for="area_of_work">Area of Work:</label>
        <input type="text" id="area_of_work" name="area_of_work" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>
    <button type="submit">Register</button>
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
