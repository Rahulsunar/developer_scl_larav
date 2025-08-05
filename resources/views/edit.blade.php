<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    body {
        background-color: #f8f9fa;
    }

    .form-card {
        max-width: 600px;
        margin: 40px auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #0d6efd;">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold" href="{{ route('index') }}">← Go Back</a>
    </div>
</nav>

<!-- Form -->
<div class="form-card">
    <h2 class="text-center mb-4">Edit User</h2>
    <form action="{{ route('update', base64_encode($Data->id)) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold">Name</label>
            <input type="text" name="name" value="{{ $Data->name }}" class="form-control">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Phone Number</label>
            <input type="text" name="number" value="{{ $Data->phone_number }}" class="form-control">
            @error('number') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Email Address</label>
            <input type="email" name="email" value="{{ $Data->email }}" class="form-control">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success px-4">Update</button>
        </div>
    </form>
</div>