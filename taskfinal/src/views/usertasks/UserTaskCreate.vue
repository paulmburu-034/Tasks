<script setup>
    import { reactive } from 'vue';
    import { onMounted } from 'vue';

    import useTasks from '../../composables/tasks';
    import useUserTasks from '../../composables/usertasks';

    const { tasks, getTasks} = useTasks();
    const { users, getUsers, storeUserTask, errors} = useUserTasks();

    const form = reactive({
        user_id: "",
        task_id: "",
        remarks:"",
        start_time:"",
        end_time:"",
        status_id:1
    });

    onMounted(() => {
    getTasks();
    getUsers();
    });
</script>
<template>
    <div class="mt-12">
        <form class="max-w-md mx-auto p-4 bg-white shadow-md rounded-md" @submit.prevent="storeUserTask(form)">
            <div class="space-y-6">
                <div class="mb-6">
                    <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                    <select id="user_id" v-model="form.user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option diasabled selected>Choose a User</option>
                      <option v-for='user in users' :value='user.id'>{{ user.name }}</option>
                    </select>
                    <div v-if="errors.user_id">
                        <span class="text-sm text-red-400">{{ errors.user_id[0] }}</span>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="task_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task</label>
                    <select id="task_id" v-model="form.task_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option diasabled selected>Choose a Task</option>
                      <option v-for='task in tasks' :value='task.id'>{{ task.name }}</option>
                    </select>
                    <div v-if="errors.task_id">
                        <span class="text-sm text-red-400">{{ errors.task_id[0] }}</span>
                    </div>
                </div>
                <div class="mb-6">                    
                    <label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="remarks" v-model="form.remarks" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write assignment remarks here..."></textarea>
                    <div v-if="errors.remarks">
                        <span class="text-sm text-red-400">{{ errors.remarks[0] }}</span>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date</label>
                    <input type="date" id="start_time" v-model="form.start_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <div v-if="errors.start_time">
                        <span class="text-sm text-red-400">{{ errors.start_time[0] }}</span>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date</label>
                    <input type="date" id="end_time" v-model="form.end_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <div v-if="errors.end_time">
                        <span class="text-sm text-red-400">{{ errors.end_time[0] }}</span>
                    </div>
                    <input type="hidden" id="status_id" v-model="form.status_id">
                </div>
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">Store</button>
                </div>
            </div>
        </form>
    </div>
</template>