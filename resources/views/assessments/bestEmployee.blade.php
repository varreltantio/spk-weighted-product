@extends('layouts.main')

@section('title', 'Daftar Karyawan Terbaik')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Karyawan Terbaik</div>

<div class="row my-4">
  <div class="col-xl-4 col-md-6">
    <a href="{{ route('assessments.index') }}"><button type="button" class="btn back-btn me-3">
      <i class="fa-solid fa-arrow-left"></i>
      Kembali
      </button>
    </a> 
  </div>
</div>

<div class="row">
  <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
    <h4 class="pt-4 pb-3">Hasil Perhitungan Karyawan Terbaik</h4>
    <div class="table-responsive w-auto">
      <table class="table table-bordered">
        <thead>
            <tr>
              <th>Nama Karyawan</th>
              <th>Perhitungan Si</th>
              <th>Perhitungan Vi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $maxVi = max(array_column($resultsVi, 'vi'));
            @endphp
    
            @foreach($resultsSi as $resultSi)
                @php
                  $resultVi = collect($resultsVi)->where('user_uuid', $resultSi['user_uuid'])->first();
                  $isMaxVi = ($resultVi['vi'] == $maxVi);
                @endphp
    
                <tr class="{{ $isMaxVi ? 'table-primary' : '' }}">
                  <td>{{ $resultVi['name'] }}</td>
                  <td>{{ $resultSi['si'] }}</td>
                  <td>{{ $resultVi['vi'] }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection