<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center py-6">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden bg-base-200 dark:bg-base-300">
            <slot />
        </div>
    </div>
</template>
