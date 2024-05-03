<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <a href="{{ route('vehicle.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">ADD</a>
            <a href="{{ route('chart.graph') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Graph</a>
            <a href="{{ route('vehicle.export') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">EXPORT</a>
            <div>
                <form action="{{ route('vehicle.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <div class="input-group">
                            {{-- make sure to add file to name attribute --}}
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-primary">Import data</button>
                    {{-- <a href="{{ route('vehicle.import') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">IMPORT DATA</a> --}}
                </form>
            </div>
        </div>
    </x-slot>
    {{-- <form action="{{ route('vehicle.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
            <div class="input-group">
                <input type="file" name="file" class="form-control">
            </div>
            <div><small>Upload the file here before clicking 'Import data'</small></div>
        </div>
        <button class="btn btn-primary">Import data</button>
        <a class="btn btn-success" href="{{ route('vehicle.export') }}">Export data</a>
    </form> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-900 text-left">Name</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-900 text-left">Transmission Type</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-900 text-left">Mileage</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-900 text-left">Driver ID</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-900 text-left">Driver Name</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-900 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            {{-- populate our post data --}}
                            @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-900 dark:text-slate-900">{{ $vehicle->name }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-900 dark:text-slate-900">{{ $vehicle->transmission_type }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-900">{{ $vehicle->mileage }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-900">{{ $vehicle->user_id }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-900">{{ $vehicle->name_of_driver }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-900">
                                        <a href="{{ route('vehicle.show', $vehicle->id) }}" class="border border-blue-500 hover:bg-blue-500 hover:text-black px-4 py-2 rounded-md">SHOW</a>
                                        <a href="{{ route('vehicle.edit', $vehicle->id) }}" class="border border-yellow-500 hover:bg-yellow-500 hover:text-white px-4 py-2 rounded-md">EDIT</a>
                                        {{-- add delete button using form tag --}}
                                        <form method="post" action="{{ route('vehicle.destroy', $vehicle->id) }}" class="inline">
                                            @csrf
                                            @method('delete')
                                            <button class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
