<script setup>
    import { useForm } from '@inertiajs/inertia-vue3';
    import Empty from '../Components/Empty.vue';
    import SimplePagination from '../Components/SimplePagination.vue';
    
    let props = defineProps({
        replies: Object,
    });
    
    const form = useForm();
    function destroy(id) {
        if (confirm("Are you sure you want to delete?")) {
            form.delete(route('admin.reply.destroy', id));
        }
    };
    </script>
            <template>
        <AppLayout title="Admin - Users">
            <!-- <template #header>
                    <h1
                        class="text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
                        Browse <mark class="px-2 text-white bg-yellow-400 ">projects</mark>
                    </h1>
                </template> -->
    
            <!-- <div class="hero py-10 md:py-16 dark:bg-base-300 bg-base-200">
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        <h1 class="text-5xl font-bold">Stuxlinks</h1>
                        <p class="py-6">Links to my socials or website I host.</p>
                    </div>
                </div>
            </div> -->
    
            <div class="py-12">
                <div class="max-w-7xl mx-auto px-4 lg:px-8">
                    <div class="overflow-hidden">
    
                        <!-- <Empty v-if="links.meta.total === 0" class="columns-1 mt-20" /> -->
    
                        <div class="columns-1 md:columns-1 lg:columns-1">
                            <div class="overflow-x-auto">
                                <table class="table w-full">
                                    <!-- head -->
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Reply</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- row 1 -->
                                        <tr v-for="reply in replies" :key="reply.id">
                                            <td>{{ reply.user.username }}</td>
                                            <td>{{ reply.reply }}</td>
                                            <td>{{ reply.created_at }}</td>
                                            <td>
                                                <button @click="destroy(reply.id)"
                                                    class="btn btn-ghost btn-sm" method="post" type="submit">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
    
                                    </tbody>
                                </table>
                            </div>
    
                            <!-- <PostCard class="mb-4" v-for="post in posts.data" :key="post.id" :post="post" /> -->
                        </div>
    
                        <!-- <div class="columns-1 md:columns-1 lg:columns-1 mt-6">
                            <SimplePagination v-if="users.meta.total >= 21" :data="users.links" />
                        </div> -->
                    </div>
                </div>
            </div>
        </AppLayout>
    </template>
            