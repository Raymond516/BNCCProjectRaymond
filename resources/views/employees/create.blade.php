@extends('layouts.app')

@section('title', 'Tambah Karyawan')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h5 class="mb-0">Tambah Karyawan</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       name="name" value="{{ old('name') }}" minlength="5" maxlength="20" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Umur</label>
                <input type="number" class="form-control @error('age') is-invalid @enderror" 
                       name="age" value="{{ old('age') }}" min="21" required>
                @error('age')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control @error('address') is-invalid @enderror" 
                          name="address" rows="3" minlength="10" maxlength="40" required>{{ old('address') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                       name="phone" value="{{ old('phone') }}" pattern="^08\d{7,10}$" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection