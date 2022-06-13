<x-app-layout>
    @include('admin.users.partials.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @can('users_create')
                        <div class="block mb-4">
                            <a class="underline text-sm text-green-600 hover:text-gray-900"
                               href="{{ route('admin.users.create') }}">
                                {{ __('Add New User') }}
                            </a>
                        </div>
                    @endcan

                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="text-left">Name</th>
                            <th class="text-left">Email</th>
                            <th class="text-center">Roles</th>
                            @can ('users_edit')
                                <th class="text-center">Edit</th>
                            @endcan
                            @can ('users_delete')
                                <th class="text-center">Delete</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    {{ !empty($user->getRoleNames()) ? implode(', ', $user->getRoleNames()->toArray()) : '' }}
                                </td>
                                @can('users_edit')
                                    <td class="text-center">
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Edit
                                        </a>
                                    </td>
                                @endcan
                                @can ('users_delete')
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-button class="bg-red-500 text-white"
                                                      onclick="return confirm('Are you sure you want to delete user {{ $user->email }}?');">
                                                Delete
                                            </x-button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
