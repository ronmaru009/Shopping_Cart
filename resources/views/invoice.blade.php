@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
               
                <form method="get" action="/home">
               		 <button class="btn btn-success">RETURN HOME</button>
                </form><br>
                <form method="get" action="/cart">
                     <button class="btn btn-success">RETURN TO CART</button>
                </form>
                </div>
                
                @if (Session::has('flash_message_delete'))
                        <div class="alert alert-danger">
                            {{Session::get('flash_message_delete')}}
                        </div>
                    @endif

                <div class="panel-body " align="center">
                    
                    	<h1> UNGUENTO PERFUMES INCORPORATED</h1><BR/><BR/>
                        <H3> PRODUCT INVOICE</H3><br>
                    <div align="left">
                        <label> PRODUCTS </label><br>
                        @foreach ($orders as $order)
                        <label>Name:</label>    {{ $order->name }} <br>  
                        <label>Description:</label>    {{ $order->description }} <br>  
                        <label>Quantity:</label>    {{$order->quantity}} <br>
                        <label>Price:</label>    {{$order->price}}<br><br>
                        
                        @endforeach

                        <label>Total Price:</label>   {{$total}} Php<br>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
