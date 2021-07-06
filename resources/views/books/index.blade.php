@extends('books.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style = "text-align:center">Books</h2>
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
            <th>Price</th>
            <th>Year</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($book as $b)
       
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $b->name }}</td>
            <td>{{ $b->price }}</td>
            <td>{{ $b->year }}</td>
            <td>
                <form action="{{ route('book.destroy',$b->id) }}" method="POST">

                    <a class="btn btn-success" href="{{ route('book.create') }}"> Create New Book</a>

                    <a class="btn btn-primary" href="{{ route('book.edit',$b->id) }}" method="POST">Edit</a>
   
                    <a class="btn btn-info" href="{{ route('book.show',$b->id) }}">Show</a>
    
        
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