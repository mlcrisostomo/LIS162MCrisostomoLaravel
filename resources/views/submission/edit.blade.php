<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submissions') }}
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

                    <!-- Edit Submission Form -->
                    <form action= "{{ route('submission.update', ['submission' => $submission_db->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        
                        <label for="name">Submission Name:</label>
                        <input type="text" id="name" name="name" value="{{ $submission_db->name }}"><br><br>

                        <label for="url">URL:</label>
                        <input type="text" id="url" name="url" value="{{ $submission_db->url }}"><br><br>

                        <label for="permission_status">Permission Status:</label>
                        <input type="text" id="permission_status" name="permission_status" value="{{ $submission_db->permission_status }}"><br><br>

                        <label for="registrant_id">Registrant:</label>
                        <select id="registrant_id" name="registrant_id">
                            @foreach($registrant as $r)
                                <option value="{{ $r->id }}" {{ $r->id == $submission_db->registrant_id ? 'selected' : '' }}>{{ $r->team_name }}</option>
                            @endforeach
                        </select><br><br>
                        
                        <input type="submit" value="Update Submission">
                    </form>

                    <!-- End Edit Submission Form -->
                     
                </div>
            </div>
</x-app-layout>
