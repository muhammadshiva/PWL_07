@extends('mahasiswa.layout')
@section('content')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mt-2">
                    <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
                </div>
         
                <div class="float-right my-3">
                    <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
                </div>
                <br> <br> <br>
                <div class="container-fluid" action="{{ route('mahasiswa.index') }}" method="GET">
                    <form class="d-flex">
                        <input class="form-control me-5" type="text" name="search" placeholder="Search by name" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
        
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Nim</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>No. Handphone</th>
                <th>Email</th>
                <th>Tanggal lahir</th>
                <th width="280px">Action</th>
            </tr>

            @if (count($posts) > 0)
                @foreach ($posts as $Mahasiswa)
                <tr>
                    <td>{{ $Mahasiswa->nim }}</td>
                    <td>{{ $Mahasiswa->nama }}</td>
                    <td>{{ $Mahasiswa->kelas }}</td>
                    <td>{{ $Mahasiswa->jurusan }}</td>
                    <td>{{ $Mahasiswa->no_handphone }}</td>
                    <td>{{ $Mahasiswa->email }}</td>
                    <td>{{ $Mahasiswa->birthdate }}</td>
                    <td>
                    <form action="{{ route('mahasiswa.destroy',$Mahasiswa->nim) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('mahasiswa.show',$Mahasiswa->nim) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$Mahasiswa->nim) }}">Edit</a>
                            @csrf 
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                </tr>
                @endforeach
            @else 
                <div class="float-left my-2">
                    <h5 class="text-danger">Mahasiswa Not Found !</h4>
                </div>
                <div class="float-right my-2">
                    <a class="btn btn-success mt-3" href="{{ route('mahasiswa.index') }}">Kembali</a> 
                </div>
            @endif
        </table>
        <div class="d-flex float-none">
            {{$posts->links('pagination::bootstrap-4')}}
        </div>
@endsection
