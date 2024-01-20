@extends('layouts.main')

@section('title', 'Tambah Penilaian')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Tambah Data Penilaian
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form id="save-assessment-form" action="{{ route('assessments.store') }}" class="pt-5 px-md-3" method="post">
            @csrf
            <div class="form-group row mb-4 px-3">
              <label for="user_uuid" class="form-label">Karyawan</label>
              <select class="form-select" name="user_uuid" id="user_uuid">
                @foreach ($employees as $employee)
                  @if (old('user_uuid') == $employee->uuid)
                    <option value="{{ $employee->uuid }}" selected>{{ $employee->name }}</option>
                  @else
                    <option value="{{ $employee->uuid }}">{{ $employee->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            @foreach ($criterias as $criteria)
              @php
                $inputName = str_replace(' ', '_', $criteria->name);
              @endphp
              <div class="form-group row mb-4 px-3">
                <label for="{{ $inputName }}" class="form-label">{{ $criteria->name }}</label>
                <input id="{{ $inputName }}" name="{{ $inputName }}" type="number" class="form-control" placeholder="Masukkan Nilai {{ $criteria->name }}" required>
              </div>
            @endforeach
            <div class="form-group row mb-4 px-3">
              <label for="month" class="form-label col-md-3">Bulan</label>
              <select class="form-select" name="month" id="month">
                @foreach (range(1, 12) as $month)
                  <option value="{{ $month }}" @if ($month == date('n')) selected @endif>{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="year" class="form-label col-md-3">Tahun</label>
              <select class="form-select" name="year" id="year">
                @foreach (range(date('Y'), 2020) as $year)
                  <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="{{ route('assessments.index') }}"><button type="button" class="btn back-btn me-3">
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
      var form = $('#save-assessment-form')[0];
      if (form.checkValidity()) {
        swal({
          text: "Apakah anda ingin menyimpan data?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willSave) => {
          if (willSave) {
            form.submit();
          } else {
            swal("Data tidak disimpan!");
          }
        });
      } else {
        form.reportValidity();
      }
    });
  });
</script>
@endsection