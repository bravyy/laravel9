<footer class="bg-white border-t border-gray-400 shadow">
    <div class="container max-w-4xl mx-auto flex py-8">

        <div class="w-full mx-auto flex flex-wrap">
            <div class="flex w-full md:w-1/2 ">
                <div class="px-8">
                    @if (!empty($settings['about-text']))
                        <h3 class="font-bold text-gray-900">About</h3>
                        <p class="py-4 text-gray-600 text-sm">
                            {{ $settings['about-text'] }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="flex w-full md:w-1/2">
                <div class="px-8">
                    <h3 class="font-bold text-gray-900">Contact us</h3>
                    <ul class="list-reset items-center text-sm pt-3">
                        @if (!empty($settings['email']))
                            <li>
                                <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                                   href="mailto:{{ $settings['email'] }}">
                                    Email: {{ $settings['email'] }}
                                </a>
                            </li>
                        @endif

                        @if (!empty($settings['phone-number']))
                            <li>
                                {{ $settings['phone-number'] }}
                            </li>
                        @endif

                        @if (!empty($settings['facebook-link']))
                            <li>
                                <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                                   href="{{ $settings['facebook-link'] }}" target="_blank">
                                    Facebook
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
