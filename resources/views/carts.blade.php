@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h1>CART ITEMS</h1>
                <form method="get" action="/home">
               		 <button class="btn btn-success">RETURN HOME</button>
                </form>
                </div>
                <h3 align="right">TOTAL: {{$total }} Php </h3>

                <form method="get" action="/invoice">
                <button class="btn btn-info">CHECK OUT</button>
                </form>


                @if (Session::has('flash_message_delete'))
                        <div class="alert alert-danger">
                            {{Session::get('flash_message_delete')}}
                        </div>
                    @endif

                <div class="panel-body">
                    
                    	<table class="table table-striped table-hover">

                    		<thead>
                    			<tr>
                    				<td><b>ID</td>
                    				<td><b>Product_id</td>
                    				<td><b>Quantity</td>
                                    <td><b>Amount</td>
                    				<td><b>Barcode</td>
                                    <!-- <td>Total Amount</td> -->
                    			</tr>
                    		</thead>
                    		
                    		<tbody>
                    			@foreach($carts as $cart)
                    			<tr>
                    				<td>{{$cart->id}}</td>
                    				<td>{{$cart->product_id}}</td>
                    				<td>{{$cart->quantity}}</td>
                                    <td>{{$cart->amount}}</td>
                    				<td>{{$cart->barcode}}</td>
                                    <!-- <td>{{$cart->total}}</td> -->
                    				<td>
	                    				<form action="/cart/delete/{{ $cart->product_id }}/{{ $cart->id }}" method="get">
	                    					{{ csrf_field() }}
	                    					<!-- <input type="hidden" name="id" value="{{ $cart->id }}"> -->
	                    					<button type="submit" class="btn btn-danger">REMOVE</button>
	                    				</form>
	                    			</td>
                    			</tr>
                    			@endforeach
                    		</tbody>
                    	</table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
