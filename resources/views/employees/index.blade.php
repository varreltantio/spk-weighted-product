@extends('layouts.main')

@section('title', 'Daftar Karyawan')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Karyawan</div>
<div class="row">
  <div class="add-admin col-xl-4 col-md-6">
    @can('create', \App\Models\Criteria::class)
      <a href="{{ route('employees.create') }}">
        <button type="button" class="btn btn-primary my-4">
          <i class="fa-solid fa-pencil"></i>
          <span class="ps-2 fw-bolder"> Tambah Karyawan</span>
        </button>
      </a>
    @endcan
  </div>
</div>
<div class="row">
  <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
    <h4 class="pt-4 pb-3">Daftar Karyawan</h4>
    @if (session('success'))
      <div class="modal fade success" id="modal-success" tabindex="-1" aria-labelledby="modal-successLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-successLabel">Informasi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              {{ session('success') }}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    @endif
  
    <div class="table-responsive w-auto">
      <table class="table table-bordered">
        <thead>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Nomer Telepon</th>
          <th scope="col">Alamat</th>
          @can('update', \App\Models\User::class)
            <th scope="col">Action</th>
          @endcan
        </thead>
        <tbody class="align-middle">
          @foreach ($employees as $employee)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone_number }}</td>
            <td>{{ $employee->address }}</td>
            @can('update', $employee)
              <td class="d-flex">
                <a href="{{ route('employees.edit', $employee->uuid) }}"><button type="button" class="edit-btn rounded-3 ms-2 my-1"><i class="fa-solid fa-pen-to-square"></i></button></a>
                <form action="{{ route('employees.destroy', $employee->uuid) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button onclick="return false" class="delete-btn rounded-3 ms-2 my-1"><i class="fa-solid fa-trash-can"></i></button>
                </form>
              </td>
            @endcan
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    if ($('.success').length) {
      $('#modal-success').modal('show');
    }

    $('.delete-btn').click(function () {
      swal({
            text: "Apakah anda ingin menghapus data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
      .then((willDelete) => {
        if (willDelete) {
          this.parentElement.submit();
          swal("Data berhasil dihapus!", {
            icon: "success",
          });
        } else {
          swal("Data tidak dihapus!");
        }
      });
    });
  });
</script>
@endsection