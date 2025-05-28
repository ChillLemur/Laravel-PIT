<!-- filepath: c:\Users\user\Desktop\LARAVEL PROJECT\example-app\resources\views\history\index.blade.php -->
<x-app-layout>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Payment History</h1>

        @if($payments->isEmpty())
            <p>No payment history found.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($payments as $payment)
                    <div class="border border-gray-300 rounded-lg shadow p-4">
                        <h2 class="text-lg font-bold mb-2">{{ $payment->event->title ?? 'Event Not Found' }}</h2>
                        <p class="text-gray-600 mb-2">Date: {{ $payment->created_at->format('Y-m-d') }}</p>
                        <p class="text-gray-600 mb-4">Status: {{ $payment->status }}</p>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this payment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>