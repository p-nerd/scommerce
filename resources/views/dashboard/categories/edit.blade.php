<x-dashboard-layout>
    <x-slot name="header">
        <x-dashboard.title>
            Update '{{ $category->name }}' category
        </x-dashboard.title>
    </x-slot>
    <div class="p-6">
        <form method="POST" action="{{ route('dashboard.categories.update', ['category' => $category->id]) }}" class="space-y-5">
            @csrf

            @method('PATCH')

            <div>
                <x-input-label for="name" value="Name" />
                <x-text-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name') ?? $category->name"
                    required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="description" value="Description" />
                <x-dashboard.textarea-input id="description" class="mt-1 h-[110px] w-full resize-y" name="description"
                    :value="old('description')" required autofocus autocomplete="description">{{ old('name') ?? $category->description }}</x-dashboard.textarea-input>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="parent-id"
                    value="Parent Category (You choose any category then this category will be sub category of that)" />
                <x-dashboard.select-input id="parent-id" class="mt-1 block w-full" name="parent_id" placeholder="Select parent category"
                    :value="old('parent_id') ?? $category->parent_id" :options="$categories" />
                <x-input-error :messages="$errors->get('parent_id')" class="mt-2" />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <x-primary-button class="ms-3">
                    Save
                </x-primary-button>
            </div>
        </form>
    </div>
</x-dashboard-layout>