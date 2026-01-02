<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registration Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if ($errors->any())
                    <div style="background: #fee2e2; border: 1px solid #ef4444; color: #b91c1c; padding: 15px; margin-bottom: 20px;">
                    <strong>Whoops! Something went wrong:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                    </div>
                    @endif    

                    <!-- Create Registrant Form -->
                    <form action="{{ route('registrant.update', ['registrant' => $registrant->id]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <label for="team_name">Team Name:</label>
                        <input type="text" id="team_name" name="team_name" value="{{ $registrant->team_name }}"><br><br>

                        <label for="team_members">Team Members:</label>
                        <input type="text" id="team_members" name="team_members" value="{{ $registrant->team_members }}" required><br><br>
                        
                        <label for="team_rep_email">Team Representative Email:</label>
                        <input type="email" id="team_rep_email" name="team_rep_email" value="{{ $registrant->team_rep_email }}"><br><br>
                        
                        <label for="registrant_type_id">Registrant Type:</label>
                        <select name="registrant_type_id">
                            @foreach($types as $t)
                                <option value="{{ $t->id }}" {{ $registrant->registrant_type_id == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
                            @endforeach
                        </select><br><br>

                        <label for="gj_event_id">Select Event:</label>
                        <select id="gj_event_id" name="gj_event_id" required>
                            @foreach($gj_event as $event)
                                <option value="{{ $event->id }}" {{ $registrant->gj_event_id == $event->id ? 'selected' : '' }}>{{ $event->name }}</option>
                            @endforeach
                        </select><br><br>

                        <input type="submit" value="Update Event">
                    </form>

                </div>
            </div>
</x-app-layout>
