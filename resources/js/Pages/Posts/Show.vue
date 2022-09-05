<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import PostReply from '../Components/PostReply.vue';
import SimplePagination from '../Components/SimplePagination.vue';
import NoReplies from '../Components/NoReplies.vue';
import ReplyCard from '../Components/ReplyCard.vue';

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

                <label for="Image1" class="modal-button">
                    <img class="w-full rounded-lg" :src="post.data.file" alt="">
                </label>
                <input type="checkbox" id="Image1" class="modal-toggle" />
                <div class="modal">
                    <div class="modal-box w-11/12 max-w-5xl">
                        <label for="Image1" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                        <img class="w-full h-full mt-6 rounded-lg" :src="post.data.file" alt="">
                        <div class="modal-action">
                            <label for="Image1" class="btn">Close</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 md:mt-0">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-black dark:text-white">
                        {{ post.data.title }}
                    </h2>
                    <p class="mb-6 font-light text-black dark:text-white md:text-lg">
                        {{ post.data.description }}
                    </p>
                    <a v-if="post.data.link" target="_blank" :href="post.data.link" class="btn btn-primary">
                        More
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
                <div class="font-light text-black dark:text-white sm:text-lg">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold">
                        {{ post.data.subtitle }}
                    </h2>
                    <p class="mb-4">
                        {{ post.data.content }}
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-8">
                    <div>
                        <label for="Image3" class="modal-button">
                            <img class="w-full rounded-lg" :src="post.data.file2" alt="">
                        </label>
                        <input type="checkbox" id="Image3" class="modal-toggle" />
                        <div class="modal">
                            <div class="modal-box w-11/12 max-w-5xl">
                                <label for="Image3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                <img class="w-full h-full mt-6 rounded-lg" :src="post.data.file2" alt="">
                                <div class="modal-action">
                                    <label for="Image3" class="btn">Close</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="Image4" class="modal-button">
                            <img class="mt-4 w-full lg:mt-10 rounded-lg" :src="post.data.file3" alt="">
                        </label>
                        <input type="checkbox" id="Image4" class="modal-toggle" />
                        <div class="modal">
                            <div class="modal-box w-11/12 max-w-5xl">
                                <label for="Image4" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                <img class="w-full h-full mt-6 rounded-lg" :src="post.data.file3" alt="">
                                <div class="modal-action">
                                    <label for="Image4" class="btn">Close</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <img class="mt-4 w-full lg:mt-10 rounded-lg" :src="post.data.file3" alt=""> -->

                </div>
            </div>
        </section>

        <div class="divider"></div>

        <div class="mx-auto max-w-screen-md w-full pt-4">
            <h1 class="text-2xl md:text-3xl font-bold text-center">
                {{ post.data.replycount }} Replies
            </h1>
        </div>

        <section>
            <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-md lg:grid lg:grid-cols-1 lg:py-16 lg:px-6">
                <div class="grid grid-cols-1 mt-8">

                    <NoReplies class="pb-10" v-if="replies.meta.total === 0" />

                    <ReplyCard :replies="replies" />

                    <SimplePagination v-if="replies.meta.total >= 21" :data="replies.links" />

                    <PostReply v-if="$page.props.auth.user !== null" :post="post" />
                </div>
            </div>
        </section>


    </AppLayout>
</template>
        