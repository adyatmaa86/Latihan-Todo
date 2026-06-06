<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo - Ceo Adyatma86</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-800 antialiased">
    
    <!-- 00. Navbar -->
    <nav class="bg-gray-900 shadow-md">
        <div class="max-w-3xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('ay') }}" class="text-white text-lg font-semibold">Simple To Do List</a>
            <!-- 
            <div class="relative group">
                <button class="text-gray-300 hover:text-white focus:outline-none">
                    Akun Saya ▾
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden group-hover:block">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Update Data</a>
                </div>
            </div>
            -->
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="btn btn-danger bg-red-600 text-amber-50 hover:text-white cursor-pointer">Logout</button>
            </form>
        </div>
    </nav>
    
    <div class="max-w-3xl mx-auto px-4 mt-8">
        <!-- 01. Content-->
        <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">To Do List</h1>
        
        <div class="flex flex-col gap-6">
            
            <!-- ============================================================
                ALERT SUKSES
                Menampilkan pesan sukses dari session flash yang dikirim Controller
                Pesan ini muncul setelah user berhasil tambah/edit/hapus data
                Contoh: redirect('/todo')->with('success', 'Data berhasil ditambahkan')
                session('success') akan mengambil nilai 'Data berhasil ditambahkan'
            ============================================================ -->
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-sm" role="alert">
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            @endif

            <!-- ============================================================
                ALERT ERROR VALIDASI
                Menampilkan pesan error jika validasi di Controller gagal
                $errors->any() = mengecek apakah ada error validasi
                $errors->all() = mengambil semua pesan error dalam bentuk array
                Pesan error berasal dari $request->validate() di Controller
                Contoh: 'Kolom task wajib diisi, tidak boleh kosong!'
            ============================================================ -->
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-md shadow-sm">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Terdapat kesalahan pada input Anda:</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    {{-- Loop semua pesan error dan tampilkan satu per satu --}}
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- ============================================================
                02. FORM INPUT DATA (CREATE)
                Form ini mengirim data ke Controller method store()
                action="{{ url('todo') }}" = URL tujuan: POST /todo
                method="post" = mengirim data dengan HTTP method POST
                Saat tombol 'Simpan' diklik, data dikirim ke TodoController@store
            ============================================================ -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <form id="todo-form" action="{{ url('todo') }}" method="post">
                    {{-- @csrf = Token keamanan Laravel untuk mencegah serangan CSRF
                         (Cross-Site Request Forgery). Wajib ada di setiap form POST/PUT/DELETE.
                         Tanpa ini, Laravel akan menolak request dengan error 419 --}}
                    @csrf
                    <div class="flex gap-2">
                        {{-- name="task" = nama field yang akan dikirim ke Controller ($request->task)
                             old('task') = mengembalikan nilai input sebelumnya jika validasi gagal
                             @error('task') = mengecek apakah field 'task' memiliki error validasi --}}
                        <input type="text" name="task" id="todo-input"
                            placeholder="Tambah task baru"
                            value="{{ old('task') }}"
                            class="flex-1 w-full px-4 py-2 border @error('task') border-red-500 ring-1 ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror rounded-md focus:outline-none focus:ring-2 focus:border-transparent transition">
                        <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-md transition duration-150 ease-in-out shadow-sm cursor-pointer">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- List & Searching Section -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                
                <!-- ============================================================
                    03. FORM PENCARIAN (SEARCH)
                    method="get" = mengirim data lewat URL (contoh: /todo?search=belajar)
                    name="search" = parameter yang dikirim ke Controller ($request->input('search'))
                    Data pencarian diproses di TodoController@index
                ============================================================ -->
                <form id="search-form" action="" method="get" class="mb-6">
                    <div class="flex gap-2">
                        <input type="text" name="search" value="" 
                            placeholder="Masukkan kata kunci"
                            class="flex-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                        <button type="submit" 
                            class="bg-gray-500 hover:bg-gray-600 text-white font-medium px-5 py-2 rounded-md transition duration-150 ease-in-out shadow-sm cursor-pointer">
                            Cari
                        </button>
                    </div>
                </form>
                
                {{-- ============================================================
                    04. MENAMPILKAN DATA (READ)
                    @@forelse = loop data sekaligus cek jika data kosong (@@empty)
                    $data = variabel yang dikirim dari Controller (compact('data'))
                    $item = setiap data todo dalam loop (berisi: id, task, is_done)
                ============================================================ --}}
                <h2 class="font-semibold text-lg mb-2">Daftar Tugas</h2>
                <ul class="flex flex-col gap-2 mb-4" id="todo-list">
                    @forelse($data as $item)
                    <!-- Task Item -->
                    <li class="border border-gray-200 rounded-md p-3 flex justify-between items-center bg-gray-50 hover:bg-gray-100 transition duration-150">
                        <span class="text-gray-700 font-medium">
                            {{-- Cek status task: jika is_done == 1 (selesai), tampilkan dengan coret (<del>)
                                 Jika is_done == 0 (belum selesai), tampilkan teks biasa --}}
                            @if($item->is_done == 1)
                                <del class="text-gray-400">{{ $item->task }}</del>
                            @else
                                {{ $item->task }}
                            @endif
                        </span>
                        <div class="flex gap-1">
                            {{-- ============================================================
                                FORM HAPUS DATA (DELETE)
                                action="todo/{id}" = URL tujuan: DELETE /todo/1 (contoh id=1)
                                method="POST" = HTML form hanya support GET dan POST
                                @method('DELETE') = "method spoofing" Laravel, menambahkan hidden input
                                    <input type="hidden" name="_method" value="DELETE">
                                    agar Laravel tahu ini sebenarnya request DELETE, bukan POST
                                    Request ini akan diarahkan ke TodoController@destroy
                                @csrf = token keamanan wajib untuk setiap form non-GET
                                onsubmit="return confirm(...)" = popup konfirmasi sebelum hapus
                            ============================================================ --}}
                            <form action="{{ url('todo/'.$item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus task ini?');" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded text-sm transition shadow-sm cursor-pointer" title="Hapus">
                                    ✕
                                </button>
                            </form>
                            {{-- Tombol Edit: saat diklik, memanggil fungsi JS toggleCollapse()
                                 untuk menampilkan/menyembunyikan form edit di bawahnya --}}
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded text-sm transition shadow-sm cursor-pointer" 
                                onclick="toggleCollapse('collapse-{{ $item->id }}')" title="Edit">
                                ✎
                            </button>
                        </div>
                    </li>
                    
                    {{-- ============================================================
                        05. FORM UPDATE DATA (UPDATE)
                        Form ini tersembunyi (class="hidden"), muncul saat tombol Edit diklik
                        id="collapse-{id}" = ID unik agar JS tahu form mana yang ditoggle
                        action="todo/{id}" = URL tujuan: PUT /todo/1 (contoh id=1)
                        @@method('PUT') = "method spoofing" Laravel, menambahkan hidden input
                            <input type="hidden" name="_method" value="PUT">
                            agar Laravel tahu ini request PUT (update), bukan POST (create)
                            Request ini akan diarahkan ke TodoController@@update
                    ============================================================ --}}
                    <li id="collapse-{{ $item->id }}" class="hidden border border-gray-200 rounded-md p-4 bg-white shadow-inner mb-2">
                        <form action="{{ url('todo/'.$item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="flex gap-2 mb-3">
                                {{-- value="{{ $item->task }}" = menampilkan nilai task saat ini di input --}}
                                <input type="text" name="task" value="{{ $item->task }}"
                                    class="flex-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                                <button type="submit" 
                                    class="border-2 border-blue-500 text-blue-600 hover:bg-blue-50 font-medium px-4 py-2 rounded-md transition duration-150 cursor-pointer">
                                    Update
                                </button>
                            </div>
                            
                            <!-- Radio Buttons untuk status task -->
                            {{-- name="is_done" = dikirim ke Controller ($request->is_done)
                                 value="1" = Selesai, value="0" = Belum
                                 {{ $item->is_done == 1 ? 'checked' : '' }} = menandai radio button
                                 yang sesuai dengan status saat ini di database --}}
                            <div class="flex items-center gap-6 mt-3 px-1">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" value="1" name="is_done" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500" {{ $item->is_done == 1 ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700">Selesai</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" value="0" name="is_done" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500" {{ $item->is_done == 0 ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700">Belum</span>
                                </label>
                            </div>
                        </form>
                    </li>
                    {{-- @empty = bagian ini ditampilkan jika $data kosong (tidak ada data di database) --}}
                    @empty
                    <li class="text-center text-gray-500 p-4">Belum ada data task.</li>
                    @endforelse
                </ul>
            </div>
            
        </div>
    </div>

    <!-- ============================================================
        JAVASCRIPT: Fungsi Toggle untuk menampilkan/menyembunyikan form Edit
        Dipanggil saat tombol Edit (✎) diklik
        Parameter elementId = ID elemen form edit (contoh: 'collapse-1')
        Cara kerja: cek apakah elemen punya class 'hidden'
            - Jika punya 'hidden' → hapus class 'hidden' (form muncul)
            - Jika tidak punya 'hidden' → tambah class 'hidden' (form sembunyi)
    ============================================================ -->
    <script>
        function toggleCollapse(elementId) {
            const element = document.getElementById(elementId);
            if (element.classList.contains('hidden')) {
                element.classList.remove('hidden');
            } else {
                element.classList.add('hidden');
            }
        }
    </script>
</body>
</html>