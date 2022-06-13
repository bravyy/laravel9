<x-app-layout>
    @include('admin.pages.partials.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @can('pages_create')
                        <div class="block mb-4">
                            <a class="underline text-sm text-green-600 hover:text-gray-900"
                               href="{{ route('admin.pages.create') }}">
                                {{ __('Add New Page') }}
                            </a>
                        </div>
                    @endcan

                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="text-left">Title</th>
                            <th class="text-center">Published</th>
                            <th class="text-center">In Menu</th>
                            <th class="text-center">View</th>
                            @can ('pages_edit')
                                <th class="text-center">Edit</th>
                            @endcan
                            @can ('pages_delete')
                                <th class="text-center">Delete</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{ $page->title }}</td>
                                <td class="text-center">{{ $page->published ? 'Yes' : 'No' }}</td>
                                <td class="text-center">{{ $page->show_in_menu ? 'Yes' : 'No' }}</td>
                                <td class="text-center">
                                    @if ($page->published)
                                        <a href="{{ $page->url }}" target="_blank">
                                            View
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                @can('pages_edit')
                                    <td class="text-center">
                                        <a href="{{ route('admin.pages.edit', $page->id) }}"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Edit
                                        </a>
                                    </td>
                                @endcan
                                @can ('pages_delete')
                                    <td class="text-center">
                                        @if ($page->canBeDeleted())
                                            <form method="POST" action="{{ route('admin.pages.destroy', $page->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <x-button class="bg-red-500 text-white"
                                                          onclick="return confirm('Are you sure you want to delete page {{ $page->title }}?');">
                                                    Delete
                                                </x-button>
                                            </form>
                                        @endif
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
