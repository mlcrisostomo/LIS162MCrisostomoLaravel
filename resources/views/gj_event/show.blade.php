<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Game Jam Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Display Game Jam Event Details Here -->
                     <table>
                        <tr>
                            <th>Code:</th>
                            <td>{{ $gj_event->code }}</td>
                        </tr>
                        <tr>
                            <th>Name:</th>
                            <td>{{ $gj_event->name }}</td>
                        </tr>
                        <tr>
                            <th>Theme:</th>
                            <td>{{ $gj_event->theme }}</td>
                        </tr>
                        <tr>
                            <th>Start Date:</th>
                            <td>{{ $gj_event->start_date }}</td>
                        </tr>
                        <tr>
                            <th>End Date:</th>
                            <td>{{ $gj_event->end_date }}</td>
                        </tr>
                        <tr>
                            <th>Limitations:</th>
                            <td>{{ $gj_event->limitations }}</td>
                        </tr>
                        <tr>
                            <th>Notes:</th>
                            <td>{{ $gj_event->notes }}</td>
                        </tr>
                    </table>
                    <!-- End Display Game Jam Event Details Here -->
                    
                    <a href="{{ route('gj_event.index') }}">Back to Events List</a>

                </div>
            </div>
</x-app-layout>