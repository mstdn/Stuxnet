<template>
    <div class="min-h-screen flex flex-col sm:justify-center rounded-lg items-center py-6">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md rounded-lg overflow-hidden bg-base-300 dark:bg-gray-900">
            <slot />
        </div>
    </div>
</template>
