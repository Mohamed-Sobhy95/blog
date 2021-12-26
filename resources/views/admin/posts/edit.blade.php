<x-layout>
    <x-setting :heading="'Edit post : '.$post->title">

        <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
                @csrf

                @method('PATCH')
                <x-forms.input name="title" type="text" value="{{ old('title',$post->title) }}" required/>
                <x-forms.input name="slug" type="text" value="{{ old('slug',$post->slug) }}" required/>

                <div class="flex mt-6 space-x-6">
                    <div class="flex-1">
                        <x-forms.input name="thumbnail" type="file"/>
                    </div>
                    <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl mt-3" width="100px">
                </div>

                <x-forms.textarea name="excerpt">{{ $post->excerpt }}</x-forms.textarea>
                <x-forms.textarea name="body">{{ $post->body }}</x-forms.textarea>

                <x-forms.field>
                    <x-forms.label name="category"/>
                    <select name="category_id" id="category_id" class="p-4 rounded-xl">
                        @foreach (App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ (old('category_id',$post->category_id))==$category->id?'selected':'' }}>{{ ucwords($category->name) }}</option>
                        @endforeach

                    </select>
                    <x-forms.error name="category_id"/>
                </x-forms.field>
                <x-forms.button>publish</x-forms.button>


            </form>

    </x-setting>
</x-layout>
