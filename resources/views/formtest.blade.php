<x-layout>
    <div class="space-y-12">
        <div class="border-b border-white/10">
            <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12 p-10 bg-gray-800 rounded-lg">

                <form method="POST" action="/formtest" class="sm:col-span-4">
                    @csrf

                    <label for="email" class="block text-sm/6 font-medium text-white">Email</label>
                    <div class="mt-2">
                        <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                            <input
                                id="email"
                                type="email"
                                name="email"
                                placeholder="juandelacruz@umindanao.edu.ph"
                                class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6"
                            />
                        </div>

                        <div class="mt-3 flex items-center gap-x-6 justify-end">
                            <button type="submit"
                                    class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Success & Error Messages -->
    @if (session('success'))
        <div class="p-4 bg-green-900/70 border border-green-500 text-green-300 rounded-lg mx-10">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="p-4 bg-red-900/70 border border-red-500 text-red-300 rounded-lg mx-10">
            {{ session('error') }}
        </div>
    @endif

    <!-- Email List -->
    <div class="mt-3 p-5">
        <h2 class="text-lg font-semibold text-white">Emails ({{ $emails->count() }}/5)</h2>

        @if ($emails->isEmpty())
            <p class="text-gray-400 italic mt-4">No emails added yet.</p>
        @else
            <ul class="mt-4 space-y-2">
                @foreach ($emails as $email)
                    <li class="flex items-center justify-between bg-gray-700 px-4 py-3 rounded-md text-white text-sm">
                        <span>{{ $email }}</span>

                        <!-- Delete Email -->

                        <form method="POST" action="/delete-email" class="inline">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <button type="submit"
                                    onclick="return confirm('Delete this email?')"
                                    class="text-red-400 hover:text-red-500 text-xs font-medium">
                                Delete
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif

        <!-- Delete All Email -->
        @if ($emails->isNotEmpty())
            <div class="mt-6">
                <a href="/delete-emails"
                   onclick="return confirm('Delete all emails?')"
                   class="text-red-400 hover:text-red-500 text-sm">
                    Delete All Emails
                </a>
            </div>
        @endif
    </div>

</x-layout>
