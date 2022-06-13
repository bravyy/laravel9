<x-guest-layout>
    @include('pages.partials.nav')

    <!--Container-->
    <div class="container w-full md:max-w-3xl mx-auto pt-20 pb-20">
        <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
            <div class="font-sans">
                <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                    {{ $page->page_title ?? $page->title }}
                </h1>
            </div>

            <div class="min-h-screen">
                {!! $page->body !!}
            </div>
        </div>
    </div>
    <!--/container-->

    @include('pages.partials.footer')
</x-guest-layout>
