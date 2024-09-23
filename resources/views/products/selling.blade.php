@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-4xl font-extrabold mb-8 text-gray-800">Selling Product : </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Products Section on the left -->
            <div class="md:col-span-2">
                <a href="{{ route('order.index') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 mb-6">View All Orders</a>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($products as $product)
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <div class="p-6">
                                <h3 class="text-2xl font-semibold mb-3 text-gray-900">{{ $product->name }}</h3>
                                <p class="text-gray-600 mb-2">{{ $product->category->name }}</p>
                                <p class="text-xl font-bold text-gray-900">{{ $product->price }} DH</p>
                            </div>
                            <div class="px-6 pb-6 flex justify-end">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition-colors duration-300 add-to-order"
                                    data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}">
                                    Add to Order
                                </button>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="mt-6">
                    {{ $products->links('pagination::tailwind') }}
                </div>
            </div>

            <!-- Order Section on the right -->
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Your Order</h2>
                <form action="{{ route('order.store') }}" method="POST"> @csrf
                <div id="order-container" class="p-6 bg-gray-100 border border-gray-300 rounded-lg">
                    <p class="text-gray-600">No products added to the order yet.</p>
                </div>
                </form>

            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $(document).ready(function() {
            let order = [];

            function updateOrderUI() {
                if (order.length === 0) {
                    $('#order-container').html('<p class="text-gray-600">No products added to the order yet.</p>');
                } else {
                    let orderHtml = '';
                    let totalprice = 0;

                    order.forEach(function(product, index) {
                        index += 1;
                        totalprice += product.price * product.quantity;

                        orderHtml += `
                            <div class="order-item mb-4 p-4 bg-white shadow rounded-lg">
                                <p class="font-semibold text-gray-900"> * ${index} : ${product.name}</p>
                                <div >
                                    <div>
                                        <h1>${product.name}</h1>
                                        <input type="hidden" name="name[${index}]" value="${product.name}" >
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Quantity:</label>
                                        <input type="number" id="quantity-${index}" name="quantity[${index}]" value="${product.quantity}" data-index="${index}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                                    </div>
                                    <div>

                                        <input type="number"  id="price-${index}" name="price[${index}]" value="${product.price}" data-index="${index}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                                    </div>
                                    <div class="mt-2">
                                        <button type="button" class="remove-from-order bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-4 rounded" data-id="${product.id}">
                                         Remove
                                         </button>
                                    </div>


                                </div>
                            </div>
                        `;
                    });

                    orderHtml += `
                        <div class="mb-4">
                            <h1>Total Price: <span id="displayTotalPrice">${totalprice}</span></h1>
                            <input type="hidden" name="totalprice" value="${totalprice}"  class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Validate Order
                        </button>
                    `;
                    orderHtml += '';
                    $('#order-container').html(orderHtml);
                }
            }

            // function change_price(elem) {
            //     let index = $(elem).data('index') - 1;
            //     let newPrice = parseFloat($(elem).val());

            //     if (!isNaN(newPrice)) {
            //         order[index].price = newPrice;
            //         updateOrderUI();
            //     }
            // }


            $('.add-to-order').on('click', function() {
                let productId = $(this).data('id');
                let productName = $(this).data('name');
                let productPrice = $(this).data('price');
                let existingProduct = order.find(p => p.id === productId);

                if (existingProduct) {
                    existingProduct.quantity += 1;
                } else {
                    order.push({
                        id: productId,
                        name: productName,
                        price: productPrice,
                        quantity: 1
                    });
                }

                updateOrderUI();
            });

            $(document).on('change', 'input[id^="price-"]', function() {
                let index = $(this).data('index') - 1;
                let newPrice = parseFloat($(this).val());

                if (!isNaN(newPrice)) {
                    order[index].price = newPrice;
                    updateOrderUI();
                }
            });

            $(document).on('change', 'input[id^="quantity-"]', function() {
                let index = $(this).data('index') - 1;
                let newQuantity = $(this).val();

                if (!isNaN(newQuantity)) {
                    order[index].quantity = newQuantity;
                    updateOrderUI();
                }
            });

            $(document).on('click', '.remove-from-order', function() {
                let productId = $(this).data('id');

                order = order.filter(p => p.id !== productId);
                updateOrderUI();
            });

            $('#validate-order').on('click', function() {
                if (order.length === 0) {
                    alert('Your order is empty!');
                    return;
                }
            });
        });
    </script>
@endsection
