<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Game Jams') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Create Game Jam Event Form -->
                    <form action="{{ route('gj_event.update', ['gj_event' => $gj_event->id]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <label for="code">Code:</label>
                        <input type="text" id="code" name="code" value="{{ $gj_event->code }}"><br><br>

                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="{{ $gj_event->name }}" required><br><br>

                        <label for="theme">Theme:</label>
                        <input type="text" id="theme" name="theme" value="{{ $gj_event->theme }}"><br><br>

                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" value="{{ $gj_event->start_date }}"><br><br>

                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" value="{{ $gj_event->end_date }}"><br><br>

                        <label for="limitations">Limitations:</label>
                        <input type="text" id="limitations" name="limitations" value="{{ $gj_event->limitations }}"><br><br>

                        <label for="notes">Notes:</label>
                        <input type="text" id="notes" name="notes" value="{{ $gj_event->notes }}"><br><br>

                        <input type="submit" value="Update Event">
                    </form>
                    <!-- End Create Game Jam Event Form -->
                     
                </div>
            </div>
</x-app-layout>
