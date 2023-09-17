<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h6 class="font-bold text-lg">Create Client</h6>
                    <p>Create client for your application. Just put the name of client and URI where we want to direct.
                    </p>
                    <form action="{{ route('passport.clients.store') }}" method="post" class="mt-6">
                        @csrf


                        <!-- Client name -->
                        <div>
                            <x-input-label for="name" :value="__('Client Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('email')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Redirect URI -->
                        <div class="mt-2">
                            <x-input-label for="name" :value="__('Redirect URI')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="redirect"
                                :value="old('email')" required autocomplete="redirect" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>


                        <div class="mt-4">
                            <x-primary-button type="submit">Create</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h6 class="text-lg font-bold">Client List</h6>
                    <table class="table-auto border-collapse w-full text-sm mt-6">
                        <thead>
                            <th class="text-start border-b border-b-gray-100 dark:border-gray-500">Client Name</th>
                            <th class="text-start border-b border-b-gray-100 dark:border-gray-500">Client Secret</th>
                            <th class="text-start border-b border-b-gray-100 dark:border-gray-500">Redirect URI</th>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->secret }}</td>
                                    <td>{{ $client->redirect }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
