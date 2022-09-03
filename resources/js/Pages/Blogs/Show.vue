<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import PostReply from '../Components/PostReply.vue';
import BlogReply from '../Components/BlogReply.vue';
import NoReplies from '../Components/NoReplies.vue';

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

        <section v-if="blog.data.file !== '/storage/'">
            <div
                class="gap-8 items-center py-10 px-4 max-w-screen-md mx-auto xl:gap-16 md:grid md:grid-cols-1 md:py-16 lg:px-6">
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
                class="gap-16 items-center py-10 px-4 mx-auto max-w-screen-md xl:gap-16 md:grid md:grid-cols-1 md:py-16 lg:px-6">
                <div class="mt-4 border-base-300 border-[1px] bg-gray-100">
                    <p class="p-6 font-light text-gray-800 md:text-lg">
                        {{ blog.data.description }}
                    </p>
                </div>
            </div>
        </section>

        <div class="divider"></div>
        
        <div class="mx-auto max-w-screen-md w-full pt-4">
            <h1 class="text-2xl md:text-3xl font-bold text-center">
                {{ blog.data.replycount }} Replies
            </h1>
        </div>

        <section>
            <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-md lg:grid lg:grid-cols-1 lg:py-16 lg:px-6">
                <div class="grid grid-cols-1 mt-8">



                    <NoReplies class="pb-10" v-if="replies.meta.total === 0" />

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
                                    class="p-3 text-xs italic font-normal text-gray-900 bg-white border border-gray-900">
                                    {{ reply.reply }}
                                </div>
                            </div>
                        </li>
                    </ol>

                    <BlogReply v-if="$page.props.auth.user !== null" :post="blog" />
                </div>
            </div>
        </section>



    </AppLayout>
</template>
            