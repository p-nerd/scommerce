<td x-data="{ open: false }" class="relative w-4 border-r p-4 align-middle">
    <button @click="open = !open" @click.outside="open = false">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-6"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z"
            />
        </svg>
    </button>
    <div
        x-show="open"
        class="absolute right-10 top-5 z-10 rounded-lg bg-white shadow"
    >
        <div class="flex flex-col space-y-2 p-2">
            {{ $slot }}
        </div>
    </div>
</td>
