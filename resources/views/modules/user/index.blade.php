@extends('layouts.template')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tables</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Pengguna <a href="{{ route('users.create') }}" class="btn btn-xs btn-primary">Tambah Data</a>
                </div> 
                
                <div class="card-body">
                    @include('layouts.partials._flash')
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @include('layouts.partials._action', [
                                            'model' => $user,
                                            'form_url' => route('users.destroy', $user->id),
                                            'edit_url' => route('users.edit', $user->id),
                                            'confirm_message' => 'Anda Yakin Ingin Menghapus?'
                                        ])
                                    </td>
                                </tr>
                                
                            @endforeach
                            

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Universitas Dinamika Bangsa 2024</div>
                
            </div>
        </div>
    </footer>
</div>
</div>

@endsection

@push('scripts')
<script>
    $(function() {
        $('#datatablesSimple').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('users.index') }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush