<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <div class="py-12">
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-bold text-gray-700 md:text-2xl">

                            </h1>

                            <div>
                                <a href="#" class="mx-1 px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">
                                    {{ $post->category->name }}
                                </a>
                            </div>

                        </div>
                        <br>
                        <p class="my-6  text-sm text-gray-800 dark:text-gray-200">
                            {!!$post->content!!}
                        </p>
                    </div>
                </div>
                @include('partials.sidebar1')
            </div>
        </div>
    </div>

</x-app-layout>
