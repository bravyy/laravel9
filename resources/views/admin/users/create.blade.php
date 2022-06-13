<x-app-layout>
    @include('admin.users.partials.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf

                        <div>
                            <x-label for="name"
                                     value="{{ __('Name') }}" />

                            <x-input id="name" class="block mt-1 w-full"
                                     type="text"
                                     name="name"
                                     value="{{ old('name') }}"
                            />
                        </div>

                        <div class="mt-4">
                            <x-label for="email"
                                     value="{{ __('Email') }}" />

                            <x-input id="email" class="block mt-1 w-full"
                                     type="text"
                                     name="email"
                                     value="{{ old('email') }}"
                            />
                        </div>

                        <div class="mt-4">
                            <x-label for="roles"
                                     value="{{ __('Roles') }}" />

                            @foreach ($roles as $role)
                                <div class="form-check">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                           type="checkbox"
                                           name="roles[]"
                                           value="{{ $role->id }}"
                                           id="role_{{ $role->id }}"
                                    />
                                    <label class="form-check-label inline-block text-gray-800" for="role_{{ $role->id }}">
                                        {{ __($role->name) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="block mt-1 w-full"
                                     type="password"
                                     name="password"
                                     autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                     type="password"
                                     name="password_confirmation" />
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
