<div class="hidden w-4/12 -mx-8 lg:block">

    <div class="px-8">
        <br><br>
        <div class="flex flex-col max-w-sm px-16 py-4 mx-10 bg-white rounded-lg shadow-md">
            <ul class="-mx-2">
                <li class="flex items-center">
                    <p>
                        <a href="{{ route('posts.create', $post)}}" class="mx-1 font-bold text-gray-700 hover:underline">
                            Create Post/Article
                        </a>
                    </p>
                </li>
                <li class="flex items-center mt-6">
                    <p>
                        <a href="{{ route('posts.edit', $post)}}" class="mx-0 font-bold text-gray-700 hover:underline">
                            Update Post/Article
                        </a>
                    </p>
                </li>
                <li class="flex items-center mt-6">
                    <p>
                        <a href="#" class="mx-1 font-bold text-gray-700 hover:underline" onclick="event.preventDefault; document.getElementById('destroy-post').submit();">
                            Delete Post/Article
                            <form action="{{route('posts.destroy', $post)}}" method="get" id="destroy-post">
                                @csrf
                                @method('delete')
                            </form>
                        </a>
                    </p>
                </li>
            </ul>
        </div>
    </div>
    <br><br>
    <div class="px-8">
        <h1 class="mb-4 text-xl font-bold text-gray-700">Post Details</h1>
        <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
            <ul class="-mx-4">
                <li class="flex items-center">
                    <p>
                        <a href="#" class="mx-1 font-bold text-gray-700 hover:underline">
                            Article Author :
                        </a>
                        <span class="text-sm font-light text-gray-700">
                            {{$post->user->name}}
                        </span>
                    </p>
                </li>
                <li class="flex items-center mt-6">
                    <p>
                        <a href="#" class="mx-1 font-bold text-gray-700 hover:underline">
                            Article Category :
                        </a>
                        <span class="text-sm font-light text-gray-700">
                            {{$post->category->name}}
                        </span>
                    </p>
                </li>
                <li class="flex items-center mt-6">
                    <p>
                        <a href="#" class="mx-1 font-bold text-gray-700 hover:underline">
                            Created On :
                        </a>
                        <span class="text-sm font-light text-gray-700">
                            {{$post->created_at}}
                        </span>
                    </p>
                </li>
                <li class="flex items-center mt-6">
                    <p>
                        <a href="#" class="mx-1 font-bold text-gray-700 hover:underline">
                            Updated On :
                        </a>
                        <span class="text-sm font-light text-gray-700">
                            {{$post->updated_at}}
                        </span>
                    </p>
                </li>
            </ul>
        </div>
    </div>
</div>


