@extends('layouts.main')

@section('title', 'Tambah Kriteria')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Tambah Data Kriteria
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form id="save-criteria-form" action="{{ route('criterias.store') }}" class="pt-5 px-md-3" method="post">
            @csrf
            <div class="form-group row mb-4 px-3">
              <label for="name" class="form-label col-md-3">Nama Kriteria</label>
              <input id="name" name="name" type="text" class="form-control" placeholder="Masukkan Nama Kriteria" required>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="description" class="form-label col-md-3">Deskripsi Kriteria</label>
              <textarea id="description" name="description" type="text" class="form-control" placeholder="Masukkan Deskripsi Kriteria" required></textarea>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="category" class="form-label col-md-3">Kategori</label>
              <select class="form-select" name="category" id="category">
                <option value="Benefit" selected>Benefit</option>
                <option value="Cost">Cost</option>
              </select>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="weight" class="form-label col-md-3">Bobot</label>
              <input id="weight" name="weight" type="text" class="form-control" placeholder="Masukkan Bobot" required>
            </div>
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="{{ route('criterias.index') }}"><button type="button" class="btn back-btn me-3">
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
          $('#save-criteria-form').submit();
        } else {
          swal("Data tidak disimpan!");
        }
      });
    });
  });
</script>
@endsection