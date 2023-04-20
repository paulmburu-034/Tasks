<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <div class="max-w-7xl mx-auto">
      <nav class="p-2 space-x-2">
        <RouterLink class="px-4 py-2 bg-indigo-600 hover:bg-indigo-800 rounded text-white" to="/">Home</RouterLink>
        <RouterLink class="px-4 py-2 bg-indigo-600 hover:bg-indigo-800 rounded text-white" to="/users">Users</RouterLink>
        <RouterLink class="px-4 py-2 bg-blue-600 hover:bg-blue-800 rounded text-white" to="/statuses">Statuses</RouterLink>
        <RouterLink class="px-4 py-2 bg-purple-600 hover:bg-purple-800 rounded text-white" to="/tasks">Tasks</RouterLink>
        <RouterLink class="px-4 py-2 bg-violet-600 hover:bg-violet-800 rounded text-white" to="/usertasks">User Tasks</RouterLink>
      </nav>
    </div>
  </header>
  <main class="max-w-7xl mx-auto min-h-screen">
    <RouterView />
  </main>
</template>

