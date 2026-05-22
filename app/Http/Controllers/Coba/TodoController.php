<?php

// Namespace: menentukan lokasi folder Controller ini berada di app/Http/Controllers/Coba/
namespace App\Http\Controllers\Coba;

// Import class Controller bawaan Laravel sebagai parent class
use App\Http\Controllers\Controller;
// Import Request untuk menangkap data yang dikirim dari form (input user)
use Illuminate\Http\Request;
// Import Model Todo untuk berinteraksi dengan tabel 'todolist' di database
use App\Models\Todo;

// Class TodoController: mengatur semua logika CRUD (Create, Read, Update, Delete) untuk data Todo
class TodoController extends Controller
{
    // ============================================================
    // METHOD INDEX - READ (Menampilkan semua data + fitur pencarian)
    // Dipanggil saat user mengakses URL: GET /todo
    // Alur: User buka halaman → Controller ambil data dari DB → kirim ke View untuk ditampilkan
    // ============================================================
   public function index(Request $request)
    {
        // Ambil nilai input 'search' dari URL (contoh: /todo?search=belajar)
        $search = $request->input('search');

        // Jika user mengetik kata kunci pencarian
        if ($search) {
            // Cari data task yang mengandung kata kunci (LIKE %kata%), urutkan dari terbaru (desc)
            $data = Todo::where('task', 'like', "%{$search}%")->orderBy('id', 'desc')->get();
        } else {
            // Jika tidak ada pencarian, ambil semua data, urutkan dari terbaru (desc)
            $data = Todo::orderBy('id', 'desc')->get();
        }

        // Kirim variabel $data ke view 'todolist/todolist.blade.php' untuk ditampilkan di halaman
        // compact('data') = cara singkat menulis ['data' => $data]
        return view('todolist.todolist', compact('data'));
    }

    // ============================================================
    // METHOD STORE - CREATE (Menyimpan data baru ke database)
    // Dipanggil saat user submit form tambah task: POST /todo
    // Alur: User isi form → submit → validasi → simpan ke DB → redirect kembali ke /todo
    // ============================================================
    public function store(Request $request)
    {
        // Validasi input dari form sebelum disimpan ke database
        // 'required' = wajib diisi, 'min:2' = minimal 2 karakter, 'max:25' = maksimal 25 karakter
        $request->validate([
            'task' => 'required|min:2|max:25',
        ], [
            // Pesan error custom dalam Bahasa Indonesia (menggantikan pesan default Laravel)
            'task.required' => 'Kolom task wajib diisi, tidak boleh kosong!',
            'task.min' => 'Task harus terdiri dari minimal 2 karakter!',
            'task.max' => 'Task harus terdiri dari maksimal 25 karakter!',
        ]);

        // Jika validasi lolos, buat data baru di tabel 'todolist'
        // 'task' diisi dari input form, 'is_done' default false (belum selesai)
        Todo::create([
            'task' => $request->task,
            'is_done' => false
        ]);

        // Redirect kembali ke halaman /todo dengan pesan sukses (disimpan di session flash)
        // Pesan ini akan ditampilkan di blade menggunakan session('success')
        return redirect('/todo')->with('success', 'Data berhasil ditambahkan');
    }

    // ============================================================
    // METHOD UPDATE - UPDATE (Mengubah data yang sudah ada di database)
    // Dipanggil saat user submit form edit task: PUT /todo/{id}
    // Alur: User klik edit → ubah data di form → submit → validasi → update di DB → redirect
    // ============================================================
    public function update(Request $request, $id)
    {
        // Validasi input: task wajib diisi, is_done harus bernilai 0 atau 1
        $request->validate([
            'task' => 'required|min:2|max:25',
            'is_done' => 'required|in:0,1'
        ], [
            // Pesan error custom dalam Bahasa Indonesia
            'task.required' => 'Kolom task wajib diisi saat mengubah data!',
            'task.min' => 'Task harus terdiri dari minimal 2 karakter!',
            'task.max' => 'Task harus terdiri dari maksimal 25 karakter!',
            'is_done.required' => 'Pilihan status task wajib dipilih!',
            'is_done.in' => 'Pilihan status tidak valid!',
        ]);

        // Cari data todo berdasarkan $id, jika tidak ditemukan akan otomatis return error 404
        $todo = Todo::findOrFail($id);

        // Update data yang ditemukan dengan nilai baru dari form
        $todo->update([
            'task' => $request->task,       // Update nama task
            'is_done' => $request->is_done  // Update status selesai/belum (1 atau 0)
        ]);

        // Redirect kembali ke /todo dengan pesan sukses
        return redirect('/todo')->with('success', 'Data berhasil diubah');
    }

    // ============================================================
    // METHOD DESTROY - DELETE (Menghapus data dari database)
    // Dipanggil saat user klik tombol hapus: DELETE /todo/{id}
    // Alur: User klik hapus → confirm → data dihapus dari DB → redirect kembali ke /todo
    // ============================================================
    public function destroy($id)
    {
        // Cari data todo berdasarkan $id, jika tidak ditemukan return 404
        $todo = Todo::findOrFail($id);

        // Hapus data tersebut dari database
        $todo->delete();

        // Redirect kembali ke /todo dengan pesan sukses
        return redirect('/todo')->with('success', 'Data berhasil dihapus');
    }
}
