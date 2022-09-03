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
    posts: Object,
    filters: Object,
});

let search = ref(props.filters.search);

watch(
    search,
    throttle(function (value) {
        Inertia.get(
            "/projects",
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
        form.delete(route('post.destroy', id));
    }
};
</script>
    <template>
    <AppLayout title="Projects">
        <!-- <template #header>
            <h1
                class="text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
                Browse <mark class="px-2 text-white bg-yellow-400 ">projects</mark>
            </h1>
        </template> -->

        <div class="hero py-10 md:py-16 dark:bg-base-300 bg-base-200">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold">Stuxprojects</h1>
                    <p class="py-6">Discover the projects I have done in the past or still working on.</p>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="overflow-hidden">

                    <Empty v-if="posts.meta.total === 0" class="columns-1 mt-20" />

                    <div class="columns-1 md:columns-3 lg:columns-4">
                        <PostCard class="mb-4" v-for="post in posts.data" :key="post.id" :post="post" />
                    </div>

                    <div class="columns-1 md:columns-1 lg:columns-1 mt-6">
                        <SimplePagination v-if="posts.meta.total >= 21" :data="posts.links" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
    