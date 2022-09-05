<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import Empty from '../Components/Empty.vue';
import SimplePagination from '../Components/SimplePagination.vue';
import PhotoCard from '../Components/PhotoCard.vue';

let props = defineProps({
    photos: Object,
});

const form = useForm();
function destroy(id) {
    if (confirm("Are you sure you want to delete?")) {
        form.delete(route('photo.destroy', id));
    }
};
</script>
<template>
    <AppLayout title="Photos">

        <div class="hero py-10 md:py-16 dark:bg-gray-900 bg-base-200">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold">Stuxphotos</h1>
                    <p class="py-6">Enjoy my photography.</p>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="overflow-hidden">

                    <Empty v-if="photos.meta.total === 0" class="columns-1 mt-20" />

                    <div class="columns-1 md:columns-3 lg:columns-4">
                        <PhotoCard class="mb-4" v-for="post in photos.data" :key="post.id" :post="post" />
                    </div>

                    <div class="columns-1 md:columns-1 lg:columns-1 mt-6">
                        <SimplePagination v-if="photos.meta.total >= 21" :data="photos.links" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
        