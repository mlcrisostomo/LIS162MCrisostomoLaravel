<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome!") }}
                </div>
            </div>
            
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("What would you like to do?") }}
                    <br><br>
                    
                    <a href="{{ route('gj_event.create') }}">Create a New Game Jam Event</a><br><br>
                    <a href="{{ route('gj_event.index') }}">View Game Jams</a><br><br>
                   
                    <a href="{{ route('registrant.create') }}">Register for the Game Jam!</a><br><br>
                    <a href="{{ route('registrant.index') }}">View Registrants</a><br><br>

                    <a href="{{ route('submission.create') }}">Submit entry for the Game Jam!</a><br><br>
                    <a href="{{ route('submission.index') }}">View Submissions</a><br><br>

                    
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
