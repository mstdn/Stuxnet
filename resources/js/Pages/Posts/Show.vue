<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import PostReply from '../Components/PostReply.vue';

let props = defineProps({
    post: Object,
    replies: Object,
});

const form = useForm();
function destroy(id) {
    if (confirm("Are you sure you want to delete?")) {
        form.delete(route('reply.destroy', id));
    }
};
</script>
<template>
    <AppLayout title="Projects">
        <template #header>
            <div class="text-sm breadcrumbs">
                <ul>
                    <li>
                        <InertiaLink preserve-scroll href="/">
                            Home
                        </InertiaLink>
                    </li>
                    <li>
                        <InertiaLink preserve-scroll href="/projects">
                            Projects
                        </InertiaLink>
                    </li>
                    <li>Here!</li>
                </ul>
            </div>
        </template>

        <section class="">
            <div
                class="gap-8 items-center py-10 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 md:py-16 lg:px-6">
                <img class="w-full" :src="post.data.file" alt="dashboard image">
                <!-- <img class="w-full hidden dark:block"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/cta/cta-dashboard-mockup-dark.svg"
                    alt="dashboard image"> -->
                <div class="mt-4 md:mt-0">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900">
                        {{ post.data.title }}
                    </h2>
                    <p class="mb-6 font-light text-gray-800 md:text-lg">
                        {{ post.data.description }}
                    </p>
                    <a v-if="post.data.link" target="_blank" :href="post.data.link" class="btn btn-primary">
                        See live
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>


        <section class="">
            <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
                <div class="font-light text-gray-800 sm:text-lg">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900">
                        {{ post.data.subtitle }}
                    </h2>
                    <p class="mb-4">
                        {{ post.data.content }}
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-8">
                    <img class="w-full rounded-lg" :src="post.data.file2" alt="office content 1">
                    <img class="mt-4 w-full lg:mt-10 rounded-lg" :src="post.data.file3" alt="office content 2">
                </div>
            </div>
        </section>
        <div class="divider"></div>
        <section>
            <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-md lg:grid lg:grid-cols-1 lg:py-16 lg:px-6">
                <div class="grid grid-cols-1 mt-8">


                    <ol class="relative border-l border-base-300">
                        <li v-for="reply in replies.data" :key="reply.id" class="mb-10 ml-6">
                            <span
                                class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-base-200 rounded-full ring-8 ring-base-300">
                                <img class="rounded-full shadow-lg" :src="reply.avatar" alt="">
                            </span>
                            <div class="p-4 bg-base-200 border border-gray-900">
                                <div class="justify-between items-center mb-3 sm:flex">
                                    <time class="mb-1 text-xs font-normal text-gray-900 sm:order-last sm:mb-0">
                                        <button v-if="reply.can.delete === true" @click="destroy(reply.id)"
                                            class="btn btn-ghost btn-xs" method="post" type="submit">
                                            Delete
                                        </button>
                                        {{ reply.time }}
                                    </time>
                                    <div class="text-sm font-normal text-gray-900 flex">{{ reply.username }}
                                        replied</div>
                                </div>
                                <div
                                    class="p-3 text-xs italic font-normal text-gray-900 bg-base-100 border border-gray-900">
                                    {{ reply.reply }}
                                </div>
                            </div>
                        </li>
                    </ol>

                    <PostReply v-if="$page.props.auth.user !== null" :post="post" />
                </div>
            </div>
        </section>


    </AppLayout>
</template>
        