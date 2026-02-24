@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('content')
<div class="container-fluid p-4 p-lg-5">
                
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-0">Pesan & Konsultasi</h1>
                        <p class="text-muted mb-0">Kelola calon klien yang masuk via form WhatsApp.</p>
                    </div>
                </div>

                <!-- Messages Container -->
                <div x-data="{ 
                    selectedId: 1,
                    searchQuery: '',
                    inquiries: [
                        { id: 1, name: 'Budi Santoso', phone: '628123456789', date: '10:30 AM', message: 'Halo Jayra, saya ingin membangun ruko 2 lantai di Purwokerto.', status: 'unread' },
                        { id: 2, name: 'Ibu Sarah', phone: '628572345678', date: 'Kemarin', message: 'Tanya dong, apakah Jayra melayani renovasi interior kantor?', status: 'read' },
                        { id: 3, name: 'Andi Wijaya', phone: '628991234567', date: '2 Hari Lalu', message: 'Bisa minta estimasi harga borongan rumah type 36?', status: 'read' }
                    ],
                    get selectedInquiry() {
                        return this.inquiries.find(i => i.id === this.selectedId)
                    }
                }" class="messages-container shadow-sm border rounded bg-white">
                    <div class="messages-layout d-flex" style="height: 70vh;">
                        
                        <!-- Sidebar Pesan (Kiri) -->
                        <div class="messages-sidebar border-end" style="width: 350px; flex-shrink: 0;">
                            <div class="p-3 border-bottom bg-light">
                                <div class="position-relative mx-3"> 
                                    <i class="bi bi-search position-absolute top-50 translate-middle-y text-muted" 
                                    style="left: 12px; z-index: 10;"></i>
                                
                                    <input type="text" 
                                        class="form-control form-control-sm" 
                                        style="padding-left: 38px;" 
                                        placeholder="Cari Nama..." 
                                        x-model="searchQuery">
                                </div>
                            </div>
                                                        
                            <div class="conversations-list overflow-auto" style="height: calc(100% - 60px);">
                                <template x-for="inquiry in inquiries" :key="inquiry.id">
                                    <div @click="selectedId = inquiry.id" 
                                        class="p-3 border-bottom"
                                        :class="selectedId === inquiry.id ? 'bg-primary-subtle border-start border-primary border-4' : 'bg-white'"
                                        style="cursor: pointer;">
                                        <div class="d-flex align-items-center gap-3">
                                            <!-- Initial Avatar -->
                                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" 
                                                style="width: 40px; height: 40px; flex-shrink: 0;"
                                                x-text="inquiry.name.charAt(0)"></div>
                                            
                                            <div class="flex-grow-1 overflow-hidden">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-0 text-truncate" :class="inquiry.status === 'unread' ? 'fw-bold' : ''" x-text="inquiry.name"></h6>
                                                    <small class="text-muted" style="font-size: 0.7rem;" x-text="inquiry.date"></small>
                                                </div>
                                                <p class="small text-muted mb-0 text-truncate" x-text="inquiry.message"></p>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Chat Detail Area (Kanan) -->
                        <div class="chat-area bg-light flex-grow-1 d-flex flex-column">
                            <template x-if="selectedInquiry">
                                <div class="h-100 d-flex flex-column">
                                    <!-- Header Info User -->
                                    <div class="p-3 bg-white border-bottom d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center" 
                                                style="width: 40px; height: 40px;">
                                                <i class="bi bi-whatsapp"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0" x-text="selectedInquiry.name"></h6>
                                                <small class="text-muted" x-text="'+' + selectedInquiry.phone"></small>
                                            </div>
                                        </div>
                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </div>

                                    <!-- Bubble Pesan -->
                                    <div class="p-4 flex-grow-1 overflow-auto">
                                        <div class="bg-white p-3 shadow-sm rounded-3 mb-3 border-start border-success border-4" style="max-width: 85%;">
                                            <p class="mb-2 text-dark" x-text="selectedInquiry.message"></p>
                                            <small class="text-muted d-block text-end" x-text="selectedInquiry.date"></small>
                                        </div>
                                    </div>

                                    <!-- Tombol Balas WhatsApp -->
                                    <div class="p-4 bg-white border-top text-center">
                                        <p class="small text-muted mb-3">Klik tombol di bawah untuk membalas langsung ke WhatsApp klien.</p>
                                        <!-- Link WhatsApp Otomatis -->
                                        <a :href="'https://wa.me/' + selectedInquiry.phone + '?text=Halo ' + selectedInquiry.name + ', kami dari Jayra Construction ingin menanggapi pesan Anda...'" 
                                        target="_blank" 
                                        class="btn btn-success btn-lg px-5 rounded-pill shadow-sm">
                                            <i class="bi bi-whatsapp me-2"></i>Balas di WhatsApp
                                        </a>
                                    </div>
                                </div>
                            </template>
                        </div>

                    </div>
                </div>
            </div>
@endsection