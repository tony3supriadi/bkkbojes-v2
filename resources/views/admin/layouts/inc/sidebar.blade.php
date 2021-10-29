<div class="sidebar sidebar-pills bg-transparent">
    <nav class="sidebar-nav">
        <ul class="nav">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon la la-lg la-dashboard"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-title">Main Navigation</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.artikel.index') }}">
                    <i class="nav-icon la la-lg la-book"></i>
                    Artikel
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.lowongan.index') }}">
                    <i class="nav-icon la la-lg la-file"></i>
                    Lowongan
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.pengumuman.index') }}">
                    <i class="nav-icon la la-lg la-bullhorn"></i>
                    Pengumuman
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.mitra.index') }}">
                    <i class="nav-icon la la-industry"></i>
                    <span>Daftar Mitra</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="nav-icon la la-comment"></i>
                    <span>Testimonial</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="nav-icon la la-user"></i>
                    <span>Pengguna</span>
                </a>
            </li>

            <li class="nav-title">Lainnya</li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon la la-folder"></i>
                    <span>Halaman</span>
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.faq.index') }}">
                            <i class="nav-icon la la-question-circle"></i> <span>FAQ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.ketentuan-pengguna.index') }}">
                            <i class="nav-icon la la-user"></i> <span>Ketentuan Pengguna</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.kebijakan-privasi.index') }}">
                            <i class="nav-icon la la-exclamation-circle"></i> <span>Kebijakan Privasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.tentang-kami.index') }}">
                            <i class="nav-icon la la-building"></i> <span>Tentang Kami</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon la la-users"></i>
                    Authentication
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">
                            <i class="nav-icon la la-user"></i> <span>Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.hak-akses.index') }}">
                            <i class="nav-icon la la-tag"></i> <span>Hak Akses</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.pengaturan.index') }}">
                    <i class="nav-icon la la-lg la-cog"></i>
                    Pengaturan
                </a>
            </li>
        </ul>
    </nav>
</div>