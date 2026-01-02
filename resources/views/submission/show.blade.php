<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submission Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        <!-- Display Submission Details -->
                        <table>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $submission_db->name }}</td>
                            </tr>
                            <tr>
                                <th>URL:</th>
                                <td>{{ $submission_db->url }}</td>
                            </tr>
                            <tr>
                                <th>Permission Status:</th>
                                <td>{{ $submission_db->permission_status }}</td>
                            </tr>
                            <tr>
                                <th>Registrant:</th>
                                <td>{{ $submission_db->registrant->team_name }}</td>
                            </tr>
                        </table>

                        <!-- End Display Submission Details -->

                </div>
            </div>
</x-app-layout>