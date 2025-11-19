@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-bold mb-4">Share Order</h2>
                <p class="mb-4">Here is the secure link to share this order. It will expire in 30 minutes.</p>
                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded">
                    <a href="{{ $share_link }}" class="text-blue-600 dark:text-blue-400 break-all">{{ $share_link }}</a>
                </div>
                <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">Copy this link and share it with others. The link is temporary and will stop working after 30 minutes.</p>
            </div>
        </div>
    </div>
</div>
@endsection