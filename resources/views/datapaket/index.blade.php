@extends('layouts.app')
@section('content')
<div class="container">

<div class=-"row">
        <center><h1>Data Paket</h1></center>
        <div class="panel panel-primary">
        <div class ="panel-heading">Data Paket
        <div class="panel-title pull-right"><a href="{{route ('datapaket.create')}}"> Tambah Data </a></div></div>
        
        <div class="panel-body"></div>
        <table class="table">
                <thead>
            <tr>
                <th>Nama</th>
                <th>Gambar</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <body>
                    @foreach($datapaket as $data)
                    <tr>
                        <td>{{$data->namapaket}}</td>
<td><img src="{{asset('/img/'.$data->cover.'')}}" height="100px" width="100px"></td>
<td><a href="{{ route('datapaket.edit', $data->id)}}" class="btn btn-primary">Ubah</a></td>

        <td>
       <form class="delete" action="{{route('datapaket.destroy',$data->id)}}" method="post">
                            
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" >
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus Data ?');" value="Delete"><i class="glyphicon-trash">Hapus</i></button>
                                        {{csrf_field()}}
                        </form>
                    </td>

                    </tr>
                    @endforeach
            </body>
        </div>
</div>


@endsection
