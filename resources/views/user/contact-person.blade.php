@extends('user.layouts.main')

@section('title', 'Contact Person - Jayra Construction')

@section('content')

<div class="pt-36 pb-0">

    {{-- ================= TIM / CONTACT PERSON ================= --}}
    <section class="max-w-7xl mx-auto px-6 mb-24 relative z-10">
        <div class="text-center max-w-2xl mx-auto mb-16 reveal">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent/10 border border-accent/20 mb-6">
                <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                <span class="text-xs font-bold text-primary uppercase tracking-widest">Our Team</span>
            </div>
            <h1 class="font-display text-4xl md:text-5xl font-extrabold text-primary mb-4 tracking-tight">
                Kontak Tim Kami
            </h1>
            <p class="text-slate-500 font-light text-lg">
                Mari terhubung dengan para ahli di balik layar yang siap membantu merencanakan dan merealisasikan proyek pembangunan Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 reveal delay-100">
            @forelse($teams as $member)
                <div class="relative bg-slate-100 rounded-[2rem] aspect-[4/5] overflow-hidden group shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-slate-200/50">
                    @if($member->image)
                        <img src="{{ asset('storage/' . $member->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 grayscale group-hover:grayscale-0">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-primary text-white font-display text-6xl opacity-50">{{ substr($member->name, 0, 1) }}</div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300"></div>
                    
                    <div class="absolute bottom-0 left-0 w-full p-6 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="font-display text-xl font-bold text-white mb-1">{{ $member->name }}</h3>
                        <p class="text-accent text-sm font-semibold uppercase tracking-wider mb-3">{{ $member->role }}</p>
                        
                        @if($member->phone)
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                            <a href="tel:{{ $member->phone }}" class="inline-flex items-center justify-center bg-white/20 hover:bg-accent backdrop-blur-sm text-white hover:text-primary w-10 h-10 rounded-full transition-colors" title="Hubungi {{ $member->name }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-10">
                    <p class="text-slate-500">Belum ada data tim ahli yang ditambahkan.</p>
                </div>
                @endforelse
            </div>
        </section>

    {{-- ================= FAQ ================= --}}
    <section class="py-24 bg-surface border-t border-slate-100 relative">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-12 reveal">
                <h2 class="font-display text-3xl md:text-4xl font-extrabold text-primary mb-4 tracking-tight">
                    Frekuensi Pertanyaan (FAQ)
                </h2>
                <p class="text-slate-500 font-light text-lg">
                    Jawaban atas pertanyaan yang paling sering ditanyakan oleh klien kami.
                </p>
            </div>

            <div class="flex flex-col gap-4 reveal delay-100" x-data="{ activeTab: 1 }">
                
                @php
                $faqs = [
                    ['q' => 'Layanan apa saja yang ditawarkan oleh CV Darming?', 'a' => 'Kami menawarkan layanan komprehensif mulai dari desain arsitektur, desain interior, renovasi bangunan (rumah/ruko), hingga pembangunan proyek komersial dan infrastruktur dari nol (Design & Build).'],
                    ['q' => 'Apakah CV Darming melayani desain interior dan eksterior sekaligus pembangunan?', 'a' => 'Ya, kami menyediakan layanan terpadu. Tim arsitek dan teknisi sipil kami bekerja berkesinambungan untuk memastikan desain visual (interior & eksterior) yang disetujui dapat direalisasikan dengan struktur yang kokoh di lapangan.'],
                    ['q' => 'Apakah bisa konsultasi dan survei lokasi terlebih dahulu?', 'a' => 'Tentu. Kami sangat menyarankan sesi konsultasi awal dan survei lokasi (site visit) agar tim kami dapat memahami kondisi lapangan, kebutuhan spesifik Anda, serta dapat menyusun Rencana Anggaran Biaya (RAB) yang akurat.'],
                    ['q' => 'Berapa lama estimasi waktu pengerjaan proyek konstruksi?', 'a' => 'Estimasi waktu sangat bergantung pada skala, tingkat kompleksitas desain, dan kondisi lapangan. Untuk renovasi skala menengah umumnya memakan waktu 2-4 bulan, sementara pembangunan hunian baru berkisar 6-12 bulan. Jadwal pasti (Timeline Kurva S) akan dilampirkan pada kontrak kerja.'],
                    ['q' => 'Apakah biaya proyek bisa disesuaikan dengan budget klien?', 'a' => 'Kami fleksibel dan solutif. Tim estimator kami dapat membantu merancang spesifikasi material (Value Engineering) dan skala prioritas pengerjaan yang disesuaikan dengan ketersediaan anggaran Anda, tanpa mengorbankan standar keselamatan dan kekuatan struktur bangunan.'],
                    ['q' => 'Apakah CV Darming menerima proyek skala kecil maupun besar?', 'a' => 'Ya, kami menangani berbagai skala proyek. Mulai dari renovasi parsial (seperti perbaikan atap, fasad, atau interior satu ruangan) hingga pembangunan fasilitas komersial, perumahan, dan gedung berskala besar.'],
                ];
                @endphp

                @foreach($faqs as $i => $faq)
                <div class="bg-white rounded-2xl shadow-[0_5px_15px_-5px_rgba(16,55,92,0.05)] border border-slate-100 overflow-hidden transition-all duration-300">
                    <button @click="activeTab = activeTab === {{ $i + 1 }} ? null : {{ $i + 1 }}" class="w-full p-6 flex items-center justify-between gap-4 text-left focus:outline-none group">
                        <h3 class="font-semibold text-[15px] transition-colors duration-300" :class="activeTab === {{ $i + 1 }} ? 'text-accent' : 'text-primary group-hover:text-primaryDark'">
                            {{ $faq['q'] }}
                        </h3>
                        <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center flex-shrink-0 transition-transform duration-300" :class="activeTab === {{ $i + 1 }} ? 'rotate-45 bg-primary text-white' : 'text-slate-400 group-hover:bg-slate-200'">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                        </div>
                    </button>
                    <div x-show="activeTab === {{ $i + 1 }}" x-collapse>
                        <div class="p-6 pt-0 text-slate-500 font-light text-sm leading-relaxed border-t border-slate-50 mt-2">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>

        </div>
    </section>

   {{-- ================= OFFICE LOCATION (FOOTER CTA) ================= --}}
    <section class="py-24 max-w-7xl mx-auto px-6">
        <div class="bg-white rounded-[3rem] border border-slate-200 p-8 md:p-16 flex flex-col lg:flex-row items-center gap-16 shadow-sm">
            <div class="lg:w-1/2 space-y-8">
                <h2 class="font-display text-4xl font-extrabold text-primary tracking-tight">Kunjungi Studio <br><span class="text-accent">Konstruksi Kami</span></h2>
                <div class="space-y-6">
                    <div class="flex items-start gap-5">
                        <div class="w-12 h-12 rounded-2xl bg-slate-100 flex items-center justify-center text-primary flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-primary">Alamat Kantor</h4>
                            <p class="text-slate-500 font-light">Jl. Raya Utama No. 123, Central Business District, Kota Anda 12345</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-5">
                        <div class="w-12 h-12 rounded-2xl bg-slate-100 flex items-center justify-center text-primary flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-primary">Jam Operasional</h4>
                            <p class="text-slate-500 font-light">Senin - Sabtu: 09:00 - 17:00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Bagian Map (Placeholder) --}}
            <div class="lg:w-1/2 w-full h-[400px] bg-slate-200 rounded-[2.5rem] overflow-hidden relative shadow-inner group">
                <img src="https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?q=80&w=2066&auto=format&fit=crop" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-1000">
                <div class="absolute inset-0 flex items-center justify-center">
                    <a href="https://maps.google.com/?q=Purwokerto,Banyumas" target="_blank" class="px-8 py-4 bg-white text-primary font-bold rounded-2xl shadow-xl hover:bg-primary hover:text-white transition-all transform active:scale-95">
                        Buka Google Maps
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection