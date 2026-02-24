@extends('user.layouts.main')

@section('title', 'About')

@section('content')

<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <h1 class="text-4xl font-bold text-[#0b2a3f] mb-8">
            Company Profile
        </h1>

        <p class="text-gray-600 leading-relaxed mb-10">
            Darming Jaya Group adalah perusahaan konstruksi profesional
            yang berfokus pada kualitas, ketepatan waktu, dan kepuasan klien.
            Kami telah menyelesaikan berbagai proyek pembangunan
            dengan standar tinggi dan tim yang berpengalaman.
        </p>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-gray-100 p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-semibold mb-3 text-[#0b2a3f]">Vision</h3>
                <p class="text-gray-600 text-sm">
                    Menjadi perusahaan konstruksi terpercaya dan terdepan di Indonesia.
                </p>
            </div>

            <div class="bg-gray-100 p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-semibold mb-3 text-[#0b2a3f]">Mission</h3>
                <p class="text-gray-600 text-sm">
                    Memberikan pelayanan terbaik dengan standar kualitas tinggi
                    dan profesionalisme dalam setiap proyek.
                </p>
            </div>

            <div class="bg-gray-100 p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-semibold mb-3 text-[#0b2a3f]">Commitment</h3>
                <p class="text-gray-600 text-sm">
                    Berkomitmen pada keselamatan kerja, inovasi, dan kepuasan klien.
                </p>
            </div>

        </div>

    </div>
</section>

@endsection