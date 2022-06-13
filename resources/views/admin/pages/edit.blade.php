<x-app-layout>
    @include('admin.pages.partials.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.pages.update', $page->id) }}">
                        @csrf
                        @method('PUT')

                        @if (!empty($page->updated_at))
                            <div>
                                <p class="text-gray-500">Last Updated: {{ $page->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        @endif

                        <div>
                            <x-label for="title"
                                     value="{{ __('Title') }}"/>

                            <x-input id="title" class="block mt-1 w-full"
                                     type="text"
                                     name="title"
                                     value="{{ old('title', $page->title) }}"
                            />
                        </div>

                        <div class="mt-4">
                            <x-label for="title"
                                     value="{{ __('Page Title') }}"/>

                            <x-input id="page_title" class="block mt-1 w-full"
                                     type="text"
                                     name="page_title"
                                     value="{{ old('page_title', $page->page_title) }}"
                            />
                        </div>

                        <div class="mt-4">
                            <x-label for="title"
                                     value="{{ __('Body') }}"/>

                            <x-textarea id="body"
                                        name="body"
                                        rows="3"
                                        class="tinymce">{{ $page->body }}</x-textarea>
                        </div>

                        <div class="mt-4 form-check">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                   type="checkbox"
                                   name="published"
                                   value="1"
                                   id="published"
                                   @if (!empty($page->published)) checked="checked" @endif
                            />
                            <label class="form-check-label inline-block text-gray-800" for="published">
                                Published
                            </label>
                        </div>

                        <div class="mt-4 form-check">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                   type="checkbox"
                                   name="show_in_menu"
                                   value="1"
                                   id="show_in_menu"
                                   @if (!empty($page->show_in_menu)) checked="checked" @endif
                            />
                            <label class="form-check-label inline-block text-gray-800" for="show_in_menu">
                                Show in Menu
                            </label>
                        </div>

                        <div class="flex items-center justify-start mt-4">
                            <div class="mt-2">
                                <x-button>
                                    {{ __('Save') }}
                                </x-button>

                                <a class="underline text-sm text-gray-600 hover:text-gray-900 ml-2"
                                   href="{{ $page->url }}" target="_blank">
                                    {{ __('View') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.5/tinymce.min.js"></script>--}}
{{--    <script>--}}
{{--        tinymce.init({--}}
{{--            selector: 'textarea#body',--}}
{{--            height: 500,--}}
{{--            menubar: false,--}}
{{--            plugins: [--}}
{{--                'advlist autolink lists link image charmap print preview anchor',--}}
{{--                'searchreplace visualblocks code fullscreen',--}}
{{--                'insertdatetime media table paste code help wordcount'--}}
{{--            ],--}}
{{--            toolbar: 'undo redo | formatselect | ' +--}}
{{--                'bold italic backcolor | alignleft aligncenter ' +--}}
{{--                'alignright alignjustify | bullist numlist outdent indent | ' +--}}
{{--                'removeformat | help',--}}
{{--            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',--}}
{{--            branding: false,--}}
{{--        });--}}
{{--    </script>--}}
</x-app-layout>
