@extends('layouts.admin')

@section('title', 'Contact Message')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <a href="{{ route('admin.contact-messages.index') }}" class="text-gray-600 hover:text-gray-900">← Back to Messages</a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Message Details -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">{{ $contactMessage->name }}</h2>
                <p class="text-gray-600">{{ $contactMessage->email }}</p>
                @if($contactMessage->phone)
                    <p class="text-gray-600">{{ $contactMessage->phone }}</p>
                @endif
            </div>
            <div class="text-right">
                @if($contactMessage->is_booking)
                    <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                        Booking Request
                    </span>
                @endif
                <p class="text-sm text-gray-500 mt-2">{{ $contactMessage->created_at->format('M d, Y H:i') }}</p>
            </div>
        </div>

        <!-- Status -->
        <div class="mb-6">
            <form action="{{ route('admin.contact-messages.update-status', $contactMessage) }}" method="POST" class="inline-flex gap-2">
                @csrf
                @method('PATCH')
                <label class="text-sm font-medium text-gray-700">Status:</label>
                <select name="status" onchange="this.form.submit()" class="text-sm rounded border-gray-300">
                    <option value="new" {{ $contactMessage->status === 'new' ? 'selected' : '' }}>New</option>
                    <option value="read" {{ $contactMessage->status === 'read' ? 'selected' : '' }}>Read</option>
                    <option value="replied" {{ $contactMessage->status === 'replied' ? 'selected' : '' }}>Replied</option>
                    <option value="archived" {{ $contactMessage->status === 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
            </form>
        </div>

        <!-- Message -->
        <div class="border-t pt-4">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Message</h3>
            <div class="text-gray-700 whitespace-pre-wrap">{{ $contactMessage->message }}</div>
        </div>

        @if($contactMessage->replied_at)
            <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded">
                <p class="text-sm text-green-700">✓ Replied on {{ $contactMessage->replied_at->format('M d, Y H:i') }}</p>
            </div>
        @endif
    </div>

    <!-- Reply Form -->
    @if($contactMessage->status !== 'replied')
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Send Reply</h3>
            
            <form action="{{ route('admin.contact-messages.reply', $contactMessage) }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="reply_message" class="block text-sm font-medium text-gray-700 mb-2">Reply Message</label>
                    <textarea name="reply_message" id="reply_message" rows="8" required
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        placeholder="Type your reply here...">{{ old('reply_message') }}</textarea>
                    @error('reply_message')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">
                        Send Reply
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
@endsection
