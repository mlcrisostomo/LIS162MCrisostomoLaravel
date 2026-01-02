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

                    
                    <a href="{{ route('gj_event.create') }}">Make a New Event</a>
                    
                    <table class="border-separate border border-gray-400">
                    <thead>
                        <tr>
                        <th class="border border-gray-300">Code</th>
                        <th class="border border-gray-300">Name</th>
                        <th class="border border-gray-300">Theme</th>
                        <th class="border border-gray-300">Start Date</th>
                        <th class="border border-gray-300">End Date</th>
                        <th class="border border-gray-300">Limitations</th>
                        <th class="border border-gray-300">Notes</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($gj_event as $gj)
                            <tr>
                            <td class="border border-gray-300">{{ $gj->code }}</td>
                            <td class="border border-gray-300">{{ $gj->name }}</td>
                            <td class="border border-gray-300">{{ $gj->theme }}</td>
                            <td class="border border-gray-300">{{ $gj->start_date ? $gj->start_date->format('Y/m/d') : 'N/A' }}</td>
                            <td class="border border-gray-300">{{ $gj->end_date ? $gj->end_date->format('Y/m/d') : 'N/A' }}</td>
                            <td class="border border-gray-300">{{ $gj->limitations }}</td>
                            <td class="border border-gray-300">{{ $gj->notes }}</td>
                            <td class="border border-gray-300">

                                <!-- Show | Edit | Delete -->
                                <a href="{{ route('gj_event.show', ['gj_event' =>$gj->id]) }}">Show</a>
                                |
                                <a href="{{ route('gj_event.edit', ['gj_event' =>$gj->id]) }}">Edit</a>
                                |
                                <form action="{{ route('gj_event.destroy', ['gj_event' => $gj->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete">
                                </form>

                                <!-- End Show | Edit | Delete -->

                                

                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>

                </div>
            </div>
</x-app-layout>