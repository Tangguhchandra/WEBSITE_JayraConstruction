<!-- Sidebar -->
<aside class="admin-sidebar" id="admin-sidebar">
    <div class="sidebar-content">
        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                
                <!-- 1. Dashboard -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                

                <!-- 2. Profil Perusahaan -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('profil') ? 'active' : '' }}" href="{{ url('/profil') }}">
                        <i class="bi bi-building"></i>
                        <span>Profil Perusahaan</span>
                    </a>
                </li>

                <!-- 3. Layanan Jasa -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('layanan') ? 'active' : '' }}" href="{{ url('/layanan') }}">
                        <i class="bi bi-tools"></i>
                        <span>Layanan Jasa</span>
                    </a>
                </li>

               

                <!-- 4. Manajemen Proyek -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('proyek') ? 'active' : '' }}" href="{{ url('/proyek') }}">
                        <i class="bi bi-cone-striped"></i>
                        <span>Manajemen Proyek</span>
                    </a>
                </li>

                <!-- 5. Laporan Pembayaran -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('laporan-pembayaran') ? 'active' : '' }}" href="{{ url('/laporan-pembayaran') }}">
                        <i class="bi bi-cash-stack"></i>
                        <span>Laporan Pembayaran</span>
                    </a>
                </li>

            

                <!-- 6. Pesan Masuk -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pesan') ? 'active' : '' }}" href="{{ url('/pesan') }}">
                        <i class="bi bi-chat-left-text"></i>
                        <span>Pesan Masuk</span>
                        <span class="badge bg-danger rounded-pill ms-auto">3</span>
                    </a>
                </li>

                <!-- 7. Data User & Admin -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('users') ? 'active' : '' }}" href="{{ url('/users') }}">
                        <i class="bi bi-people"></i>
                        <span>Data User & Admin</span>
                    </a>
                </li>

               
                
                <!-- 8. Keamanan -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('keamanan') ? 'active' : '' }}" href="{{ url('/keamanan') }}">
                        <i class="bi bi-shield-lock"></i>
                        <span>Keamanan</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
        <!-- Sidebar Backdrop (mobile overlay) -->
        <div class="sidebar-backdrop" aria-hidden="true"></div>