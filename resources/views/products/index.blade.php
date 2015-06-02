@extends('layouts.main')
@section('title', 'Products')
@section('additionalstyles')
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
                                    Books
                                    <span class="addnew">
                                        <a href="{{ url('products/create') }}"><i class="glyphicon glyphicon-plus"></i>Add new</a>
                                    </span>
                                </div>

				<div class="panel-body">
                                    @foreach($products as $product)
                                        <div class="col-md-4">
                                            <a href="{{ url('products',$product->id) }}"><h4>{{ $product->dish }} </h4></a>
                                            <small>in {{ $product->menu_category->name }}</small>
                                            <p>$ {{ $product->price }}</p>
                                            <span class='link-edit'>
                                                <a href="{{ action('ProductController@edit',$product->id) }}"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                                            </span>
                                            |
                                            
                                            {!! Form::open(['action' => ['ProductController@destroy', $product->id], 'method' => 'DELETE', 'class' => 'form-inline one-button-form']) !!}
                                                <button type="submit" class="btn btn-link form-inline" >
                                                    <i class="glyphicon glyphicon-remove"></i>Delete
                                                </button>
                                            {!! Form::close() !!}

                                            
                                        </div>
                                    @endforeach
                                </div>
			</div>
		</div>
	</div>
</div>
@stop