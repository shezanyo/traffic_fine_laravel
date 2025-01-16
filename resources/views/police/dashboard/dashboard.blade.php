<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Fine</title>
</head>
<body>
<div class="container">
    <h2>Create a Fine</h2>
    <form action="{{ route('fines.store') }}" method="POST">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Date -->
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}" required>
            @error('date')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Location -->
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" class="form-control" value="{{ old('location') }}" required>
            @error('location')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description (optional)</label>
            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Amount -->
        <div class="form-group">
            <label for="amount">Fine Amount</label>
            <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount') }}" min="0" required>
            @error('amount')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Registration Number -->
        <div class="form-group">
            <label for="registration_number">Vehicle Registration Number</label>
            <input type="text" id="registration_number" name="registration_number" class="form-control" value="{{ old('registration_number') }}" required>
            @error('registration_number')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- License Number -->
        <div class="form-group">
            <label for="license_number">Driver License Number</label>
            <input type="text" id="license_number" name="license_number" class="form-control" value="{{ old('license_number') }}" required>
            @error('license_number')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Fine</button>
    </form>
</div>
</body>
</html>
