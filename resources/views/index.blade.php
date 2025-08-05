<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body {
        background-color: #f8f9fa;
    }
    .table-actions a {
        margin: 0 4px;
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #0d6efd;">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold" href="#">User Management</a>
        <div>
            <a class="btn btn-light btn-sm" href="{{ route('add') }}">
                ➕ Add Data
            </a>
        </div>
    </div>
</nav>

<!-- Table -->
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->isNotEmpty())
                        @php $count = 1; @endphp
                        @foreach ($data as $da)
                            <tr>
                                <td class="text-center">{{ $count++ }}</td>
                                <td>{{ $da->name ?? '' }}</td>
                                <td>{{ $da->phone_number ?? '' }}</td>
                                <td>{{ $da->email ?? '' }}</td>
                                <td class="text-center table-actions">
                                    <a href="{{ route('edit', base64_encode($da->id)) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{ route('delete', base64_encode($da->id)) }}" class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center text-muted">No records found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- SweetAlert2 Success Message -->
<script>
    function show(message, message_type) {
        Swal.fire({
            title: "Success",
            text: message,
            icon: message_type
        });
    }
</script>

@if (Session::has('success'))
    <script>
        show('{{ Session::get('success') }}', 'success');
    </script>
@endif