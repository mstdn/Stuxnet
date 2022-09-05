<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import Empty from '../Components/Empty.vue';
import SimplePagination from '../Components/SimplePagination.vue';

let props = defineProps({
    links: Object,
});

const form = useForm();
function destroy(id) {
    if (confirm("Are you sure you want to delete?")) {
        form.delete(route('link.destroy', id));
    }
};
</script>
        <template>
    <AppLayout title="Links">
        <div class="hero py-10 md:py-16 dark:bg-gray-900 bg-base-200">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold">Stuxlinks</h1>
                    <p class="py-6">Links to my socials or website I host.</p>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="overflow-hidden">

                    <Empty v-if="links.meta.total === 0" class="columns-1 mt-20" />

                    <div class="max-w-lg mx-auto">
                        <div class="py-4" v-for="link in links.data" :key="link.id">
                            <a target="_blank" :href="link.link" class="btn btn-block gap-4 btn-primary btn-outline">
                                {{ link.name }}
                                <div class="badge badge-secondary">
                                    {{ link.link }}
                                </div>
                            </a>
                            <button v-if="$page.props.stux === true" @click="destroy(link.id)" class="btn-link mt-2"
                                method="post" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </button>
                        </div>
                    </div>


                    <!-- <div class="columns-1 md:columns-1 lg:columns-1">
                        <div class="overflow-x-auto">
                            <table class="table w-full">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="link in links.data" :key="link.id">
                                        <td><a class="btn-link" target="_blank" :href="link.link">{{ link.name }}</a>
                                        </td>
                                        <td><a class="" target="_blank" :href="link.link">{{ link.link }}</a></td>
                                        <td>
                                            <a class="btn btn-sm" target="_blank" :href="link.link">Go</a>
                                            <button v-if="$page.props.stux === true" @click="destroy(link.id)"
                                                class="btn btn-ghost btn-sm" method="post" type="submit">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div> -->

                    <div class="columns-1 md:columns-1 lg:columns-1 mt-6">
                        <SimplePagination v-if="links.meta.total >= 21" :data="links.links" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
        