<template>
    <button type="button" @click="openModal" class="btn-link gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#62b570"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
        </svg>
         Link
    </button>

    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
                leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div class="flex min-h-full items-center justify-center p-4 text-center">
                    <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95">
                        <DialogPanel
                            class="w-full max-w-md transform overflow-hidden rounded-lg bg-base-100 text-black dark:bg-gray-900 dark:text-white p-6 text-left align-middle shadow-xl transition-all">
                            <DialogTitle as="h3" class="text-gray-900 flex justify-between">
                                <div
                                    class="flex justify-start text-lg font-medium leading-6 mb-2 text-black dark:text-white">
                                    Add a link
                                </div>
                                <div class="flex justify-end text-sm text-black dark:text-white">
                                    {{ characterCount }}/80
                                </div>
                            </DialogTitle>
                            <form @submit.prevent="submit">

                                <div class="mt-4">
                                    <input type="text" name="name" id="name" v-model="form.name"
                                        class="input input-primary w-full focus:border-transparent focus:ring-0 bg-base-100 text-black dark:bg-gray-900 dark:text-white"
                                        placeholder="Name" />
                                </div>
                                <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 mt-2"></div>

                                <div class="mt-4">
                                    <input type="text" name="link" id="link" v-model="form.link"
                                        class="input input-primary w-full focus:border-transparent focus:ring-0 bg-base-100 text-black dark:bg-gray-900 dark:text-white"
                                        placeholder="URL" />
                                </div>
                                <div v-if="form.errors.link" v-text="form.errors.link" class="text-red-500 mt-2"></div>


                                <div class="mt-4">
                                    <div class="flex justify-between">
                                        <div class="flex justify-start">
                                            <button type="button" class="btn btn-error" @click="closeModal">
                                                Close
                                            </button>
                                        </div>
                                        <div class="flex justify-end">
                                            <button class="btn btn-success" type="submit" :disabled="form.processing">
                                                Create
                                            </button>

                                        </div>
                                    </div>

                                </div>

                            </form>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import { ref } from 'vue'
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from '@headlessui/vue'
import { useForm } from "@inertiajs/inertia-vue3";
import { computed } from 'vue';

const characterCount = computed(() => {
    return form.name.length
});

let form = useForm({
    link: "",
    name: "",
});

let submit = () => {
    form.post(route('link.store'), {
        forceFormData: true,
        onSuccess: () => [
            form.reset("link", "name"),
            isOpen.value = false
        ],
    });
};

const isOpen = ref(false);

function closeModal() {
    isOpen.value = false
}
function openModal() {
    isOpen.value = true
}
</script>
