<li class="{{ set_active('admin.dashboard') }}">
    <a href="{{ route('admin.dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>

<li class="{{ set_active('admin.data_gempa') }}">
    <a href="{{ route('admin.data_gempa') }}">
        <i class="fa fa-list"></i> <span>Data Gempa</span>
    </a>
</li>

<li class="{{ set_active('admin.proses_clustering') }}">
    <a href="{{ route('admin.proses_clustering') }}">
        <i class="fa fa-tasks"></i> <span>Proses Clustering</span>
    </a>
</li>
{{-- 
<li class="treeview {{ set_active(['admin.tentor','admin.mata_pelajaran','admin.mapel_tentor']) }}">
    <a href="#">
        <i class="fa fa-pencil-square-o"></i> <span>Tentor & Mata Pelajaran</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="padding-left:25px;">
        <li class="{{ set_active('admin.tentor') }}"><a href="{{ route('admin.tentor') }}"><i class="fa fa-address-card"></i>Data Tentor</a></li>
        <li class="{{ set_active('admin.mata_pelajaran') }}"><a href="{{ route('admin.mata_pelajaran') }}"><i class="fa fa-pencil-square-o"></i>Mata Pelajaran</a></li>
        <li class="{{ set_active('admin.mapel_tentor') }}"><a href="{{ route('admin.mapel_tentor') }}"><i class="fa fa-pencil-square-o"></i>Mata Pelajaran Tentor</a></li>
    </ul>
</li>

<li class="treeview {{ set_active(['admin.daftar_kelas','admin.pembahasan','admin.jadwal']) }}">
    <a href="#">
        <i class="fa fa-calendar"></i> <span>Manajemen Kelas</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="padding-left:25px;">
        <li class="{{ set_active('admin.daftar_kelas') }}"><a href="{{ route('admin.daftar_kelas') }}"><i class="fa fa-list"></i>Daftar Kelas</a></li>
        <li class="{{ set_active('admin.jadwal') }}"><a href="{{ route('admin.jadwal') }}"><i class="fa fa-calendar"></i>Jadwal Kelas</a></li>
        <li class="{{ set_active('admin.pembahasan') }}"><a href="{{ route('admin.pembahasan') }}"><i class="fa fa-book"></i>Pembahasan</a></li>
    </ul>
</li>

<li class="{{ set_active('admin.siswa') }}">
    <a href="{{ route('admin.siswa') }}">
        <i class="fa fa-graduation-cap"></i> <span>Manajemen Siswa </span>
    </a>
</li>

<li class="treeview {{ set_active(['admin.jenjang','admin.paket','admin.kelompok','admin.pembayaran']) }}">
    <a href="#">
        <i class="fa fa-money"></i> <span>Pembayaran Paket Siswa</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="padding-left:25px;">
        <li class="{{ set_active('admin.jenjang') }}"><a href="{{ route('admin.jenjang') }}"><i class="fa fa-level-up"></i>Jenjang Paket</a></li>
        <li class="{{ set_active('admin.kelompok') }}"><a href="{{ route('admin.kelompok') }}"><i class="fa fa-users"></i>Jumlah Kelompok</a></li>
        <li class="{{ set_active('admin.paket') }}"><a href="{{ route('admin.paket') }}"><i class="fa fa-tasks"></i>Informasi Paket</a></li>
        <li class="{{ set_active('admin.pembayaran') }}"><a href="{{ route('admin.pembayaran') }}"><i class="fa fa-money"></i>Pembayaran Siswa</a></li>
    </ul>
</li>


<li class="header" style="font-weight:bold;">Pengaturan</li>
<li class="treeview {{ set_active(['admin.keunggulan','admin.artikel','admin.testimonial','admin.visi','admin.misi','admin.tentang','admin.slider']) }}">
    <a href="#">
        <i class="fa fa-info-circle"></i> <span>Pengaturan Informasi</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="padding-left:25px;">
        <li class="{{ set_active('admin.slider') }}"><a href="{{ route('admin.slider') }}"><i class="fa fa-sliders"></i>Slider</a></li>
        <li class="{{ set_active('admin.keunggulan') }}"><a href="{{ route('admin.keunggulan') }}"><i class="fa fa-check-circle"></i>Keunggulan Kami</a></li>
        <li class="{{ set_active('admin.artikel') }}"><a href="{{ route('admin.artikel') }}"><i class="fa fa-newspaper-o"></i>Artikel</a></li>
        <li class="{{ set_active('admin.testimonial') }}"><a href="{{ route('admin.testimonial') }}"><i class="fa fa-quote-left"></i>Testimoni Siswa</a></li>
        <li class="{{ set_active('admin.visi') }}"><a href="{{ route('admin.visi') }}"><i class="fa fa-bullseye"></i>Visi Kami</a></li>
        <li class="{{ set_active('admin.misi') }}"><a href="{{ route('admin.misi') }}"><i class="fa fa-list"></i>Misi Kami</a></li>
        <li class="{{ set_active('admin.tentang') }}"><a href="{{ route('admin.tentang') }}"><i class="fa fa-info-circle"></i>Tentang Kami</a></li>
    </ul>
</li>

<li class="treeview {{ set_active(['admin.data_admin','admin.kasir']) }}">
    <a href="#">
        <i class="fa fa-users"></i> <span>Pengaturan User</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="padding-left:25px;">
        <li class="{{ set_active('admin.data_admin') }}">
            <a href="{{ route('admin.data_admin') }}">
                <i class="fa fa-user"></i> <span>Administrator</span> </span>
            </a>
        </li>
        <li class="{{ set_active('admin.kasir') }}">
            <a href="{{ route('admin.kasir') }}">
                <i class="fa fa-user"></i> <span>Kasir</span> </span>
            </a>
        </li>
    </ul>
</li>

<li class="{{ set_active('admin.laporan_per_hari') }}">
    <a href="{{ route('admin.laporan_per_hari') }}">
        <i class="fa fa-dashboard"></i> <span>Laporan Keuangan</span>
    </a>
</li> --}}

<li class="">
    <a data-toggle="control-sidebar" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off"></i>&nbsp; {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
</li>
