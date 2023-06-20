@extends('layouts.main')

@section('title', 'Tambah Karyawan')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Tambah Data Karyawan
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form id="save-employee-form" action="{{ route('employees.store') }}" class="pt-5 px-md-3" method="post">
            @csrf
            <div class="form-group row mb-4 px-3">
              <label for="name" class="form-label col-md-3">Nama Karyawan</label>
              <input id="name" name="name" type="text" class="form-control" placeholder="Masukkan Nama Karyawan" required>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="email" class="form-label col-md-3">Email</label>
              <input id="email" name="email" type="email" class="form-control" placeholder="Masukkan Email Karyawan" required>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="password" class="form-label col-md-3">Password</label>
              <input id="password" name="password" type="password" class="form-control" placeholder="Masukkan Password" required>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="phone_number" class="form-label col-md-3">Nomer Telepon</label>
              <input id="phone_number" name="phone_number" type="text" class="form-control" placeholder="Masukkan Nomer Telepon" required>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="address" class="form-label col-md-3">Alamat</label>
              <input id="address" name="address" type="text" class="form-control" placeholder="Masukkan Alamat" required>
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