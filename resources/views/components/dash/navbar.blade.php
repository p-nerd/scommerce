<nav
    class="fixed z-30 w-full border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800"
>
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button
                    id="toggleSidebarMobile"
                    aria-expanded="true"
                    aria-controls="sidebar"
                    class="cursor-pointer rounded p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:bg-gray-700 dark:focus:ring-gray-700 lg:hidden"
                >
                    <svg
                        id="toggleSidebarMobileHamburger"
                        class="h-6 w-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <svg
                        id="toggleSidebarMobileClose"
                        class="hidden h-6 w-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </button>
                <div
                    class="ml-2 flex space-x-2 self-center whitespace-nowrap text-2xl font-semibold"
                >
                    <a href="/">S-Commerce</a>
                    <span>/</span>
                    <a href="{{ route('admin') }}">Admin</a>
                </div>
            </div>

            <div class="flex items-center">
                <!-- Search mobile -->
                <button
                    id="toggleSidebarMobileSearch"
                    type="button"
                    class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white lg:hidden"
                >
                    <span class="sr-only">Search</span>
                    <!-- Search icon -->
                    <svg
                        class="h-6 w-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div
                    id="dropdownNavbar"
                    class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow dark:divide-gray-600 dark:bg-gray-700"
                >
                    <ul
                        class="py-2 text-sm text-gray-700 dark:text-gray-400"
                        aria-labelledby="dropdownNavbarButton"
                    >
                        <li>
                            <a
                                href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            >
                                Overview
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            >
                                Settings
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            >
                                Earnings
                            </a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <a
                            href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                        >
                            Sign out
                        </a>
                    </div>
                </div>

                <!-- Notifications -->
                <button
                    type="button"
                    data-dropdown-toggle="notification-dropdown"
                    class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                >
                    <span class="sr-only">View notifications</span>
                    <!-- Bell icon -->
                    <svg
                        class="h-6 w-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
                        ></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div
                    class="z-50 my-4 hidden max-w-sm list-none divide-y divide-gray-100 overflow-hidden rounded bg-white text-base shadow-lg dark:divide-gray-600 dark:bg-gray-700"
                    id="notification-dropdown"
                >
                    <div
                        class="block bg-gray-50 px-4 py-2 text-center text-base font-medium text-gray-700 dark:bg-gray-700 dark:text-gray-400"
                    >
                        Notifications
                    </div>
                    <div>
                        <a
                            href="#"
                            class="flex border-b px-4 py-3 hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-600"
                        >
                            <div class="flex-shrink-0">
                                <img
                                    class="h-11 w-11 rounded-full"
                                    src="{asset('images/users/bonnie-green.png')}"
                                    alt="Jese image"
                                />
                                <div
                                    class="bg-primary-700 absolute -mt-5 ml-6 flex h-5 w-5 items-center justify-center rounded-full border border-white dark:border-gray-700"
                                >
                                    <svg
                                        class="h-3 w-3 text-white"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"
                                        ></path>
                                        <path
                                            d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div
                                    class="mb-1.5 text-sm font-normal text-gray-500 dark:text-gray-400"
                                >
                                    New message from
                                    <span
                                        class="font-semibold text-gray-900 dark:text-white"
                                    >
                                        Bonnie Green
                                    </span>
                                    : "Hey, what's up? All set for the
                                    presentation?"
                                </div>
                                <div
                                    class="text-primary-700 dark:text-primary-400 text-xs font-medium"
                                >
                                    a few moments ago
                                </div>
                            </div>
                        </a>
                        <a
                            href="#"
                            class="flex border-b px-4 py-3 hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-600"
                        >
                            <div class="flex-shrink-0">
                                <img
                                    class="h-11 w-11 rounded-full"
                                    src='{"images/users/jese-leos.png"}'
                                    alt="Jese image"
                                />
                                <div
                                    class="absolute -mt-5 ml-6 flex h-5 w-5 items-center justify-center rounded-full border border-white bg-gray-900 dark:border-gray-700"
                                >
                                    <svg
                                        class="h-3 w-3 text-white"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div
                                    class="mb-1.5 text-sm font-normal text-gray-500 dark:text-gray-400"
                                >
                                    <span
                                        class="font-semibold text-gray-900 dark:text-white"
                                    >
                                        Jese leos
                                    </span>
                                    and
                                    <span
                                        class="font-medium text-gray-900 dark:text-white"
                                    >
                                        5 others
                                    </span>
                                    started following you.
                                </div>
                                <div
                                    class="text-primary-700 dark:text-primary-400 text-xs font-medium"
                                >
                                    10 minutes ago
                                </div>
                            </div>
                        </a>
                        <a
                            href="#"
                            class="flex border-b px-4 py-3 hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-600"
                        >
                            <div class="flex-shrink-0">
                                <img
                                    class="h-11 w-11 rounded-full"
                                    src='{asset("images/users/joseph-mcfall.png")}'
                                    alt="Joseph image"
                                />
                                <div
                                    class="absolute -mt-5 ml-6 flex h-5 w-5 items-center justify-center rounded-full border border-white bg-red-600 dark:border-gray-700"
                                >
                                    <svg
                                        class="h-3 w-3 text-white"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                            clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div
                                    class="mb-1.5 text-sm font-normal text-gray-500 dark:text-gray-400"
                                >
                                    <span
                                        class="font-semibold text-gray-900 dark:text-white"
                                    >
                                        Joseph Mcfall
                                    </span>
                                    and
                                    <span
                                        class="font-medium text-gray-900 dark:text-white"
                                    >
                                        141 others
                                    </span>
                                    love your story. See it and view more
                                    stories.
                                </div>
                                <div
                                    class="text-primary-700 dark:text-primary-400 text-xs font-medium"
                                >
                                    44 minutes ago
                                </div>
                            </div>
                        </a>
                        <a
                            href="#"
                            class="flex border-b px-4 py-3 hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-600"
                        >
                            <div class="flex-shrink-0">
                                <img
                                    class="h-11 w-11 rounded-full"
                                    src="{asset('images/users/leslie-livingston.png')}"
                                    alt="Leslie image"
                                />
                                <div
                                    class="absolute -mt-5 ml-6 flex h-5 w-5 items-center justify-center rounded-full border border-white bg-green-400 dark:border-gray-700"
                                >
                                    <svg
                                        class="h-3 w-3 text-white"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                            clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div
                                    class="mb-1.5 text-sm font-normal text-gray-500 dark:text-gray-400"
                                >
                                    <span
                                        class="font-semibold text-gray-900 dark:text-white"
                                    >
                                        Leslie Livingston
                                    </span>
                                    mentioned you in a comment:
                                    <span
                                        class="text-primary-700 dark:text-primary-500 font-medium"
                                    >
                                        @bonnie.green
                                    </span>
                                    what do you say?
                                </div>
                                <div
                                    class="text-primary-700 dark:text-primary-400 text-xs font-medium"
                                >
                                    1 hour ago
                                </div>
                            </div>
                        </a>
                        <a
                            href="#"
                            class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                            <div class="flex-shrink-0">
                                <img
                                    class="h-11 w-11 rounded-full"
                                    src="{asset('images/users/robert-brown.png')}"
                                    alt="Robert image"
                                />
                                <div
                                    class="absolute -mt-5 ml-6 flex h-5 w-5 items-center justify-center rounded-full border border-white bg-purple-500 dark:border-gray-700"
                                >
                                    <svg
                                        class="h-3 w-3 text-white"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div
                                    class="mb-1.5 text-sm font-normal text-gray-500 dark:text-gray-400"
                                >
                                    <span
                                        class="font-semibold text-gray-900 dark:text-white"
                                    >
                                        Robert Brown
                                    </span>
                                    posted a new video: Glassmorphism - learn
                                    how to implement the new design trend.
                                </div>
                                <div
                                    class="text-primary-700 dark:text-primary-400 text-xs font-medium"
                                >
                                    3 hours ago
                                </div>
                            </div>
                        </a>
                    </div>
                    <a
                        href="#"
                        class="block bg-gray-50 py-2 text-center text-base font-normal text-gray-900 hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:hover:underline"
                    >
                        <div class="inline-flex items-center">
                            <svg
                                class="mr-2 h-5 w-5"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M10 12a2 2 0 100-4 2 2 0 000 4z"
                                ></path>
                                <path
                                    fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            View all
                        </div>
                    </a>
                </div>
                <!-- Apps -->
                <button
                    type="button"
                    data-dropdown-toggle="apps-dropdown"
                    class="hidden rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:flex"
                >
                    <span class="sr-only">View notifications</span>
                    <!-- Icon -->
                    <svg
                        class="h-6 w-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                        ></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div
                    class="z-50 my-4 hidden max-w-sm list-none divide-y divide-gray-100 overflow-hidden rounded bg-white text-base shadow-lg dark:divide-gray-600 dark:bg-gray-700"
                    id="apps-dropdown"
                >
                    <div
                        class="block bg-gray-50 px-4 py-2 text-center text-base font-medium text-gray-700 dark:bg-gray-700 dark:text-gray-400"
                    >
                        Apps
                    </div>
                    <div class="grid grid-cols-3 gap-4 p-4">
                        <a
                            href="#"
                            class="block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                            <svg
                                class="mx-auto mb-1 h-7 w-7 text-gray-500 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <div
                                class="text-sm font-medium text-gray-900 dark:text-white"
                            >
                                Sales
                            </div>
                        </a>
                        <a
                            href="#"
                            class="block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                            <svg
                                class="mx-auto mb-1 h-7 w-7 text-gray-500 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                                ></path>
                            </svg>
                            <div
                                class="text-sm font-medium text-gray-900 dark:text-white"
                            >
                                Users
                            </div>
                        </a>
                        <a
                            href="#"
                            class="block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                            <svg
                                class="mx-auto mb-1 h-7 w-7 text-gray-500 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <div
                                class="text-sm font-medium text-gray-900 dark:text-white"
                            >
                                Inbox
                            </div>
                        </a>
                        <a
                            href="#"
                            class="block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                            <svg
                                class="mx-auto mb-1 h-7 w-7 text-gray-500 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <div
                                class="text-sm font-medium text-gray-900 dark:text-white"
                            >
                                Profile
                            </div>
                        </a>
                        <a
                            href="#"
                            class="block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                            <svg
                                class="mx-auto mb-1 h-7 w-7 text-gray-500 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <div
                                class="text-sm font-medium text-gray-900 dark:text-white"
                            >
                                Settings
                            </div>
                        </a>
                        <a
                            href="#"
                            class="block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                            <svg
                                class="mx-auto mb-1 h-7 w-7 text-gray-500 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"
                                ></path>
                                <path
                                    fill-rule="evenodd"
                                    d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <div
                                class="text-sm font-medium text-gray-900 dark:text-white"
                            >
                                Products
                            </div>
                        </a>
                        <a
                            href="#"
                            class="block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                            <svg
                                class="mx-auto mb-1 h-7 w-7 text-gray-500 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"
                                ></path>
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <div
                                class="text-sm font-medium text-gray-900 dark:text-white"
                            >
                                Pricing
                            </div>
                        </a>
                        <a
                            href="#"
                            class="block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                            <svg
                                class="mx-auto mb-1 h-7 w-7 text-gray-500 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm2.5 3a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm6.207.293a1 1 0 00-1.414 0l-6 6a1 1 0 101.414 1.414l6-6a1 1 0 000-1.414zM12.5 10a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <div
                                class="text-sm font-medium text-gray-900 dark:text-white"
                            >
                                Billing
                            </div>
                        </a>
                        <a
                            href="#"
                            class="block rounded-lg p-4 text-center hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                            <svg
                                class="mx-auto mb-1 h-7 w-7 text-gray-500 dark:text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                                ></path>
                            </svg>
                            <div
                                class="text-sm font-medium text-gray-900 dark:text-white"
                            >
                                Logout
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Profile -->
                <div class="ml-3 flex items-center">
                    <div>
                        <button
                            type="button"
                            class="flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            id="user-menu-button-2"
                            aria-expanded="false"
                            data-dropdown-toggle="dropdown-2"
                        >
                            <span class="sr-only">Open user menu</span>
                            <img
                                class="h-8 w-8 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                alt="user photo"
                            />
                        </button>
                    </div>
                    <!-- Dropdown menu -->
                    <div
                        class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded bg-white text-base shadow dark:divide-gray-600 dark:bg-gray-700"
                        id="dropdown-2"
                    >
                        <div class="px-4 py-3" role="none">
                            <p
                                class="text-sm text-gray-900 dark:text-white"
                                role="none"
                            >
                                Neil Sims
                            </p>
                            <p
                                class="truncate text-sm font-medium text-gray-900 dark:text-gray-300"
                                role="none"
                            >
                                neil.sims@flowbite.com
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem"
                                >
                                    Overview
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem"
                                >
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem"
                                >
                                    Earnings
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem"
                                >
                                    Sign out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
