<template>
    <div>
        <div class="filter hover:brightness-[80%]">
            <img @click="openModal" class="h-full w-full rounded-lg" :src="post.photo" />
        </div>
        <TransitionRoot appear :show="isOpen" as="template">
            <Dialog as="div" @close="closeModal" class="relative z-60">
                <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0"
                    enter-to="opacity-100" leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                    <div class="fixed inset-0 bg-black bg-opacity-25" />
                </TransitionChild>

                <div class="fixed inset-0 overflow-y-auto z-50">
                    <div class="flex min-h-full items-center justify-center p-4 text-center">
                        <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
                            enter-to="opacity-100 scale-100" leave="duration-200 ease-in"
                            leave-from="opacity-100 scale-100" leave-to="opacity-0 scale-95">
                            <DialogPanel
                                class="w-full z-60 lg:max-w-[50%] max-w-[95%] md:max-w-[65%] lg:max-h-[45%] sm:max-h-[60%] transform overflow-hidden bg-white p-4 text-left align-middle shadow-xl transition-all rounded-lg">
                                <DialogTitle as="h3"
                                    class="flex justify-between text-sm font-medium leading-6 text-gray-900">
                                    <div class="flex justify-start">
                                        <img class="inline-block h-9 w-9 mask mask-hexagon" :src="post.user.avatar"
                                            alt="" />
                                        <InertiaLink class="ml-2 mt-1"
                                            :href="route('user-profile', { id: post.user.username })">
                                            @{{ post.user.username }}
                                        </InertiaLink>
                                        <div class="m-1">???
                                            <InertiaLink :href="route('photo.show', { id: post.id })">
                                                {{ post.time }}
                                            </InertiaLink>
                                        </div>
                                    </div>

                                    <div class="flex justify-end">
                                        <button type="button" class="btn btn-primary btn-sm" @click="closeModal">
                                            Close
                                        </button>
                                    </div>
                                </DialogTitle>
                                <div class="mt-2">
                                    <InertiaLink :href="route('photo.show', { id: post.id })">
                                        <img class="object-fill h-full w-full rounded-lg" :src="post.photo" alt="" />
                                    </InertiaLink>
                                </div>
                                <div class="mt-4">
                                    <h2 class="text-gray-900 text-center p-6 text-xl">{{ post.name }}</h2>
                                </div>
                                <div class="mt-2 flex justify-end">
                                    <InertiaLink class="btn btn-primary btn-sm" :href="route('photo.show', { id: post.id })">
                                        See photo
                                    </InertiaLink>
                                    <button v-if="$page.props.stux === true" @click="destroy(post.id)"
                                        class="btn btn-error btn-sm" method="post" type="submit">
                                        Delete
                                    </button>
                                </div>

                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from '@headlessui/vue';

let props = defineProps({
    post: Object,
});

const form = useForm();
function destroy(id) {
    if (confirm("Are you sure you want to delete?")) {
        form.delete(route('photo.destroy', id));
    }
};

const isOpen = ref(false)

function closeModal() {
    isOpen.value = false
}
function openModal() {
    isOpen.value = true
}
</script>
