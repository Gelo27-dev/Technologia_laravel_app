@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8 bg-[var(--color-store-background)] text-white rounded-xl shadow-lg">
        <div class="flex items-center mb-4">
            <img src="/images/technologia-logo.svg" alt="Technologia Logo" class="h-8 w-auto mr-2" />
            <h1 class="text-2xl font-bold text-white">Checkout</h1>
        </div>

        @if (session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded">
                <ul class="list-disc list-inside text-sm text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-[var(--color-store-secondary)] shadow rounded-lg p-6">
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-white">Name</label>
                        <input type="text" name="shipping_name" value="{{ old('shipping_name', $user->name ?? '') }}" class="mt-1 block w-full bg-gray-800 text-white border border-gray-700 rounded-md" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-white">Phone</label>
                        <input type="text" name="shipping_phone" value="{{ old('shipping_phone', $user->phone ?? '') }}" class="mt-1 block w-full bg-gray-800 text-white border border-gray-700 rounded-md" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-white">ZIP / Postal Code</label>
                        <input type="text" name="shipping_zip" value="{{ old('shipping_zip', $user->zip ?? '') }}" class="mt-1 block w-full bg-gray-800 text-white border border-gray-700 rounded-md" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-white">City</label>
                        <input type="text" name="shipping_city" value="{{ old('shipping_city', $user->city ?? '') }}" class="mt-1 block w-full bg-gray-800 text-white border border-gray-700 rounded-md" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-white">Payment Method</label>
                        <select name="payment_method" class="mt-1 block w-full bg-gray-800 text-white border border-gray-700 rounded-md" required>
                            <option value="credit_card" @selected(old('payment_method') === 'credit_card')>Credit Card</option>
                            <option value="paypal" @selected(old('payment_method') === 'paypal')>PayPal</option>
                            <option value="cash_on_delivery" @selected(old('payment_method') === 'cash_on_delivery')>Cash on Delivery</option>
                            <option value="bank_transfer" @selected(old('payment_method') === 'bank_transfer')>Bank Transfer</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-white">Address</label>
                        <input type="text" name="shipping_address" value="{{ old('shipping_address', $user->address ?? '') }}" class="mt-1 block w-full bg-gray-800 text-white border border-gray-700 rounded-md" required>
                    </div>
                </div>

                <div class="mt-6">
                    <h2 class="text-lg font-semibold text-white">Order Summary</h2>
                    <div class="mt-2">
                        @if(count($cartItems) > 0)
                            <ul class="divide-y divide-gray-700">
                                @foreach($cartItems as $item)
                                    <li class="py-2 flex justify-between">
                                        <div>
                                            <div class="font-medium">{{ $item->name }}</div>
                                            <div class="text-sm text-gray-500">Qty: {{ $item->qty }}</div>
                                        </div>
                                        <div class="text-right">
                                            <div>${{ number_format($item->price * $item->qty, 2) }}</div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="mt-4 text-right font-bold">Total: ${{ $cartTotal }}</div>
                        @else
                            <p class="text-sm text-gray-500">Your cart is empty.</p>
                        @endif
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-[var(--color-store-primary)] text-white rounded btn-animated inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17"/></svg>
                        <span>Place Order</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection