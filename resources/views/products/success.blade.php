@extends('layouts.mainNavigation')

@section('title', 'Payment Success')

<div class="max-w-3xl mx-auto py-16 px-4 text-center">
    <h1 class="text-4xl font-bold text-green-600 mb-6">Order Placed ✅</h1>
    <p class="text-lg text-gray-700 mb-4">
        Thank you! Your order has been placed successfully. You’ll receive a confirmation email shortly.
    </p>
    <a href="{{ route('products.new_watches') }}" class="mt-4 inline-block text-blue-600 underline hover:text-blue-800">
        ← Back to Watches
    </a>
</div>

@include('layouts.footerNav')

@section('scripts')
<script>
    window.onload = function () {
        alert("Your order has been placed successfully!");
    };
</script>
@endsection
