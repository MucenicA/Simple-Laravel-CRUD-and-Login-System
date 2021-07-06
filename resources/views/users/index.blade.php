@extends('users.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style = "text-align:center">Authors</h2>
                <hr>
                <br>
            </div>
            <div class="pull-right">
               
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
            <th>Name</th>
            <th>Job</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($author as $a)
       
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $a->name }}</td>
            <td>{{ $a->job }}</td>
            <td>
                <form action="{{ route('author.destroy',$a->id) }}" method="POST">


                    <a class="btn btn-success" href="{{ route('author.create') }}"> Create New Author</a>

                    <a class="btn btn-primary" href="{{ route('author.edit',$a->id) }}" method="POST">Edit</a>
   
                    <a class="btn btn-info" href="{{ route('author.show',$a->id) }}">Show</a>
    
      
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
       
    </table>

      
@endsection



<style>
/* a {
    margin:20px;
} */
</style>