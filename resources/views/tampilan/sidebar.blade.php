
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">


        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
        @if (auth()->user()->role == 'admin')
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->segment(1)=='dashboard'? 'active' : '' }}">
                <a href="/dashboard">
                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->segment(1)=='siswa'? 'active' : '' }}">
                <a href="/siswa">
                    <span class="pcoded-micon"><i class="ti-id-badge"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Siswa</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->segment(1)=='pihaksekolah'? 'active' : '' }}">
                <a href="/pihaksekolah">
                    <span class="pcoded-micon"><i class="ti-medall"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Pihak Sekolah</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->segment(1)=='batch'? 'active' : '' }}">
                <a href="/batch">
                    <span class="pcoded-micon"><i class="ti-bookmark-alt"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Batch Soal</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->segment(1)=='soal'? 'active' : '' }}">
                <a href="/soal">
                    <span class="pcoded-micon"><i class="ti-file"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Soal</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->segment(1)=='subsoal'? 'active' : '' }}">
                <a href="/subsoal">
                    <span class="pcoded-micon"><i class="ti-list"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Sub Soal</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->segment(1)=='nilaicf'? 'active' : '' }}">
                <a href="/nilaicf">
                    <span class="pcoded-micon"><i class="ti-clipboard"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Nilai CF</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->segment(1)=='kelas'? 'active' : '' }}">
                <a href="/kelas">
                    <span class="pcoded-micon"><i class="ti-layout-accordion-separated"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Kelas</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        @elseif(auth()->user()->role == 'guru')
                <ul class="pcoded-item pcoded-left-item">
                    <li class="{{ request()->segment(1)=='dashboard'? 'active' : '' }}">
                        <a href="/dashboard">
                            <span class="pcoded-micon"><i class="ti-home"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                    @php
                        $isFilterKelas = request()->segment(1) == 'filterkelas';
                        $hasId = is_numeric(request()->segment(2));
                    @endphp

                    <li class="pcoded-hasmenu {{ in_array(request()->segment(1), ['hasiljurusan','filterkelas']) ? 'active pcoded-trigger' : ''}} "
                        dropdown-icon="style3" subitem-icon="style7">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="ti-write"></i></span>
                            <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Hasil Ujian</span>
                            <span class="pcoded-mcaret"></span>
                        </a>

                        <ul class="pcoded-submenu">

                            <li class="{{ request()->segment(1)=='hasiljurusan' ? 'active' : '' }}">
                                <a href="/hasiljurusan">
                                    <span class="pcoded-micon"><i class="ti-list-ol"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Semua Siswa</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ $isFilterKelas && $hasId ? 'active' : '' }}" {{ !$hasId ? 'style=display:none;' : '' }}>
                                <a href="/filterkelas">
                                    <span class="pcoded-micon"><i class="ti-list-ol"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Filter Siswa</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endif
    </div>

</nav>
