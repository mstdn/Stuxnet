<template>
    <div>
        <form @submit.prevent="submit">
            <label for="reply" class="mb-2 text-sm font-medium text-white sr-only">Your
                Reply</label>
            <div class="relative">
                <input type="text" v-model="form.reply" id="reply"
                    class="input p-4 w-full text-sm dark:text-white bg-base-300 border-gray-900 text-black dark:bg-gray-900"
                    placeholder="Type your reply">
                <button type="submit" :disabled="form.processing" class="absolute right-2.5 bottom-2.5 px-4 py-2 btn btn-sm">Reply</button>
            </div>
        </form>
    </div>
</template>
<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { computed } from 'vue';

let props = defineProps({
    post: Object,
});


const characterCount = computed(() => {
    return form.reply.length
})

let form = useForm({
    reply: "",
});

let submit = () => {
    form.post(route('blog.reply', { id: props.post.data.id }), {
        forceFormData: true,
        preserveScroll: true,
        onSuccess: () => form.reset("reply"),
    });
};

function destroy(id) {
    if (confirm("Are you sure you want to delete?")) {
        form.delete(route('reply.post.destroy', id));
    }
}
</script>
