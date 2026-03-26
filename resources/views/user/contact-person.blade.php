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

    {{-- ================= FORM KONTAK ================= --}}
    <section class="bg-primary py-24 relative overflow-hidden rounded-t-[3rem] sm:rounded-t-[4rem]">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"></div>
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-accent/10 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute bottom-10 left-10 w-[300px] h-[300px] bg-white/5 rounded-full blur-[80px] pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">
            
            <div class="text-center mb-16 reveal">
                <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">
                    Form Kontak
                </h2>
                <p class="text-slate-300 font-light text-lg">
                    Lengkapi data di bawah ini untuk memulai konsultasi proyek Anda bersama kami.
                </p>
            </div>

            <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-2xl reveal delay-100 border border-white/20 relative">
                <form action="#" method="POST" class="grid md:grid-cols-2 gap-x-12 gap-y-6">
                    @csrf
                    <div class="flex flex-col gap-5">
                        
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider ml-1">Nama Depan</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <input type="text" name="first_name" placeholder="Masukkan nama depan" class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm font-medium focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none">
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider ml-1">Nama Belakang</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <input type="text" name="last_name" placeholder="Masukkan nama belakang" class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm font-medium focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none">
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider ml-1">No Handphone</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <input type="tel" name="phone" placeholder="08xxxxxxxxx" class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm font-medium focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none">
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider ml-1">Email</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <input type="email" name="email" placeholder="mail@contoh.com" class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm font-medium focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-5">
                        
                        <div class="space-y-1.5 h-full flex flex-col">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider ml-1">Pesan Khusus</label>
                            <div class="relative group flex-1">
                                <div class="absolute top-4 left-0 pl-4 flex items-start pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </div>
                                <textarea name="message" placeholder="Tuliskan pesan atau pertanyaan spesifik Anda di sini..." class="w-full h-full min-h-[140px] pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm font-medium focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none resize-none"></textarea>
                            </div>
                        </div>

                        <div class="space-y-1.5 mt-1">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider ml-1">Pilih Layanan Jayra</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                </div>
                                <select name="service" class="w-full pl-12 pr-10 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-primary text-sm font-medium focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none appearance-none cursor-pointer">
                                    <option disabled selected>Pilih Layanan</option>
                                    <option>Renovasi Rumah</option>
                                    <option>Pembangunan Baru</option>
                                    <option>Desain Interior</option>
                                    <option>Lainnya</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 pt-2">
                            <a href="https://wa.me/6285772364659" target="_blank" class="flex-1 flex items-center justify-center gap-2 border-2 border-[#25D366] text-[#25D366] hover:bg-[#25D366] hover:text-white font-bold py-3.5 px-6 rounded-xl hover:-translate-y-1 transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                WhatsApp
                            </a>
                            <button type="submit" class="flex-1 bg-primary text-white font-bold py-3.5 px-6 rounded-xl shadow-lg hover:bg-primaryDark hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/30 transition-all duration-300">
                                Submit Pesan
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>

</div>

@endsection