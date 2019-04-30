@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                <div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Produact Name</th>
                            <th scope="col">Product description</th>
                            <th scope="col">Product Quantity</th>
                            <th scope="col">Product price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $row =1; ?>
                        @forelse($products as $product)
                            <tr>
                                <th scope="row">{{$row++}}</th>
                                <td>{{@$product->name}}</td>
                                <td>{{@$product->description}}</td>
                                <td>{{@$product->quantity}}</td>
                                <td>{{@$product->price}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No Product</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
