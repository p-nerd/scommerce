<x-admin-layout>
    <x-slot name="back">
        {{ route('admin.categories') }}
    </x-slot>
    <div class="flex space-x-5">
        <div class="flex w-1/2 flex-col space-y-5">
            <x-show.info label="Category Details">
                <x-show.line label="ID">{{ $category->id }}</x-show.line>
                <x-show.line label="Slug">
                    {{ $category->slug }}
                </x-show.line>
                <x-show.line label="Name">
                    {{ $category->name }}
                </x-show.line>
                <x-show.line label="Description">
                    {{ $category->description }}
                </x-show.line>
                @if ($parent)
                    <x-show.line label="Parent Category">
                        <x-dash.anchor-link
                            href="{{ route('admin.categories.show', $parent) }}"
                        >
                            {{ $parent->name }}
                        </x-dash.anchor-link>
                    </x-show.line>
                @endif
            </x-show.info>
            @if (count($subCategories) !== 0)
                <x-show.info label="Sub categories">
                    @foreach ($subCategories as $key => $subCategory)
                        <x-show.line>
                            <x-dash.anchor-link
                                href="{{ route('admin.categories.show', $subCategory) }}"
                            >
                                {{ $subCategory->name }}
                            </x-dash.anchor-link>
                        </x-show.line>
                    @endforeach
                </x-show.info>
            @endif
        </div>
        <div class="flex w-1/2 flex-col space-y-5">
            <x-show.info label="Products ({{ count($products) }})">
                @foreach ($products as $product)
                    <x-show.line class="flex items-center justify-between">
                        <div>
                            <span class="font-medium">Product</span>
                            <a
                                href="{{ route('admin.products.show', $product) }}"
                                class="underline"
                            >
                                #{{ $product->id }}
                            </a>
                            ,
                            <span class="font-medium">Name:</span>
                            {{ $product->name }}
                        </div>
                        <x-table.view-button
                            href="{{ route('admin.products.show', $product) }}"
                        />
                    </x-show.line>
                @endforeach
            </x-show.info>
        </div>
    </div>
</x-admin-layout>
