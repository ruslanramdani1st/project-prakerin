<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <i class="fas fa-subway"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DudeLoka</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('DashboardPenumpang')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('jadwalKereta')}}">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Jadwal Keberangkatan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('penumpang.index')}}">
            <i class="fas fa-fw fa-ticket-alt"></i>
            <span>Pesanan Tiket</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('transaksi.index')}}">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Pembayaran Tiket</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
