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
                    
                    <a href="{{ route('submission.create') }}">Submit Entry</a>
                    
                    <table class="border-separate border border-gray-400">
                    <thead>
                        <tr>
                        <th class="border border-gray-300">Submission Name</th>
                        <th class="border border-gray-300">URL</th>
                        <th class="border border-gray-300">Permission Status</th>
                        <th class="border border-gray-300">Registrant</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($submission_db as $s)
                            <tr>
                            <td class="border border-gray-300">{{ $s->name }}</td>
                            <td class="border border-gray-300">
                                <a href="{{ $s->url }}" target="_blank" class="text-blue-600 underline">
                                    View Link
                                </a>
                            </td>
                            <td class="border border-gray-300">{{ $s->permission_status }}</td>
                            <td class="border border-gray-300">
                                {{ $s->registrant?->team_name ?? 'N/A' }}
                            </td>

                            <td class="border border-gray-300">

                                <!-- Edit | Delete -->

                                <a href="{{ route('submission.edit', ['submission' =>$s->id]) }}">Edit</a>
                                |
                                <form action="{{ route('submission.destroy', ['submission' => $s->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete">
                                </form>

                                <!-- End Edit | Delete -->

                            </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>