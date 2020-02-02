<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{ route('dashboard') }}" class="{{ Request::path() ==  '/' ? 'active' : ''  }}"><i class="lnr lnr-screen"></i> <span>Dashboard</span></a></li>
                @if(Auth::user()->role == 0 || Auth::user()->role == 1)
                <li><a href="{{ route('admin.utama.index') }}" class="{{ Request::segment(2) ==  'main' ? 'active' : Request::segment(2) ==  'organisasi' ? 'active' : Request::segment(2) ==  'urusan' ? 'active' : Request::segment(2) ==  'program' ? 'active' : Request::segment(2) ==  'kegiatan' ? 'active' : Request::segment(2) ==  'periode' ? 'active' : '' }}"><i class="lnr lnr-home"></i> Data Utama</a></li>
                @endif
                @if(Auth::user()->role == 0)
                <li><a href="{{ route('admin.user.index') }}" class="{{ Request::segment(2) ==  'user' ? 'active' : '' }}"><i class="lnr lnr-user"></i> Data User</a></li>
                @elseif(Auth::user()->role == 1)
                <li><a href="{{ route('admin.uraian.index') }}" class="{{ Request::segment(2) ==  'uraian' ? 'active' : Request::segment(2) ==  'sub_uraian' ? 'active' : Request::segment(2) ==  'sub2_uraian' ? 'active' : Request::segment(2) ==  'sub3_uraian' ? 'active' : Request::segment(2) ==  'sub4_uraian' ? 'active' : '' }}"><i class="lnr lnr-list"></i> Data Uraian</a></li>
                @endif
                @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                <li><a href="{{ route('anggaran.index') }}" class="{{ Request::segment(1) ==  'anggaran' ? 'active' : '' }}"><i class="lnr lnr-chart-bars"></i> <span>Anggaran</span></a></li>
                <li><a href="{{ route('kuitansi.index') }}" class="{{ Request::segment(1) ==  'kuitansi' ? 'active' : '' }}"><i class="lnr lnr-file-empty"></i> <span>Kuitansi</span></a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->