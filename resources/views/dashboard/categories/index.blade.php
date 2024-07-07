<x-dashboard-layout>
    <x-slot name="header">
        <x-dash.title>
            @if (isset($category))
                Sub-categories of '{{ $category->name }}'
            @else
                Categories
            @endif
        </x-dash.title>
        <x-dash.new-button href="{{ route('dashboard.categories.create') }}">
            Create new category
        </x-dash.new-button>
    </x-slot>

    <x-table.filters-row>
        <x-table.search-input />
        <x-table.select-per-page />
    </x-table.filters-row>

    @if ($categories->isEmpty())
        <x-table.empty>You didn't create any category yet</x-table.empty>
    @else
        <div>

            @php
                $isDesc = request()->query('order') === 'desc';
                $no = $isDesc ? $categories->toArray()['to'] : $categories->toArray()['from'];
            @endphp
            <x-table.table>
                <x-table.thead>
                    <x-table.tr>
                        <x-table.th>No</x-table.th>
                        <x-table.sortable-th name="name">Name</x-table.sortable-th>
                        <x-table.sortable-th class="w-[120px]" name="created_at">Created At</x-table.sortable-th>
                        <x-table.th class="w-[200px]" ></x-table.th>
                    </x-table.tr>
                </x-table.thead>
            </x-table.table>
            @foreach ($categories as $category)
                @if(!$category->parent_id)
                <x-table.table>
                    <x-table.tbody>
                        <x-table.tr>
                            <x-table.td class="w-[50px] text-center">
                                {{ $no }}

                                @php
                                    if ($isDesc) {
                                        $no--;
                                    } else {
                                        $no++;
                                    }
                                @endphp
                            </x-table.td>
                            <x-table.td class="w-full">{{ $category->name }}</x-table.td>
                            <x-table.td class="w-[200px]">{{ $category->created_at->format('M, j Y') }}</x-table.td>
                            <x-table.actions-td>
                                <x-table.view-button href="{{ route('dashboard.categories.show', $category) }}" />
                                <x-table.edit-button href="{{ route('dashboard.categories.edit', $category) }}" />
                                <x-table.delete-button href="{{ route('dashboard.categories.destroy', $category) }}"
                                    confirm="Are you sure?" />
                            </x-table.actions-td>
                        </x-table.tr>
                    </x-table.tbody>
                </x-table.table>
                <div class="ml-10">
                    <x-table.table>
                        <x-table.tbody>
                            @foreach ($category->subCategories as $subCategory)
                                <x-table.tr>
                                    <x-table.td class="w-[50px] text-center">
                                        {{ $no }}

                                        @php
                                            if ($isDesc) {
                                                $no--;
                                            } else {
                                                $no++;
                                            }
                                        @endphp
                                    </x-table.td>
                                    <x-table.td class="w-full">{{ $subCategory->name }}</x-table.td>
                                    <x-table.td  class="w-[200px]" >{{ $subCategory->created_at->format('M, j Y') }}</x-table.td>
                                    <x-table.actions-td>
                                        <x-table.view-button
                                            href="{{ route('dashboard.categories.show', $subCategory) }}" />
                                        <x-table.edit-button
                                            href="{{ route('dashboard.categories.edit', $subCategory) }}" />
                                        <x-table.delete-button
                                            href="{{ route('dashboard.categories.destroy', $subCategory) }}"
                                            confirm="Are you sure?" />
                                    </x-table.actions-td>
                                </x-table.tr>
                            @endforeach
                        </x-table.tbody>
                    </x-table.table>
                </div>
                @endif
            @endforeach
            <x-table.pagination :data="$categories" />
        </div>
    @endif
</x-dashboard-layout>
