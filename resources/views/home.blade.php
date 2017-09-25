@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1>PRODUCTS</h1>
                    <form action="/cart" method="get">
                        <button class="btn btn-success"> Show Cart <span class="badge">{{$badge}}</span> </button>
                    </form>

                    @if (Session::has('flash_message'))
                        <div class="alert alert-info">
                            {{Session::get('flash_message')}}
                        </div>
                    @endif
                    
                    <table class="table table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <td><b> Product ID </b></td>
                                <td><b> Product Name </b></td>
                                <td><b> Product Description </b></td>
                                <td><b> Prices </b></td>
                                <td> &nbsp; </td>
                            </tr>
                        </thead>
                        <tbody>
                        <img src="img/1.jpg">
                            @foreach ($products as $product)
                            <tr>
                                <td><img src="/img/{{$product->id}}.png"> <!-- {{ $product->product_id }} --> </td>
                                <td> {{ $product->name }} </td>
                                <td> {{ $product->description }} </td>
                                <td> {{ $product->price }} </td>
                                <td>
                                    <form action="/home/add" method="post">
                                    {{ csrf_field() }}
                                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                        <input type="hidden" name="barcode" value="{{ $product->barcode }}">
                                        <input type="hidden" name="price" value="{{ $product->price}}">
                                        <button type="submit" class="btn btn-warning"> Add to Cart </button>
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

    <script>
        $('div.alert').delay(3000).slideUp(300);
    </script>