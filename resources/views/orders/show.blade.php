@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Order Details</h1>

        @if ($orderProducts->isEmpty())
            <p>No products found for this order.</p>
        @else
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Product ID</th>
                        <th class="py-2 px-4 border-b">Product Name</th>
                        <th class="py-2 px-4 border-b">Price</th>
                        <th class="py-2 px-4 border-b">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderProducts as $product)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $product->product_id }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->product->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->price }} DH</td>
                            <td class="py-2 px-4 border-b">{{ $product->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
