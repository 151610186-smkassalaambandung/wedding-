@extends('layouts.app')
@section('content')
<div class="container">

<div class=-"row">
        <center><h1>Data galeri</h1></center>
        <div class="panel panel-primary">
        <div class ="panel-heading">Data galeri
        <div class="panel-title pull-right"><a href="/admin/galeri/create"> Tambah Data </a></div></div>
        
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
                    @foreach($galeri as $data)
                    <tr>
                        <td>{{$data->nama}}</td>
                        <td>
                            <src type="submit">
                                <a href="{{ route('galeri.index') }}"><img src="{{asset('/img/'.$data->cover.'')}}" height="100px" width="100px"></a></button>
                        </td><td>
                            <a class="btn btn-warning" href="/admin/galeri/{{$data->id}}/edit">Edit</a>
                        </td>
            
                    
                        
                        
                        <td>
                        <form action="{{route('galeri.destroy',$data->id)}}" method="post">
                            
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" >
                            <input type="submit" class="btn btn-danger" value="delete">
                            {{csrf_field()}}
                        </form>
                    </td>

                    </tr>
                    @endforeach
            </body>

        

        
        </div>
</div>


@endsection
