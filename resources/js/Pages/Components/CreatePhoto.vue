<template>
    <button type="button" @click="openModal" class="btn-link gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="#62b570" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="18" height="18" rx="2" />
            <circle cx="8.5" cy="8.5" r="1.5" />
            <path d="M20.4 14.5L16 10 4 20" />
        </svg>
        Photo
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
                                <div class="flex justify-start text-lg font-medium leading-6 mb-2 text-black dark:text-white">
                                    New photo
                                </div>
                                <div class="flex justify-end text-sm text-black dark:text-white">
                                    {{ characterCount }}/80
                                </div>
                            </DialogTitle>
                            <form @submit.prevent="submit">
                                <div class="mt-2">
                                    <input v-model="form.name" type="text" placeholder="Photo Title"
                                        class="input input-primary w-full focus:border-transparent focus:ring-0 bg-base-100 text-black dark:bg-gray-900 dark:text-white" />
                                    <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 mt-1">
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <label class="label" for="file_input">
                                        Upload photo
                                    </label>

                                    <input @input="form.photo = $event.target.files[0]" name="photo" id="photo"
                                        class="block w-full text-sm border focus:outline-none" type="file">

                                    <progress v-if="form.progress" class="progress progress-success w-56 m-1"
                                        :value="form.progress.percentage" max="100">
                                        {{ form.progress.percentage }}%
                                    </progress>

                                    <div v-if="form.errors.photo" v-text="form.errors.photo" class="text-red-500 mt-1">
                                    </div>

                                </div>

                                <div class="mt-4">
                                    <div class="flex justify-between">
                                        <select v-model="form.category" name="category" id="category"
                                            class="select select-primary w-full bg-base-100 text-black dark:bg-gray-900 dark:text-white">
                                            <option disabled value="">Category</option>
                                            <option v-for="category in $page.props.categories" :key="category.id"
                                                :value="category.id" selected>{{ category.name }}</option>
                                        </select>
                                    </div>
                                </div>

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

let props = defineProps({
    categories: Object,
});

const characterCount = computed(() => {
    return form.name.length
});

let form = useForm({
    photo: "",
    name: "",
    category: "1",
});

let submit = () => {
    form.post(route('photo.store'), {
        forceFormData: true,
        onSuccess: () => [
            form.reset("photo", "category", "name",),
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
