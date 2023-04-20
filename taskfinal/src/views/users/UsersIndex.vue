<script setup>
    import useUserTasks from '../../composables/usertasks';
    import { onMounted } from 'vue';

    const {users, getUsers, destroyTask} = useUserTasks();

    onMounted(() => getUsers());
</script>
<template>
    <div class="mt-12">
        <div class="flex justify-end m-2 p-2">
            <RouterLink :to="{name: 'UserTaskCreate'}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">Map Task</RouterLink>
        </div>      
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Task</th>
                        <th scope="col" class="px-6 py-3">Remarks</th>
                        <th scope="col" class="px-6 py-3">Start Date</th>
                        <th scope="col" class="px-6 py-3">End Date</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ user.name }}</td>
                        <td class="px-6 py-4">{{ user.start_date }}</td>
                        <td class="px-6 py-4">{{ user.end_date }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <RouterLink :to="{name: 'UserTaskEdit', params: {id: user.id}}" class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded">Edit</RouterLink>
                            <button @click="destroyUserTask(user.id)" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>