@extends('publishers.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Publisher</h2>
                <hr>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('publisher.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $publisher->name }}
            </div>
        
        </div>
    </div>
@endsection