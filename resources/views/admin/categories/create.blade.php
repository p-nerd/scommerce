<x-admin-layout>
    <x-slot name="back">
        {{ route('admin.categories') }}
    </x-slot>
    <x-slot name="header">
        <x-dash.title>Create a new category</x-dash.title>
    </x-slot>
    <x-form.form method="POST" action="{{ route('admin.categories.store') }}">
        <div class="mx-auto w-1/2 space-y-5">
            <x-form.text name="name" label="Name" required autofocus />
            <x-form.textarea
                name="description"
                label="Description"
                required
                autofocus
            />
            <x-form.select
                name="parent_id"
                label="Parent Category (You choose any category then this category will be sub category of that)"
                placeholder="Select parent category"
                :options="$categories"
            />
            <x-form.submit />
        </div>
    </x-form.form>
</x-admin-layout>
