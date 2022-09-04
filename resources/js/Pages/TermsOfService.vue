<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import JetAuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

defineProps({
    terms: String,
});
</script>

<template>
    <AppLayout title="Terms of Service">

        <div class="text-base-content">
            <div class="py-4 bg-base-300">
                <div class="min-h-screen flex flex-col items-center pt-6">

                    <div class="w-full sm:max-w-2xl mt-6 p-6 bg-base-300 overflow-hidden sm:rounded-lg prose"
                        v-html="terms" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
