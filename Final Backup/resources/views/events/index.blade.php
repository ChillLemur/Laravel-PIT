<x-app-layout>
    <x-slot name="header">
         <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Events') }}
            </h2>
            @if (auth()->check() && auth()->user()->RoleID === 1)
                <a href="{{ route('events.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create Event
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            <!-- Category Filter -->
            <div class="flex gap-4 mb-6">
                <form method="GET" action="{{ route('events.index') }}">
                    <input type="hidden" name="filter" value="name">
                    <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 focus:outline-none">
                        {{ __('Filter by Name') }}
                    </button>
                </form>
                <form method="GET" action="{{ route('events.index') }}">
                    <input type="hidden" name="filter" value="date">
                    <input type="hidden" name="order" value="{{ request('order') === 'asc' ? 'desc' : 'asc' }}">
                    <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 focus:outline-none">
                        {{ request('order') === 'asc' ? __('Filter by Newest Date') : __('Filter by Oldest Date') }}
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($events as $event)
                    <div class="bg-white p-6 rounded-lg shadow border">
                        <h3 class="font-bold text-lg">{{ $event->title }}</h3>
                        <p class="mb-2">{{ $event->description }}</p>
                        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y') }}</p>
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                        <p><strong>Category:</strong> {{ $event->category->CategoryName ?? 'Uncategorized' }}</p>
                        <p><strong>Status:</strong>
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">{{ $event->status }}</span>
                        </p>
                        <div class="mt-4 flex space-x-4">
                            <a href="{{ route('events.show', $event) }}" class="text-blue-600 hover:underline">View Details</a>
                            @if (auth()->check() && auth()->user()->RoleID === 1)
                                <a href="{{ route('events.edit', $event) }}" class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            @endif
                            @if (auth()->check() && auth()->user()->RoleID === 2)
                                <form action="{{ route('payments.store') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <button type="submit" class="text-green-600 hover:underline">Pay</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>