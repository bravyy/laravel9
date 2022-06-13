<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Hi <strong>{{ $user->name }}</strong>,
                    <br />
                    Welcome to the Admin Dashboard

                    @can('dashboard_stats')
                        @if (!empty($stats))
                            <div class="mt-4">
                                <p>
                                    Total Pages: {{ $stats['users'] }}
                                    <br />
                                    Total Users: {{ $stats['users'] }}
                                    <br />
                                    Total Settings: {{ $stats['settings'] }}
                                </p>
                            </div>
                        @endif
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
