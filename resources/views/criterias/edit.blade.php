@extends('layouts.main')

@section('title', 'Edit Kriteria')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Ubah Data Kriteria
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form id="save-criteria-form" action="{{ route('criterias.update', $criteria->id) }}" class="pt-5 px-md-3" method="post">
            @method('PUT')
            @csrf
            <div class="form-group row mb-4 px-3">
                <label for="name" class="form-label col-md-3">Nama Kriteria</label>
                <div class="col-md-9">
                    <input type="text" name="name" id="name" class="form-control form-control-lg fs-6 @error('name') is-invalid @enderror" placeholder="Masukkan Nama Kriteria" value="{{ old('name', $criteria->name) }}" required />
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="description" class="form-label col-md-3">Deskripsi Kriteria</label>
                <div class="col-md-9">
                    <textarea name="description" id="description" class="form-control form-control-lg fs-6 @error('description') is-invalid @enderror" placeholder="Masukkan Deskripsi Kriteria" required>{{ old('description', $criteria->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="category" class="form-label col-md-3">Kategori</label>
                <div class="col-md-9">
                    <input type="text" name="category" id="category" class="form-control form-control-lg fs-6 @error('category') is-invalid @enderror" placeholder="Masukkan Kategori" value="{{ old('category', $criteria->category) }}" required />
                    @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="weight" class="form-label col-md-3">Bobot</label>
                <div class="col-md-9">
                    <input type="text" name="weight" id="weight" class="form-control form-control-lg fs-6 @error('weight') is-invalid @enderror" placeholder="Masukkan Bobot Kriteria" value="{{ old('weight', $criteria->weight) }}" required />
                    @error('weight')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
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