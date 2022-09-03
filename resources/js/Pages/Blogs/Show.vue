<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

let props = defineProps({
    blog: Object,
});

const form = useForm();
function destroy(id) {
    if (confirm("Are you sure you want to delete?")) {
        form.delete(route('blog.destroy', id));
    }
};
</script>
    <template>
    <AppLayout title="Blog">
        <template #header>
            <div class="text-sm breadcrumbs">
                <ul>
                    <li>
                        <InertiaLink preserve-scroll href="/">
                            Home
                        </InertiaLink>
                    </li>
                    <li>
                        <InertiaLink preserve-scroll href="/blog">
                            Blog
                        </InertiaLink>
                    </li>
                    <li>Here!</li>
                </ul>
            </div>
        </template>

        <section v-if="blog.data.file !== '/storage/'">
            <div
                class="gap-8 items-center py-10 px-4 max-w-[650px] mx-auto xl:gap-16 md:grid md:grid-cols-1 md:py-16 lg:px-6">
                <div class="border-base-300 border-[1px] bg-gray-100">
                    <img class="w-full" :src="blog.data.file" alt="">
                    <div class="p-4 mt-4">
                        <p class="mb-6 font-light text-gray-800 md:text-lg">
                            {{ blog.data.description }}
                        </p>
                    </div>
                </div>

            </div>
        </section>

        <section v-if="blog.data.file === '/storage/'">
            <div
                class="gap-8 items-center py-10 px-4 mx-auto max-w-[650px] xl:gap-16 md:grid md:grid-cols-1 md:py-16 lg:px-6">
                <div class="mt-4 border-base-300 border-[1px] bg-gray-100">
                    <p class="p-6 font-light text-gray-800 md:text-lg">
                        {{ blog.data.description }}
                    </p>
                </div>
            </div>
        </section>


        <!-- <section class="">
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
            </section> -->


    </AppLayout>
</template>
            