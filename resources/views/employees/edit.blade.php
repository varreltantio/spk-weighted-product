@extends('layouts.main')

@section('title', 'Edit Karyawan')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Ubah Data Karyawan
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form id="save-employee-form" action="{{ route('employees.update', $employee->uuid) }}" class="pt-5 px-md-3" method="post">
            @method('PUT')
            @csrf
            <div class="form-group row mb-4 px-3">
                <label for="name" class="form-label col-md-3">Nama Karyawan</label>
                <div class="col-md-9">
                    <input type="text" name="name" id="name" class="form-control form-control-lg fs-6 @error('name') is-invalid @enderror" placeholder="Masukkan Nama Karyawan" value="{{ old('name', $employee->name) }}" required />
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="email" class="form-label col-md-3">Email</label>
                <div class="col-md-9">
                    <input type="email" name="email" id="email" class="form-control form-control-lg fs-6 @error('email') is-invalid @enderror" placeholder="Masukkan Email Karyawan" value="{{ old('email', $employee->email) }}" required />
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="phone_number" class="form-label col-md-3">Nomer Telepon</label>
                <div class="col-md-9">
                    <input type="text" name="phone_number" id="phone_number" class="form-control form-control-lg fs-6 @error('phone_number') is-invalid @enderror" placeholder="Masukkan Nomor Telepon Karyawan" value="{{ old('phone_number', $employee->phone_number) }}" required />
                    @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="address" class="form-label col-md-3">Alamat</label>
                <div class="col-md-9">
                    <input type="text" name="address" id="address" class="form-control form-control-lg fs-6 @error('address') is-invalid @enderror" placeholder="Masukkan Alamat Karyawan" value="{{ old('address', $employee->address) }}" required />
                    @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="{{ route('employees.index') }}"><button type="button" class="btn back-btn me-3">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </button></a>
                <button onclick="return false" class="btn simpan-btn btn-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    $('.simpan-btn').click(function () {
      swal({
            text: "Apakah anda ingin menyimpan data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
      .then((willSave) => {
        if (willSave) {
          $('#save-employee-form').submit();
        } else {
          swal("Data tidak disimpan!");
        }
      });
    });
  });
</script>
@endsection