<?php

namespace App\Http\Controllers;


use App\Models\clas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SiswaController extends Controller
{
    public function index() 
    {
        // Panggil data siswa
        $siswas = User::all();
        return view('siswa.index', compact('siswas'));
    }
    
    /**
     * Fungsi untuk mengarahkan ke halaman create
     */
    public function create()
    {
        // Panggil data kelas
        $clases = clas::all();
        return view('siswa.create', compact('clases'));
    }

    /**
     * Untuk menyimpan data siswa
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name'=> 'required',
            'kelas_id'=> 'required',
            'nisn'  => 'required|unique:users,nisn',
            'alamat' => 'required',
            'email'=> 'required|email|unique:users,email',
            'password'   => 'required',
            'no_handphone'   => 'required|unique:users,no_handphone',
            'photo'          => 'required|image|mimes:jpeg,png,jpg,gif', // Perbaikan: 'reuired' menjadi 'required'
        ]);
        
        // Siapkan data yang akan dimasukkan
        $datasiswa_store = [
            'clas_id' => $request->kelas_id,
            'name' => $request->name,
            'nisn' => $request->nisn,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => $request->password,
            'no_handphone' => $request->no_handphone,
        ];
        
        // Unggah gambar
        $datasiswa_store['photo'] = $request->file('photo')->store('profilesiswa', 'public');
        
        // Masukkan semua data yang sudah disiapkan ke dalam database
        User::create($datasiswa_store);
        
        // Arahkan user ke halaman home
        return redirect('/')->with('success', 'Data siswa berhasil ditambahkan');

    }
    //fungsi untik delete data siswa
    public function destroy($id){
        //cari data user di database berdasarkan id user di database ada tau tidak
        $datasiswa =user::find($id);

    //cek apakah data user ada atu tidak
    if ($datasiswa != null) {
        Storage::disk('public')->delete($datasiswa->photo);
        $datasiswa->delete();
    }
    //kembalikan user ke halaman home atau beranda
    return redirect('/');
    }
    
    //untuk menampilkan view detail siswa
    public function show($id){
        //cari ke tabel user di database sesuai atau berdasarkan id user ada atau tidak
        $datauser= user::find($id); 

        //cek apakah datanya ada atau tidak
        if($datauser == null){
            return redirect('/');
        }

        //kembalikan user ke halaman show dan kembalikan data user yang di ambil

        return view('siswa.show',compact('datauser'));
    }
}