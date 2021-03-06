<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{ route('dashboard') }}" class="{{ Request::path() ==  '/' ? 'active' : ''  }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                <li>
                    <a href="#subPages" data-toggle="collapse" class="{{ Request::segment(1) ==  'admin' ? 'active' : 'collapse' }}"><i class="lnr lnr-file-empty"></i> <span>Data Master</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="{{ Request::segment(1) ==  'admin' ? 'active' : 'collapse' }}">
                        <ul class="nav">
                            <li><a href="{{ route('admin.utama.index') }}" class="{{ Request::segment(2) ==  'main' ? 'active' : Request::segment(2) ==  'organisasi' ? 'active' : Request::segment(2) ==  'urusan' ? 'active' : Request::segment(2) ==  'program' ? 'active' : Request::segment(2) ==  'kegiatan' ? 'active' : Request::segment(2) ==  'periode' ? 'active' : '' }}">Data Utama</a></li>
                            <li><a href="{{ route('admin.uraian.index') }}" class="{{ Request::segment(2) ==  'uraian' ? 'active' : Request::segment(2) ==  'sub_uraian' ? 'active' : Request::segment(2) ==  'sub2_uraian' ? 'active' : Request::segment(2) ==  'sub3_uraian' ? 'active' : Request::segment(2) ==  'sub4_uraian' ? 'active' : '' }}">Data Uraian</a></li>
                            <li><a href="{{ route('admin.user.index') }}" class="{{ Request::segment(2) ==  'user' ? 'active' : '' }}">Data User</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="{{ route('anggaran.index') }}" class="{{ Request::segment(1) ==  'anggaran' ? 'active' : '' }}"><i class="lnr lnr-code"></i> <span>Anggaran</span></a></li>
                <li><a href="charts.html" class=""><i class="lnr lnr-chart-bars"></i> <span>Kwitansi</span></a></li>
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->