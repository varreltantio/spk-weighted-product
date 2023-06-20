@extends('layouts.main')

@section('title', 'Edit Penilaian')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Ubah Data Penilaian
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
      @foreach ($groupedAssessments as $uuid => $data)
        @php
          $assessment = $data->first();
          $month = $assessment->month;
          $year = $assessment->year;
        @endphp
        <h2>{{ $assessment->employee->name }} | Penilaian Bulan {{ $month }} Tahun {{ $year }}</h2>
        <form id="save-assessment-form" action="{{ route('assessments.update', $uuid) }}" method="POST">
          @csrf
          @method('PUT')
          <table class="table">
            <thead>
              <tr>
                <th>Kriteria</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $assessment)
                  <tr>
                    <td>{{ $assessment->criteria->name }}</td>
                    <td>
                      <input type="number" name="values[{{ $assessment->id }}]" value="{{ $assessment->value }}" class="form-control" required>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
            <a href="{{ route('assessments.index') }}"><button type="button" class="btn back-btn me-3">
              <i class="fa-solid fa-arrow-left"></i>
              Kembali
            </button></a>
            <button onclick="return false" class="btn simpan-btn btn-primary">Update</button>
          </div>
        </form>
      @endforeach
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
          $('#save-assessment-form').submit();
        } else {
          swal("Data tidak disimpan!");
        }
      });
    });
  });
</script>
@endsection