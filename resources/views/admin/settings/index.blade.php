<x-app-layout>
    @include('admin.settings.partials.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @can('settings_create')
                        <div class="block mb-4">
                            <a class="underline text-sm text-green-600 hover:text-gray-900"
                               href="{{ route('admin.settings.create') }}">
                                {{ __('Add New Setting') }}
                            </a>
                        </div>
                    @endcan

                    <form method="POST" action="{{ route('admin.settings.update-all') }}">
                        @csrf

                        @foreach ($settings as $key => $setting)

                            <div class="@if ($key == 0) mt-0 @else mt-4 @endif">
                                <x-label for="setting_{{ $setting->id }}"
                                         value="{{ __($setting->name) }}"/>

                                <x-input id="setting_{{ $setting->id }}" class="block mt-1 w-full"
                                         type="text"
                                         name="settings[{{ $setting->key }}]"
                                         value="{{ old($setting->key, $setting->value) }}"
                                />

                                @can('settings_delete')
                                    <a class="underline text-sm text-red-500 hover:text-gray-900 float-right mt-1 mr-1"
                                       onclick="return confirm('Are you sure you want to delete the {{ $setting->name }} setting?')"
                                       href="{{ route('admin.settings.delete', $setting->id) }}">
                                        {{ __('Delete') }}
                                    </a>
                                @endcan
                            </div>

                        @endforeach

                        @can('settings_edit')
                            <div class="flex items-center justify-start mt-4">
                                <div class="mt-2">
                                    <x-button>
                                        {{ __('Update All') }}
                                    </x-button>
                                </div>
                            </div>
                        @endcan

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
