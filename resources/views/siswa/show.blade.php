<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman detail siswa</title>
</head>
<body>
    <h1>detail siswal</h1>
     {{--profile siswa--}}
     <img width="500" src="{{asset('storage/' . $datauser->photo)}}" alt="photo siswa">
     {{-- siswa--}}
    <h6>{{$datauser->name}}</h6>
     {{-- siswa--}}
    <h6>{{$datauser->nisn}}</h6>
     {{-- siswa--}}
    <h6>{{$datauser->alamat}}</h6>
     {{-- siswa--}}
    <h6>{{$datauser->email}}</h6>
     {{-- siswa--}}
     <h6>{{$datauser->no_handphone}}</h6>
</body>
</html>