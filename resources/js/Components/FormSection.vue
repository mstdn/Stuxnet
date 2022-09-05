<script setup>
import { computed, useSlots } from 'vue';
import JetSectionTitle from './SectionTitle.vue';

defineEmits(['submitted']);

const hasActions = computed(() => !! useSlots().actions);
</script>

<template>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <JetSectionTitle>
            <template #title>
                <slot name="title" />
            </template>
            <template #description>
                <slot name="description" />
            </template>
        </JetSectionTitle>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="$emit('submitted')">
                <div
                    class="px-4 py-5 bg-base-200 sm:p-6 rounded-t-lg dark:bg-gray-900 dark:text-white"
                    :class="hasActions ? '' : ''"
                >
                    <div class="grid grid-cols-6 gap-6 rounded-t-lg dark:bg-gray-900 dark:text-white">
                        <slot name="form" />
                    </div>
                </div>

                <div v-if="hasActions" class="flex items-center justify-end px-4 py-3 bg-base-300 text-base-content text-right sm:px-6 rounded-b-lg dark:bg-gray-900 dark:text-white">
                    <slot name="actions" />
                </div>
            </form>
        </div>
    </div>
</template>
