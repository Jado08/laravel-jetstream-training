<template>
    <AppLayout title="Task Management">
        <template #header>
            <PrimaryButton class="float-right" @click="createTask">
                Create task
            </PrimaryButton>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Task Management
            </h2>
        </template>
    
        <div class="flex px-4 m-10">
            <table class ="border-separate border-spacing-3 border border-slate-500">
                <thead>
                    <tr>
                        <th >ID</th>
                        <th >Description</th>
                        <th >Status</th>
                        <th >Assignee</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(task,index) in collection.tasks" :key="index">
                        <td >{{ task.id }}</td>
                        <td >{{ task.description }}</td>
                        <td >{{ task.status }}</td>
                        <td >{{ task.assignee }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </AppLayout>
</template>
<script>
 import AppLayout from "@/Layouts/AppLayout.vue";
 import PrimaryButton from '@/Components/PrimaryButton.vue';
 import { router } from '@inertiajs/vue3'

 export default{

    props: {
        collection:Object
    },

    components: {
        AppLayout,
        PrimaryButton
    },
    methods: {
        createTask() {
            this.$inertia.visit(route('tasks.create'), { method: 'get' })
        }
    }

 }
</script>