<template>
    <div>
        <ol class="relative border-l border-gray-600 dark:border-black">
            <li v-for="reply in replies.data" :key="reply.id" class="mb-10 ml-6">
                <span
                    class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-base-200 rounded-full ring-8 ring-gray-300 dark:ring-black">
                    <img class="rounded-full shadow-lg" :src="reply.avatar" alt="">
                </span>
                <div class="p-4 bg-base-200 border border-gray-600 dark:bg-gray-900 dark:border-black rounded-lg">
                    <div class="justify-between items-center mb-3 sm:flex">
                        <time class="mb-1 text-xs font-normal dark:text-white text-black sm:order-last sm:mb-0">
                            <button v-if="reply.can.delete === true" @click="destroy(reply.id)"
                                class="btn btn-ghost btn-xs" method="post" type="submit">
                                Delete
                            </button>
                            {{ reply.time }}
                        </time>
                        <div class="text-sm font-normal text-black dark:text-white flex">{{ reply.username }}
                            replied</div>
                    </div>
                    <div
                        class="p-3 text-xs italic font-normal text-black dark:text-white bg-base-200 dark:bg-gray-800  border border-gray-600">
                        {{ reply.reply }}
                    </div>
                </div>
            </li>
        </ol>
    </div>
</template>
<script setup>

let props = defineProps({
    replies: Object,
});

</script>