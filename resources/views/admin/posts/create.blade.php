<x-layout>
    <x-setting heading="Create a New Post">

        <form action="/admin/posts" method="post" enctype="multipart/form-data">
                @csrf
                <x-forms.input name="title" type="text" required/>
                <x-forms.input name="slug" type="text" required/>
                <x-forms.input name="thumbnail" type="file" required/>


                <x-forms.textarea name="excerpt"/>
                <x-forms.textarea name="body"/>

                <x-forms.field>
                    <x-forms.label name="category"/>
                    <select name="category_id" id="category_id" class="p-4 rounded-xl">
                        @foreach (App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ old('category_id')==$category->id?'selected':'' }}>{{ ucwords($category->name) }}</option>
                        @endforeach

                    </select>
                    <x-forms.error name="category_id"/>
                </x-forms.field>
                <x-forms.button>publish</x-forms.button>


            </form>

    </x-setting>
</x-layout>
