<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

let props = defineProps({
    post: Object,
    filters: Object,
});

const form = useForm();
function destroy(id) {
    if (confirm("Are you sure you want to delete?")) {
        form.delete(route('post.destroy', id));
    }
};
</script>
<template>
    <AppLayout title="Projects">

        <!-- <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="overflow-hidden">

                    <div class="columns-1 md:columns-3 lg:columns-4">

                    </div>

                </div>
            </div>
        </div> -->

        <section class="">
            <div
                class="gap-8 items-center py-10 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 md:py-16 lg:px-6">
                <img class="w-full"
                    :src="post.data.file"
                    alt="dashboard image">
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
                    <a v-if="post.data.link" target="_blank" :href="post.data.link"
                        class="btn btn-primary">
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
                    <img class="w-full rounded-lg"
                        :src="post.data.file2"
                        alt="office content 1">
                    <img class="mt-4 w-full lg:mt-10 rounded-lg"
                        :src="post.data.file3"
                        alt="office content 2">
                </div>
            </div>
        </section>


    </AppLayout>
</template>
        