<script setup>
    import useStatuses from '../../composables/statuses';
    import { onMounted } from 'vue';

    const {statuses, getStatuses, destroyStatus} = useStatuses();

    onMounted(() => getStatuses());
</script>
<template>
    <div class="mt-12">
        <div class="flex justify-end m-2 p-2">
            <RouterLink :to="{name: 'StatusCreate'}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">New Status</RouterLink>
        </div>      
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="status in statuses" :key="status.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ status.name }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <RouterLink :to="{name: 'StatusEdit', params: {id: status.id}}" class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded">Edit</RouterLink>
                            <button @click="destroyStatus(status.id)" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>