<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Fine</title>
</head>
<body>
<h1>Add Fine</h1>

<!-- Display Validation Errors -->
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Fine Input Form -->
<form action="{{ route('fines.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Fine Name:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
    </div>

    <div>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
    </div>

    <div>
        <label for="amount">Amount (in USD):</label>
        <input type="number" id="amount" name="amount" step="0.01" required>
    </div>

    <div>
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="0">Unpaid</option>
            <option value="1">Paid</option>
        </select>
    </div>

    <div>
        <label for="driver_id">Driver ID:</label>
        <input type="number" id="driver_id" name="driver_id" required>
    </div>

    <div>
        <label for="police_id">Police ID:</label>
        <input type="number" id="police_id" name="police_id" required>
    </div>

    <div>
        <label for="vehicle_id">Vehicle ID:</label>
        <input type="number" id="vehicle_id" name="vehicle_id" required>
    </div>

    <button type="submit">Add Fine</button>
</form>
</body>
</html>
