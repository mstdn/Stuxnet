<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetBanner from '@/Components/Banner.vue';
import Compose from '../Pages/Components/Compose.vue';
import CreateCategory from '../Pages/Components/CreateCategory.vue';
import CreateBlog from '../Pages/Components/CreateBlog.vue';
import Mobile from '../Pages/Components/Mobile.vue';
import CreateLink from '../Pages/Components/CreateLink.vue';
import CreatePhoto from '../Pages/Components/CreatePhoto.vue';

defineProps({
    title: String,
});

const logout = () => {
    Inertia.post(route('logout'));
};
</script>
<template>
    <div>

        <Head :title="title" />

        <JetBanner />

        <div class="min-h-screen bg-base-100">
            <nav class="navbar sticky top-0 z-50 bg-base-100 border-b-[1px] border-base-300">
                <div class="navbar-start">
                    <div class="dropdown">
                        <label tabindex="0" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </label>
                        <ul tabindex="0"
                            class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                            <li>
                                <Link href="/" :class="{ 'btn-active text-white btn-primary': $page.url === '/' }">
                                Home
                                </Link>
                            </li>
                            <li>
                                <Link href="/blog"
                                    :class="{ 'btn-active text-white btn-primary': $page.url === '/blog' }">
                                Blog
                                </Link>
                            </li>
                            <li>
                                <Link href="/projects"
                                    :class="{ 'btn-active text-white btn-primary': $page.url === '/projects' }">
                                Work
                                </Link>
                            </li>
                            <li>
                                <Link href="/photos"
                                    :class="{ 'btn-active text-white btn-primary': $page.url === '/photos' }">
                                Photos
                                </Link>
                            </li>
                            <li>
                                <Link href="/links"
                                    :class="{ 'btn-active text-white btn-primary': $page.url === '/links' }">
                                Links
                                </Link>
                            </li>
                            <!-- <li>
                                <Link href="/contact" :class="{ 'btn-active text-white': $page.url === '/contact' }">
                                Contact
                                </Link>
                            </li> -->
                            <li tabindex="0">
                                <a class="justify-between">
                                    More
                                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                                    </svg>
                                </a>
                                <ul class="p-2 bg-base-100">
                                    <li>
                                        <Link href="/about"
                                            :class="{ 'btn-active text-white btn-primary': $page.url === '/about' }">
                                        About
                                        </Link>
                                    </li>
                                    <li>
                                        <Link href="/privacy-policy"
                                            :class="{ 'btn-active text-white btn-primary': $page.url === '/privacy-policy' }">
                                        Privacy Policy
                                        </Link>
                                    </li>
                                    <li>
                                        <Link href="/terms-of-service"
                                            :class="{ 'btn-active text-white btn-primary': $page.url === '/terms-of-service' }">
                                        Terms of Service
                                        </Link>
                                    </li>
                                    <li>
                                        <a>Also later</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <Link href="/" class="btn btn-ghost normal-case text-xl">
                    {{ $page.props.appName }}
                    </Link>
                </div>
                <div class="navbar-center hidden lg:flex">
                    <ul class="menu menu-horizontal p-0">
                        <li>
                            <Link href="/" :class="{ 'btn-active text-white btn-primary': $page.url === '/' }">
                            Home
                            </Link>
                        </li>
                        <li>
                            <Link href="/blog" :class="{ 'btn-active text-white btn-primary': $page.url === '/blog' }">
                            Blog
                            </Link>
                        </li>
                        <li>
                            <Link href="/projects"
                                :class="{ 'btn-active text-white btn-primary': $page.url === '/projects' }">
                            Work
                            </Link>
                        </li>
                        <li>
                            <Link href="/photos"
                                :class="{ 'btn-active text-white btn-primary': $page.url === '/photos' }">
                            Photos
                            </Link>
                        </li>
                        <li>
                            <Link href="/links"
                                :class="{ 'btn-active text-white btn-primary': $page.url === '/links' }">
                            Links
                            </Link>
                        </li>
                        <li tabindex="0">
                            <a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </a>
                            <ul class="p-2 bg-base-100">
                                <li>
                                    <Link href="/about"
                                        :class="{ 'btn-active text-white btn-primary': $page.url === '/about' }">
                                    About
                                    </Link>
                                </li>
                                <li>
                                    <Link href="/privacy-policy"
                                        :class="{ 'btn-active text-white btn-primary': $page.url === '/privacy-policy' }">
                                    Privacy Policy
                                    </Link>
                                </li>
                                <li>
                                    <Link href="/terms-of-service"
                                        :class="{ 'btn-active text-white btn-primary': $page.url === '/terms-of-service' }">
                                    Terms of Service
                                    </Link>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div v-if="$page.props.auth.user === null" class="navbar-end">

                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn m-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                                <circle cx="12" cy="10" r="3" />
                                <circle cx="12" cy="12" r="10" />
                            </svg>
                        </label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li>
                                <Link href="/login" :class="{ 'btn-active text-white': $page.url === '/login' }">
                                Login
                                </Link>
                            </li>
                            <li>
                                <Link href="/register" :class="{ 'btn-active text-white': $page.url === '/register' }">
                                Register
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>

                <div v-if="$page.props.auth.user !== null" class="navbar-end">

                    <div v-if="$page.props.stux === true" class="dropdown dropdown-end">
                        <label tabindex="0" class="btn m-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                                <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                            </svg>
                        </label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li>
                                <CreateLink v-if="$page.props.stux === true" />
                            </li>
                            <li>
                                <CreateBlog v-if="$page.props.stux === true" />
                            </li>
                            <li>
                                <Compose v-if="$page.props.stux === true" />
                            </li>
                            <li>
                                <CreateCategory v-if="$page.props.stux === true" />
                            </li>
                            <li>
                                <CreatePhoto v-if="$page.props.stux === true" />
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                            <div class="w-12 mask mask-hexagon">
                                <img :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                            </div>
                        </label>
                        <ul tabindex="0"
                            class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                            <li>
                                <InertiaLink v-if="$page.props.stux === true" class="justify-between"
                                    href="/admin/users"
                                    :class="{ 'btn-active text-white btn-primary': $page.url === '/admin/users' }">
                                    Users
                                    <span class="badge">ADMIN</span>
                                </InertiaLink>
                            </li>
                            <li>
                                <InertiaLink v-if="$page.props.stux === true" class="justify-between"
                                    href="/admin/replies"
                                    :class="{ 'btn-active text-white btn-primary': $page.url === '/admin/replies' }">
                                    Replies
                                    <span class="badge">ADMIN</span>
                                </InertiaLink>
                            </li>
                            <li>
                                <a class="justify-between">
                                    Profile
                                    <span class="badge">Soon</span>
                                </a>
                            </li>
                            <li>
                                <InertiaLink :href="route('profile.show')"
                                    :class="{ 'btn-active text-white btn-primary': $page.url === '/user/profile' }">
                                    Settings
                                </InertiaLink>
                            </li>
                            <li>
                                <InertiaLink href="/logout" method="post" type="button" as="button">
                                    Log Out
                                </InertiaLink>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-base-200 text-base-content">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>


        </div>



        <footer class="footer footer-center p-10 bg-base-100 text-base-content rounded">
            <div class="grid grid-flow-col gap-4">
                <InertiaLink href="/about" preserve-scroll class="link link-hover">About</InertiaLink>
                <InertiaLink href="/projects" preserve-scroll class="link link-hover">Projects</InertiaLink>
                <InertiaLink href="/terms-of-service" preserve-scroll class="link link-hover">Terms</InertiaLink>
                <InertiaLink href="/privacy-policy" preserve-scroll class="link link-hover">Privacy</InertiaLink>
            </div>
            <div>
                <div class="grid grid-flow-col gap-4">
                    <a href="https://mstdn.social/@stux" target="_blank" alt="stux on Mastodon" class="hover:bg-base-300 rounded p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-mastodon" viewBox="0 0 16 16">
                            <path
                                d="M11.19 12.195c2.016-.24 3.77-1.475 3.99-2.603.348-1.778.32-4.339.32-4.339 0-3.47-2.286-4.488-2.286-4.488C12.062.238 10.083.017 8.027 0h-.05C5.92.017 3.942.238 2.79.765c0 0-2.285 1.017-2.285 4.488l-.002.662c-.004.64-.007 1.35.011 2.091.083 3.394.626 6.74 3.78 7.57 1.454.383 2.703.463 3.709.408 1.823-.1 2.847-.647 2.847-.647l-.06-1.317s-1.303.41-2.767.36c-1.45-.05-2.98-.156-3.215-1.928a3.614 3.614 0 0 1-.033-.496s1.424.346 3.228.428c1.103.05 2.137-.064 3.188-.189zm1.613-2.47H11.13v-4.08c0-.859-.364-1.295-1.091-1.295-.804 0-1.207.517-1.207 1.541v2.233H7.168V5.89c0-1.024-.403-1.541-1.207-1.541-.727 0-1.091.436-1.091 1.296v4.079H3.197V5.522c0-.859.22-1.541.66-2.046.456-.505 1.052-.764 1.793-.764.856 0 1.504.328 1.933.983L8 4.39l.417-.695c.429-.655 1.077-.983 1.934-.983.74 0 1.336.259 1.791.764.442.505.661 1.187.661 2.046v4.203z" />
                        </svg>
                    </a>
                    <a href="https://github.com/mstdn" target="_blank" alt="stux on GitHub" class="hover:bg-base-300 rounded p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-github" viewBox="0 0 16 16">
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                        </svg>
                    </a>
                    <a href="mailto:info@stux.info" class="hover:bg-base-300 rounded p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                        </svg>
                    </a>
                    <a href="https://paypal.me/stuxOS" target="_blank" alt="stux on PayPal" class="hover:bg-base-300 rounded p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-paypal" viewBox="0 0 16 16">
                            <path
                                d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.351.351 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91.379-.27.712-.603.993-1.005a4.942 4.942 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.687 2.687 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.695.695 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016c.217.124.4.27.548.438.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.873.873 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.352.352 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32.845-5.214Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div>
                <p>© 2022. <a href="https://stux.info" target="_blank">@stux</a> · <a
                        href="https://github.com/mstdn/Stuxnet" target="_blank">Source</a></p>
            </div>
        </footer>

        <Mobile class="pt-20" />
    </div>
</template>
