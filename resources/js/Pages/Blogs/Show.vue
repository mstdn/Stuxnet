<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import PostReply from '../Components/PostReply.vue';
import BlogReply from '../Components/BlogReply.vue';
import NoReplies from '../Components/NoReplies.vue';
import ReplyCard from '../Components/ReplyCard.vue';

let props = defineProps({
    blog: Object,
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

        <section v-if="blog.data.file !== '/storage/'" class="dark:bg-gray-800">
            <div
                class="gap-8 items-center py-10 px-4 max-w-screen-md mx-auto xl:gap-16 md:grid md:grid-cols-1 md:py-16 lg:px-6">
                <div class="border-gray-800 border-[1px] bg-base-200 text-black rounded-lg dark:bg-gray-900 dark:text-white">
                    <img class="w-full" :src="blog.data.file" alt="">
                    <div class="flex justify-between">
                        <div class="flex justify-start">
                            <div class="avatar mt-6 ml-6">
                                <div class="w-14 h-14 rounded">
                                    <img :src="blog.data.avatar" />
                                </div>
                                <div class="ml-4 mt-1 text-xl">
                                    <div class="text-sm">
                                        Posted by
                                    </div>
                                    {{ blog.data.username }}
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <div class="mt-6 mr-4">
                                <div class="badge">
                                    {{ blog.data.time }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 mt-4">
                        <p class="mb-6 font-light md:text-lg">
                            {{ blog.data.description }}
                        </p>
                    </div>
                </div>

            </div>
        </section>

        <section v-if="blog.data.file === '/storage/'" class="dark:bg-gray-800">
            <div
                class="gap-16 items-center py-10 px-4 mx-auto max-w-screen-md xl:gap-16 md:grid md:grid-cols-1 md:py-16 lg:px-6">
                <div class="mt-4 border-gray-800 border-[1px] bg-base-200 text-black rounded-lg dark:bg-gray-900 dark:text-white">
                    <div class="flex justify-between">
                        <div class="flex justify-start">
                            <div class="avatar mt-6 ml-6">
                                <div class="w-14 h-14 rounded">
                                    <img :src="blog.data.avatar" />
                                </div>
                                <div class="ml-4 mt-1 text-xl">
                                    <div class="text-sm">
                                        Posted by
                                    </div>
                                    {{ blog.data.username }}
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <div class="mt-6 mr-4">
                                <div class="badge">
                                    {{ blog.data.time }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="p-6 font-light md:text-lg">
                        {{ blog.data.description }}
                    </p>
                </div>
            </div>
        </section>

        <div class="divider dark:bg-gray-800"></div>

        <div class="mx-auto max-w-screen-md w-full pt-4 dark:bg-gray-800">
            <h1 class="text-2xl md:text-3xl font-bold text-center text-black dark:text-white">
                {{ blog.data.replycount }} Replies
            </h1>
        </div>

        <section class="dark:bg-gray-800">
            <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-md lg:grid lg:grid-cols-1 lg:py-16 lg:px-6">
                <div class="grid grid-cols-1 mt-8">

                    <NoReplies class="pb-10" v-if="replies.meta.total === 0" />

                    <ReplyCard :replies="replies" />

                    <BlogReply v-if="$page.props.auth.user !== null" :post="blog" />
                </div>
            </div>
        </section>



    </AppLayout>
</template>
            