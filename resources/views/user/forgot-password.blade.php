<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Jayra Construction</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; }</style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    
    <div class="max-w-md w-full bg-white rounded-[2rem] shadow-xl p-8 relative z-10">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-[#10375C] mb-2 font-['Outfit']">Lupa Password?</h1>
            <p class="text-slate-500 text-sm">Masukkan email Anda. Kami akan mengirimkan link untuk mereset password.</p>
        </div>

        @if (session('status'))
            <div class="bg-green-50 text-green-600 p-3 rounded-xl text-sm mb-4 text-center font-medium">{{ session('status') }}</div>
        @endif
        @if ($errors->any())
            <div class="bg-red-50 text-red-600 p-3 rounded-xl text-sm mb-4 text-center font-medium">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2 ml-1">Email Terdaftar</label>
                <input type="email" name="email" required class="w-full px-4 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50 focus:bg-white focus:border-[#10375C]/30 outline-none transition-all" placeholder="contoh@email.com">
            </div>
            <button type="submit" class="w-full bg-[#10375C] text-white py-3.5 rounded-xl font-bold hover:bg-[#0b2742] transition-all hover:-translate-y-1 shadow-lg">
                Kirim Link Reset
            </button>
        </form>
        
        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-500 hover:text-[#10375C] transition-colors">Kembali ke Login</a>
        </div>
    </div>
</body>
</html>