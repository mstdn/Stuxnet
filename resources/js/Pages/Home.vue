<script setup>
import Empty from './Components/Empty.vue';
import PostCard from './Components/PostCard.vue';
import SimplePagination from './Components/SimplePagination.vue';
import PhotoCard from './Components/PhotoCard.vue';

let props = defineProps({
    posts: Object,
    photos: Object,
});

</script>
<template>
    <AppLayout title="Home">

        <section class="dark:bg-gray-800 dark:text-white">
            <div class="hero min-h-[500px] bg-base-200 dark:bg-gray-800" style="background-image: url(/images/banner.jpg);">
                <div class="hero-overlay bg-opacity-80"></div>
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        <h1 class="text-5xl font-bold text-gray-900 dark:text-white">
                            {{ $page.props.appName }}
                        </h1>
                        <p class="py-6 text-gray-900 dark:text-white">Base of operations.</p>
                        <div class="btn-group">
                            <InertiaLink href="/blog" class="btn btn-primary">Blog</InertiaLink>
                            <InertiaLink href="/photos" class="btn btn-primary">Photos</InertiaLink>
                            <InertiaLink href="/projects" class="btn btn-primary">Work</InertiaLink>
                            <InertiaLink href="/links" class="btn btn-primary">Links</InertiaLink>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="dark:bg-gray-800 dark:text-white">
            <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6 dark:bg-gray-800 dark:text-white">
                <div class="max-w-screen-md mb-8 lg:mb-16">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                        Hosting &amp; developing a new digital world without ads &amp; tracking.
                    </h2>
                    <p class="text-gray-900 dark:text-white sm:text-xl">
                        The internet has lost it's way. Websites &amp; platforms are full of advertisements &amp;
                        tracking software, crypto bro's thinking they are creating the new internet while wrecking the
                        planet. It has to stop.
                    </p>
                </div>
                <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                    <div>
                        <div
                            class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-xl font-bold">Advertisements</h3>
                        <p class="text-gray-900 dark:text-white">
                            We need to find a better way to support websites and platforms.
                        </p>
                    </div>
                    <div>
                        <div
                            class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-xl font-bold">Tracking</h3>
                        <p class="text-gray-900 dark:text-white">
                            Do not collect data you don't need for your service on your users.
                        </p>
                    </div>
                    <div>
                        <div
                            class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-xl font-bold">Data Selling</h3>
                        <p class="text-gray-900 dark:text-white">
                            Never ever sell your users data. It's not yours.
                        </p>
                    </div>
                    <div>
                        <div
                            class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="#417505" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-xl font-bold">FOSS</h3>
                        <p class="text-gray-900 dark:text-white">
                            Free open source software is one of the solutions.
                        </p>
                    </div>
                    <div>
                        <div
                            class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="#417505" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-xl font-bold">Ad-Free</h3>
                        <p class="text-gray-900 dark:text-white">
                            Instead of forcing your users, go with optional options.
                        </p>
                    </div>
                    <div>
                        <div
                            class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="#417505" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-xl font-bold">No Data Collection</h3>
                        <p class="text-gray-900 dark:text-white">
                            Do not harvest data, period.
                        </p>
                    </div>
                </div>
            </div>
        </section>


        <section class="dark:bg-gray-800 dark:text-white">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
                <InertiaLink href="/projects"
                    class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200 dark:bg-gray-800 dark:text-white"
                    role="alert">
                    <span class="text-xs bg-base-300 rounded-full text-gray-900 dark:text-white px-4 py-1.5 mr-3">New</span>
                    <span class="text-sm font-medium">Laravel open source projects</span>
                    <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </InertiaLink>
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
                    Checkout my work
                </h1>
                <p class="mb-8 text-lg font-normal text-gray-900 dark:text-white lg:text-xl sm:px-16 xl:px-48">
                    Most of my work is free open source software and can be used by anyone for free. Forever!
                </p>
            </div>
        </section>
        <section class="pt-4 pb-16 dark:bg-gray-800 dark:text-white">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="overflow-hidden">

                    <Empty v-if="posts.meta.total === 0" class="columns-1 mt-20" />

                    <div class="columns-1 md:columns-3 lg:columns-3">
                        <PostCard class="mb-4" v-for="post in posts.data" :key="post.id" :post="post" />
                    </div>

                    <div class="columns-1 md:columns-1 lg:columns-1 mt-6">
                        <SimplePagination v-if="posts.meta.total >= 21" :data="posts.links" />
                    </div>
                </div>
            </div>
        </section>

        <section class="dark:bg-gray-800 dark:text-white">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
                <h1 class="mb-4 text-4xl font-extrabold tracking-none text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
                    Browse Photos
                </h1>
                <p class="mb-8 text-lg font-normal text-gray-900 dark:text-white lg:text-xl sm:px-16 xl:px-48">
                    Free open source photos made with a Canon EOS2000D.
                </p>
            </div>
        </section>
        <section class="pt-4 pb-16 dark:bg-gray-800 dark:text-white">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="overflow-hidden">

                    <Empty v-if="photos.meta.total === 0" class="columns-1 mt-20" />

                    <div class="columns-1 md:columns-3 lg:columns-4">
                        <PhotoCard class="mb-4" v-for="post in photos.data" :key="post.id" :post="post" />
                    </div>

                    <div class="columns-1 md:columns-1 lg:columns-1 mt-6">
                        <SimplePagination v-if="photos.meta.total >= 21" :data="photos.links" />
                    </div>
                </div>
            </div>
        </section>



    </AppLayout>
</template>
