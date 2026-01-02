<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <a href="{{ route('registrant.create') }}">Register for Event</a>
                    
                    <table class="border-separate border border-gray-400">
                    <thead>
                        <tr>
                        <th class="border border-gray-300">Team Name</th>
                        <th class="border border-gray-300">Team Members</th>
                        <th class="border border-gray-300">Team Representative Email</th>
                        <th class="border border-gray-300">Registrant Type</th>
                        <th class="border border-gray-300">Event Registered</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($registrant as $r)
                            <tr>
                            <td class="border border-gray-300">{{ $r->team_name }}</td>
                            <td class="border border-gray-300">{{ $r->team_members }}</td>
                            <td class="border border-gray-300">{{ $r->team_rep_email }}</td>
                            <td class="border border-gray-300">
                                @if ($r->registrant_type_id == 1) 
                                    Individual
                                @elseif ($r->registrant_type_id == 2)
                                    Team
                                @endif
                                
                            </td>
                            <td class="border border-gray-300">{{ $r->gj_event?->name ?? 'N/A' }}</td>
                            <td class="border border-gray-300">

                                <!-- Edit | Delete -->
                                
                                <a href="{{ route('registrant.edit', ['registrant' =>$r->id]) }}">Edit</a>
                                |
                                <form action="{{ route('registrant.destroy', ['registrant' => $r->id]) }}" method="post">
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