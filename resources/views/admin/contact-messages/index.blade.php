@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-white">Contact Messages</h2>
</div>

<!-- Status Filter -->
<div class="mb-6 flex gap-2">
    <a href="{{ route('admin.contact-messages.index') }}" class="px-4 py-2 rounded {{ !request('status') || request('status') === 'all' ? 'bg-black text-white' : 'bg-neutral-800 text-gray-300 border border-neutral-600 hover:bg-neutral-700' }}">
        All
    </a>
    <a href="{{ route('admin.contact-messages.index', ['status' => 'new']) }}" class="px-4 py-2 rounded {{ request('status') === 'new' ? 'bg-black text-white' : 'bg-neutral-800 text-gray-300 border border-neutral-600 hover:bg-neutral-700' }}">
        New
    </a>
    <a href="{{ route('admin.contact-messages.index', ['status' => 'read']) }}" class="px-4 py-2 rounded {{ request('status') === 'read' ? 'bg-black text-white' : 'bg-neutral-800 text-gray-300 border border-neutral-600 hover:bg-neutral-700' }}">
        Read
    </a>
    <a href="{{ route('admin.contact-messages.index', ['status' => 'replied']) }}" class="px-4 py-2 rounded {{ request('status') === 'replied' ? 'bg-black text-white' : 'bg-neutral-800 text-gray-300 border border-neutral-600 hover:bg-neutral-700' }}">
        Replied
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="bg-neutral-800 shadow rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-neutral-700">
        <thead class="bg-neutral-700">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">From</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Message</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-neutral-800 divide-y divide-neutral-700">
            @forelse($messages as $message)
                <tr class="{{ $message->status === 'new' ? 'bg-blue-50' : '' }}">
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-white">{{ $message->name }}</div>
                        <div class="text-sm text-gray-400">{{ $message->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($message->is_booking)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                Booking
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                General
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-white">{{ Str::limit($message->message, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($message->status === 'new')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                New
                            </span>
                        @elseif($message->status === 'read')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Read
                            </span>
                        @elseif($message->status === 'replied')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Replied
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                {{ ucfirst($message->status) }}
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                        {{ $message->created_at->format('M d, Y H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.contact-messages.show', $message) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-400">
                        No messages found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $messages->links() }}
</div>
</div>
@endsection
