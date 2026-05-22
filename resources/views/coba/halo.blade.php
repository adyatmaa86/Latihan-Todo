<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halo - Ceo Adyatma86</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 text-slate-100 flex items-center justify-center min-h-screen font-sans selection:bg-indigo-500 selection:text-white overflow-hidden relative">
    <!-- Gradient background accent -->
    <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full bg-indigo-500/10 blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-purple-500/10 blur-[120px] pointer-events-none"></div>

    <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700/50 p-8 md:p-12 rounded-3xl shadow-2xl text-center max-w-lg w-full mx-4 transform hover:scale-[1.02] transition-all duration-500">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-tr from-indigo-500 to-purple-500 text-white mb-6 shadow-lg shadow-indigo-500/30 animate-pulse">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
        </div>
        <h1 class="text-4xl md:text-5xl font-black bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent mb-4 tracking-tight">
            HALO!
        </h1>
        <p class="text-slate-400 text-lg mb-8 leading-relaxed font-medium">
            Vite & Tailwind CSS telah berhasil terintegrasi dengan Blade view Anda.
        </p>
        <div class="inline-block px-5 py-2.5 rounded-xl bg-slate-700/40 border border-slate-600/30 text-xs font-mono text-indigo-300">
            <a href="{{ route('uy.index') }}">Ke Todo</a>
        </div>
    </div>
</body>
</html>