<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import throttle from "lodash/throttle";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from '@inertiajs/inertia-vue3';
import Empty from '../Components/Empty.vue';
import PostCard from '../Components/PostCard.vue';
import SimplePagination from '../Components/SimplePagination.vue';

let props = defineProps({
    blogs: Object,
    filters: Object,
});

let search = ref(props.filters.search);

watch(
    search,
    throttle(function (value) {
        Inertia.get(
            "/blogs",
            { search: value },
            {
                preserveState: true,
                replace: true,
                preserveScroll: true
            }
        );
    }, 500)
);

const form = useForm();
function destroy(id) {
    if (confirm("Are you sure you want to delete?")) {
        form.delete(route('blog.destroy', id));
    }
};
</script>
        <template>
    <AppLayout title="Blog">
        <!-- <template #header>
                <h1
                    class="text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
                    Browse <mark class="px-2 text-white bg-yellow-400 ">projects</mark>
                </h1>
            </template> -->

        <div class="hero py-10 md:py-16 bg-base-200">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold">Stuxblogs</h1>
                    <p class="py-6">Quick reads for the mind.</p>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="overflow-hidden">

                    <Empty v-if="blogs.meta.total === 0" class="columns-1 mt-20" />

                    <div v-for="post in blogs.data" :key="post.id" class="card w-full max-w-[650px] mx-auto py-6">
                        <!-- <figure v-if="post.file !== '/storage/'"><img class=" w-ful h-max-[300px]" :src="post.file" />
                        </figure> -->
                        <div class="card-body border-white border-[1px] bg-base-200 rounded-lg">
                            <h4 class="card-title">
                                <div class="flex justify-between w-full">
                                    <div class="flex justify-start">
                                        <InertiaLink :href="route('blog.post', { id: post.id })" class="btn-link">
                                            {{ post.time }}
                                        </InertiaLink>
                                    </div>
                                    <div class="flex justify-end">
                                        <InertiaLink :href="route('blog.post', { id: post.id })" class="btn-link">
                                            <div class="badge badge-outline">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path
                                                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                                    </path>
                                                </svg>
                                                <div class="ml-2">
                                                    {{ post.replycount }}
                                                </div>
                                            </div>
                                        </InertiaLink>
                                    </div>
                                </div>

                            </h4>
                            <p class="my-2">{{ post.description }}</p>
                            <div class="card-actions justify-end">
                                <button v-if="$page.props.stux === true" @click="destroy(post.id)"
                                    class="btn btn-error btn-sm" method="post" type="submit">
                                    Delete
                                </button>
                                <InertiaLink :href="route('blog.post', { id: post.id })"
                                    class="btn btn-primary btn-ghost btn-sm">
                                    Read more
                                </InertiaLink>
                            </div>
                        </div>
                    </div>

                    <div class="columns-1 md:columns-1 lg:columns-1 mt-6">
                        <SimplePagination v-if="blogs.meta.total >= 11" :data="blogs.links" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
        