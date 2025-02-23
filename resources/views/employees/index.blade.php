@extends('layouts.app')

@section('title', 'Daftar Karyawan')

@section('content')
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Karyawan</h5>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">
            + Tambah Karyawan
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->age }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" 
                               class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" 
                                  method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Yakin ingin menghapus?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection