@extends('publishers.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style = "text-align:center">Publishers</h2>
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
            <th width="280px">Action</th>
        </tr>


        @foreach ($publisher as $p)
       
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $p->name }}</td>
          
            <td>
                <form action="{{ route('publisher.destroy',$p->id) }}" method="POST">

                    <a class="btn btn-success" href="{{ route('publisher.create') }}"> Create New Publisher</a>

                    <a class="btn btn-primary" href="{{ route('publisher.edit',$p->id) }}" method="POST">Edit</a>
   
                    <a class="btn btn-info" href="{{ route('publisher.show',$p->id) }}">Show</a>
    
    
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