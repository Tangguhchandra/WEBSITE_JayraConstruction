<header class="admin-header">
    {{-- Tambahan flex-nowrap agar di HP tidak patah ke baris bawah --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container-fluid flex-nowrap">
            
            <div class="d-flex align-items-center">
                <a class="navbar-brand d-flex align-items-center m-0 me-2" href="{{ route('dashboard') }}">
                    <h1 class="h4 mb-0 fw-bold text-primary d-none d-sm-block">JayraConstruction</h1>
                    {{-- Di layar HP yang sempit banget, tampilkan JC aja biar search bar muat --}}
                    <h1 class="h4 mb-0 fw-bold text-primary d-block d-sm-none">JC.</h1>
                </a>

                <button class="hamburger-menu btn border-0" type="button" id="btn-toggle-sidebar" aria-label="Toggle sidebar">
                    <i class="bi bi-list fs-5"></i>
                </button>
            </div>

            {{-- mx-4 diganti mx-2 di mobile biar lega --}}
            <div class="search-container flex-grow-1 mx-2 mx-md-4" x-data="{
                query: '',
                results: [],
                isLoading: false,
                search() {
                    // Jangan mencari kalau hurufnya kurang dari 2
                    if (this.query.trim().length < 2) {
                        this.results = [];
                        return;
                    }
                    
                    this.isLoading = true;
                    
                    // Panggil rute global search di Laravel
                    fetch(`/api/global-search?q=${this.query}`)
                        .then(res => res.json())
                        .then(data => {
                            this.results = data;
                            this.isLoading = false;
                        }).catch(err => {
                            this.isLoading = false;
                        });
                }
            }">
            
                <div class="position-relative">
                    <input type="search" 
                        class="form-control border-0 " 
                        placeholder="Cari user, tim, atau proyek..."
                        x-model="query"
                        @input.debounce.500ms="search()" 
                        @click.outside="results = []"
                        aria-label="Search">
                        
                    <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y me-3 text-muted" x-show="!isLoading"></i>
                    <div class="spinner-border spinner-border-sm text-primary position-absolute top-50 end-0 translate-middle-y me-3" role="status" x-show="isLoading" x-cloak>
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    
                    <div x-show="results.length > 0" x-cloak
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        class="position-absolute top-100 start-0 w-100 bg-white border rounded-3 shadow-lg mt-2 z-[1050] overflow-hidden">
                        
                        <template x-for="result in results" :key="result.title">
                            <a :href="result.url" class="d-block px-3 py-2 text-decoration-none text-dark border-bottom hover-bg-light" style="transition: background 0.2s;" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor='transparent'">
                                <div class="d-flex align-items-center">
                                    <i :class="result.icon + ' me-3 fs-5'"></i>
                                    <div>
                                        <div class="fw-bold text-body" x-text="result.title"></div>
                                        <small class="text-body-secondary" x-text="result.type"></small>
                                    </div>
                                </div>
                            </a>
                        </template>
                        
                    </div>
                    
                    <div x-show="query.length >= 2 && results.length === 0 && !isLoading" x-cloak class="position-absolute top-100 start-0 w-100 bg-white border rounded-3 shadow-lg mt-2 z-[1050] p-3 text-center text-muted">
                        <i class="bi bi-emoji-frown fs-4 d-block mb-1"></i>
                        Data tidak ditemukan
                    </div>
                </div>
            </div>

            <div class="navbar-nav flex-row align-items-center">
                <div class="me-2 me-md-3" x-data="{ 
                        currentTheme: localStorage.getItem('theme') || 'light',
                        toggle() {
                            this.currentTheme = this.currentTheme === 'light' ? 'dark' : 'light';
                            localStorage.setItem('theme', this.currentTheme);
                            document.documentElement.setAttribute('data-bs-theme', this.currentTheme);
                        }
                    }" 
                    x-init="document.documentElement.setAttribute('data-bs-theme', currentTheme)">
                    
                    <button class="btn btn-outline-secondary d-inline-flex align-items-center justify-content-center position-relative" 
                            type="button" 
                            style="width: 42px; height: 42px; padding: 0;"
                            @click="toggle()"
                            data-bs-toggle="tooltip"
                            data-bs-placement="bottom"
                            title="Ubah Tema">
                        <i class="bi bi-sun-fill text-warning fs-5 position-absolute m-0" style="line-height: 0;" x-show="currentTheme === 'light'" x-cloak></i>
                        <i class="bi bi-moon-fill text-primary fs-5 position-absolute m-0" style="line-height: 0;" x-show="currentTheme === 'dark'" x-cloak></i>
                    </button>
                </div>

                {{-- Fullscreen sembunyikan di HP (d-none d-md-inline-flex) --}}
                <button class="btn btn-outline-secondary me-3 d-none d-md-inline-flex align-items-center justify-content-center" 
                        type="button"
                        style="width: 42px; height: 42px; padding: 0;"
                        data-fullscreen-toggle
                        data-bs-toggle="tooltip"
                        data-bs-placement="bottom"
                        title="Toggle fullscreen">
                    <i class="bi bi-arrows-fullscreen icon-hover fs-5 m-0" style="line-height: 0;"></i>
                </button>

                <div class="dropdown">
                    <button class="btn border-0 pe-0 d-flex align-items-center rounded-pill px-2 py-1" 
                            type="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0d6efd&color=fff&bold=true" 
                            alt="User Avatar" 
                            width="32" 
                            height="32" 
                            class="rounded-circle me-1 me-md-2 shadow-sm">
                            
                        <span class="d-none d-md-inline fw-semibold text-body me-1">{{ Auth::user()->name }}</span>
                        
                        <i class="bi bi-chevron-down text-body-secondary small d-none d-md-inline"></i>
                    </button>
                    
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 rounded-3 position-absolute">
                        <li class="px-3 py-2 border-bottom mb-1">
                            <div class="fw-bold">{{ Auth::user()->name }}</div>
                            <div class="small text-muted">{{ Auth::user()->email }}</div>
                        </li>
                        
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger d-flex align-items-center py-2">
                                    <i class="bi bi-box-arrow-right me-2"></i> Keluar
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

@push('scripts')
{{-- Script AlpineJS untuk Search di bawah tidak aku ubah sama sekali sesuai aslimu --}}
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('searchComponent', () => ({
            query: '',
            results: [],
            // Database Menu yang bisa dicari
            pages: [
                { title: 'Dashboard', url: '{{ route("dashboard") }}', type: 'Halaman Utama', icon: 'bi-grid-1x2' },
                { title: 'Manajemen Proyek', url: '{{ route("proyek.index") }}', type: 'Modul', icon: 'bi-building' },
                { title: 'Manajemen Layanan', url: '{{ route("layanan.index") }}', type: 'Modul', icon: 'bi-tools' },
                { title: 'Manajemen User', url: '{{ route("users.index") }}', type: 'Pengaturan', icon: 'bi-people' },
                { title: 'Kontak Tim', url: '{{ route("tim.index") }}', type: 'Modul', icon: 'bi-person-badge' },
            ],
            search() {
                if (this.query.trim() === '') {
                    this.results = [];
                    return;
                }
                const searchTerm = this.query.toLowerCase();
                // Filter data berdasarkan ketikan user
                this.results = this.pages.filter(page => 
                    page.title.toLowerCase().includes(searchTerm) || 
                    page.type.toLowerCase().includes(searchTerm)
                );
            }
        }));
    });
</script>

<style>
    /* Sedikit perbaikan style untuk dropdown pencarian */
    .hover-bg-light:hover { background-color: #f8f9fa; }
    [x-cloak] { display: none !important; }
</style>
@endpush