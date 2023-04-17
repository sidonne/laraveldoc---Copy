<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ARTICLES') }}
        </h2>

    </x-slot>

    <div class="overflow-x-hidden bg-gray-100">


    <div class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <div class="w-full lg:w-8/12">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold text-gray-700 md:text-2xl"></h1>
                    <div>
                        <!-- <select class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option>Latest</option>
                            <option>Last Week</option>
                        </select> -->
                        <div class="searchbar">
                            <form action="">
                                <input type="text" name="search" placeholder="Search............" class="my-1">
                                <button type="submit" ">
                                    <img src="../images/search.png" alt="search">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @forelse($posts as $post)
                    <div class="mt-6">

                            <div class="flex items-center justify-between">
                                <span class="font-light text-gray-600">
                                    {{$post->created_at->format('d M Y')}}
                                </span>
                                <a href="#" class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">
                                    {{$post->category->name}}
                                </a>
                            </div>
                            <div class="mt-2">
                                <a href="#" class="text-2xl font-bold text-gray-700 hover:underline">
                                    {{$post->title}}
                                </a>
                                <p class="mt-2 text-gray-600">
                                    {!!Str::limit($post->content, 120)!!}
                                </p>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <a href="{{ route('posts.show', $post)}}" class="text-blue-500 hover:underline">
                                    Read more
                                </a>
                                <div>
                                    <a href="#" class="flex items-center">
                                        <h1 class="font-bold text-gray-700 hover:underline">
                                            {{$post->user->name}}
                                        </h1>
                                    </a>
                                </div>
                            </div>
                            <hr class="py-2">

                    </div>
                    @empty
                    <h2>NO ARTICLE EXIST ON OUR PLATEFORM. PLEASE HAVE ANOTHER SEARCH</h2>
                @endforelse

                <div class="mt-8">
                    <div class="flex">
                        <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-500 bg-white rounded-md cursor-not-allowed">
                            previous
                        </a>

                        <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                            1
                        </a>

                        <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                            2
                        </a>

                        <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                            3
                        </a>

                        <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                            Next
                        </a>
                    </div>
                </div>
            </div>
            @include('partials.sidebar')
        </div>
    </div>
    @include('partials.footer')
</div>

</x-app-layout>
