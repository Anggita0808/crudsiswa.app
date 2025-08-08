<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Siswa</title>
</head>
<body>
    <h1><b>Halaman Tambah Siswa</b></h1>
    <b>Form Tambah Siswa</b>
    <br>
    <a href="/">Kembali ke Daftar Siswa</a>

    <form action="/siswa/store" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Nama</label><br>
            <input type="text" name="name" placeholder="Masukkan Nama Siswa" value="{{ old('name') }}">
            @error('name')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <div>
            <label>Kelas</label><br>
            <select name="kelas_id">
                <option value="">-- Pilih Kelas --</option>
                @foreach ($clases as $clas)
                    <option value="{{ $clas->id }}">{{ $clas->name }}</option>
                @endforeach
            </select>
            @error('kelas_id')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <div>
            <label>NISN</label><br>
            <input type="text" name="nisn" placeholder="Masukkan NISN" value="{{ old('nisn') }}">
            @error('nisn')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <div>
            <label>Alamat</label><br>
            <input type="text" name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
            @error('alamat')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <div>
            <label>Email</label><br>
            <input type="text" name="email" placeholder="Masukkan Email" value="{{ old('email') }}">
            @error('email')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <div>
            <label>Password</label><br>
            <input type="password" name="password" placeholder="Masukkan Password">
            @error('password')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <div>
            <label>No Handphone</label><br>
            <input type="tel" name="no_handphone" placeholder="Masukkan No Handphone" value="{{ old('no_handphone') }}">
            @error('no_handphone')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <div>
            <label>Photo</label><br>
            <input type="file" name="photo">
            @error('photo')
                <br><small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>

        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>