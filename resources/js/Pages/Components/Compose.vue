<template>
    <button type="button" @click="openModal" class="btn-link gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#62b570"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 8l-5-5-5 5M12 4.2v10.3" />
        </svg>
         Project
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
                            <DialogTitle as="h3" class="text-white flex justify-between">
                                <div class="flex justify-start text-lg font-medium leading-6 mb-2 text-black dark:text-white">
                                    New project
                                </div>
                                <div class="flex justify-end text-sm text-black dark:text-white">
                                    {{ characterCount }}/500
                                </div>
                            </DialogTitle>
                            <form @submit.prevent="submit">
                                <div class="mt-2">
                                    <input v-model="form.title" type="text" placeholder="Project Title"
                                        class="input input-bordered w-full input-primary focus:border-transparent focus:ring-0 bg-base-100 text-black dark:bg-gray-900 dark:text-white" />
                                    <div v-if="form.errors.title" v-text="form.errors.title" class="text-red-500 mt-1">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label class="label" for="file_input">Upload
                                        file</label>
                                    <div class="flex justify-between">
                                        <div class="flex">
                                            <input @input="form.file = $event.target.files[0]" name="file" id="file"
                                                class="block w-full text-sm border focus:outline-none" type="file">
                                        </div>
                                        <div class="flex">
                                            <input @input="form.file2 = $event.target.files[0]" id="file2"
                                                class="block w-full text-sm border focus:outline-none" type="file">
                                        </div>
                                        <div class="flex">
                                            <input @input="form.file3 = $event.target.files[0]" name="file3" id="file3"
                                                class="block w-full text-sm border focus:outline-none" type="file">
                                        </div>
                                    </div>

                                    <progress v-if="form.progress" class="progress progress-success w-56 m-1"
                                        :value="form.progress.percentage" max="100">
                                        {{ form.progress.percentage }}%
                                    </progress>

                                    <div v-if="form.errors.file" v-text="form.errors.file" class="text-red-500 mt-1">
                                    </div>
                                    <div v-if="form.errors.file2" v-text="form.errors.file2" class="text-red-500 mt-1">
                                    </div>
                                    <div v-if="form.errors.file3" v-text="form.errors.file3" class="text-red-500 mt-1">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <resize-textarea v-model="form.description" :rows="2" :maxHeight="200"
                                        class="textarea textarea-primary w-full rounded-lg focus:border-transparent focus:ring-0 bg-base-100 text-black dark:bg-gray-900 dark:text-white"
                                        placeholder="Add a description"></resize-textarea>
                                </div>
                                <div v-if="form.errors.description" v-text="form.errors.description"
                                    class="text-red-500 mt-2"></div>
                                <div class="mt-4">
                                    <div class="flex justify-between">
                                        <select v-model="form.category" name="category" id="category"
                                            class="select select-primary w-full dark:bg-gray-900 dark:text-white">
                                            <option disabled value="">Category</option>
                                            <option v-for="category in $page.props.categories" :key="category.id"
                                                :value="category.id" selected>{{ category.name }}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <input v-model="form.subtitle" type="text" placeholder="Sub-title"
                                        class="input input-bordered w-full input-primary focus:border-transparent focus:ring-0 bg-base-100 text-black dark:bg-gray-900 dark:text-white" />
                                    <div v-if="form.errors.subtitle" v-text="form.errors.subtitle" class="text-red-500 mt-1">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <resize-textarea v-model="form.content" :rows="2" :maxHeight="200"
                                        class="textarea textarea-primary w-full rounded-lg focus:border-transparent focus:ring-0 bg-base-100 text-black dark:bg-gray-900 dark:text-white"
                                        placeholder="Tell about your project"></resize-textarea>
                                </div>
                                <div v-if="form.errors.content" v-text="form.errors.content" class="text-red-500 mt-2">
                                </div>
                                <div class="mt-2">
                                    <input v-model="form.link" type="text" placeholder="Enter a link"
                                        class="input input-bordered w-full input-primary focus:border-transparent focus:ring-0 bg-base-100 text-black dark:bg-gray-900 dark:text-white" />
                                    <div v-if="form.errors.link" v-text="form.errors.link" class="text-red-500 mt-1">
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
    return form.description.length
});

let form = useForm({
    description: "",
    title: "",
    subtitle: "",
    slug: "",
    content: "",
    link: "",
    file: "",
    file2: "",
    file3: "",
    category: "1",
});

let submit = () => {
    form.post(route('project.store'), {
        forceFormData: true,
        onSuccess: () => [
            form.reset("description", "category", "file", "title", "link", "slug", "file2", "file3", "content"),
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
