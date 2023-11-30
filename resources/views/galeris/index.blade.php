@extends('galeris.app')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD Image Gallery</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('galeris.create') }}"> Create New Product</a>
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
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($galeris as $galeri)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/images/{{ $galeri->image }}" width="100px"></td>
            <td>{{ $galeri->name }}</td>
            <td>{{ $galeri->description }}</td>
            <td>
                <form action="{{ route('galeris.destroy',$galeri->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('galeris.show',$galeri->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('galeris.edit',$galeri->id) }}">Edit</a>
     
                    @csrf
                    {{ method_field('delete')}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $galeris->links() !!}
        
@endsection