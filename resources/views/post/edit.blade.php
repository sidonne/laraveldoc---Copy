<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('EDITING  THE ARTICLE : ') }} {{$post->title}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="POST" action="{{ route('posts.store') }}">
                            <!-- @method('put') -->
                            @csrf
                            <div class="mb-6">
                                <label class="block">
                                    <span class="text-gray-700">Title</span>
                                    <input type="text" name="title" class="block w-full @error('title') border-red-500 @enderror mt-1 rounded-md" placeholder="" value="{{$post->title}}" />
                                </label>
                                @error('title')
                                    <div class="text-sm text-red-600">
                                        Please do fill in the Title
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <select name="category" id="category">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}} {{$post->category_id == $category->id ? 'selected' : ''}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('slug')
                                    <div class="text-sm text-red-600">
                                        A Category is required
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label class="block">
                                    <span class="text-gray-700">Description</span>
                                    <!-- <textarea id="editor" class="block w-full mt-1 rounded-md" name="description" rows="3"></textarea> -->
                                    <textarea name="content" class="form-control my-editor text-sm text-gray-800 dark:text-gray-200">{{$post->content}}</textarea>
                                </label>
                                @error('description')
                                <div class="text-sm text-red-600">
                                    There is no Content please fill
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="text-white bg-blue-600  rounded text-sm px-5 py-2.5">
                                MODIFY ARTICLE
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
            var editor_config = {
                path_absolute : "/",
                base_url : "/js/tinymce/",
                height : 350,
                selector: 'textarea.my-editor',
                relative_urls: false,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                file_picker_callback : function(callback, value, meta) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                    if (meta.filetype == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.openUrl({
                        url : cmsURL,
                        title : 'Filemanager',
                        width : x * 0.8,
                        height : y * 0.8,
                        resizable : "yes",
                        close_previous : "no",
                        onMessage: (api, message) => {
                            callback(message.content);
                        }
                    });
                }
            };

        </script>

        <script>

            document.addEventListener('DOMContentLoaded', (event) =>{

                tinymce.init(editor_config);

            });

        </script>

</x-app-layout>
