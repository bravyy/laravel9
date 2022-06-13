<x-app-layout>
    @include('admin.settings.partials.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.settings.store') }}">
                        @csrf

                        <div>
                            <x-label for="setting_name"
                                     value="{{ __('Name') }}" />

                            <x-input id="setting_name" class="block mt-1 w-full"
                                     type="text"
                                     name="name"
                                     value="{{ old('name') }}"
                            />
                        </div>

                        <div class="mt-4">
                            <x-label for="setting_value"
                                     value="{{ __('Value') }}" />

                            <x-input id="setting_value" class="block mt-1 w-full"
                                     type="text"
                                     name="value"
                                     value="{{ old('value') }}"
                            />
                        </div>

                        <div class="flex items-center justify-start mt-4">
                            <div class="mt-2">
                                <x-button>
                                    {{ __('Save') }}
                                </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
