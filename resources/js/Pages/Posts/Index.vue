<script setup>
import Empty from '../Components/Empty.vue';
import PostCard from '../Components/PostCard.vue';
import SimplePagination from '../Components/SimplePagination.vue';

let props = defineProps({
    posts: Object,
});

</script>
    <template>
    <AppLayout title="Projects">

        <div class="hero py-10 md:py-16 dark:bg-gray-900 bg-base-200 text-black dark:text-white">
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

                    <div class="columns-1 md:columns-3 lg:columns-3">
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
    