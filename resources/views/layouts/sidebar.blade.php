<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
      <div class="nav mt-3">
        <a class="nav-link" href="{{ route('employees.index') }}">
          <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
          Karyawan
        </a>
        <a class="nav-link" href="{{ route('criterias.index') }}">
          <div class="sb-nav-link-icon"><i class="fa-solid fa-rectangle-list"></i></div>
          Kriteria
        </a>
        <a class="nav-link" href="{{ route('assessments.index') }}">
          <div class="sb-nav-link-icon"><i class="fa-solid fa-pen-to-square"></i></div>
          Penilaian
        </a>
      </div>
    </div>
    <div class="sb-sidenav-footer">
      <div class="small">Logged in as:</div>
      {{ Auth::User()->name }}
    </div>
  </nav>
</div>