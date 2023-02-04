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
    <div class = "flex flex-col">
        <div class = "overflow-x-auto.sm:mx-6.lg:-mx-8"> 
            <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
            <table class ="min-w-full text center">
                <thead>
                    <tr class = "bg-amber-700 text-white">
                        <th >ID</th>
                        <th >Description</th>
                        <th >Status</th>
                        <th >Assignee</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class = "text-center odd: bg-white even: bg-slate-200 hover:bg-blue-500 hover:text-white" v-for="(task,index) in collection.tasks" :key="index">
                        <td >{{ task.id }}</td>
                        <td >{{ task.description }}</td>
                        <td >{{ task.status_string }}</td>
                        <td >{{ task.assignee }}</td>
                        <td>
                            <div class="flex gap-2 justify-center">
                                <SecondaryButton @click="editTask(task.id)">
                                    Edit
                                </SecondaryButton>
                                <DangerButton @click="showDeleteDialog(task.id)">
                                    Delete
                                </DangerButton>
                            </div>
                    
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
</div>
        </div>

        <!-- Delete confirmation dialog -->
        <DialogModal :show="show_delete_dialog" @close = "show_delete_dialog=false">
        <template #title>
            <h1>Delete Task</h1>
        </template>
        <template #content>
            {{ 'Are you sure you want to delete the task?' }}
        </template>
        <template #footer>
            <div class = "flex gap-2">
                <SecondaryButton class="float-right" @click="show_delete_dialog=false">
                    Cancel
                </SecondaryButton>
                <DangerButton class="float-right" @click="deleteTask">
                    Delete
                </DangerButton>
            </div>
        </template>
        </DialogModal>
    </AppLayout>
</template>
<script>
 import AppLayout from "@/Layouts/AppLayout.vue";
 import PrimaryButton from '@/Components/PrimaryButton.vue';
 import SecondaryButton from '@/Components/SecondaryButton.vue';
 import DangerButton from '@/Components/DangerButton.vue';
 import DialogModal from '@/Components/DialogModal.vue';
 import { router } from '@inertiajs/vue3'

 export default{

    props: {
        collection:Object
    },

    components: {
        AppLayout,
        PrimaryButton,
        SecondaryButton,
        DangerButton,
        DialogModal
    },

    data: function() {
        return {
            show_delete_dialog:false,
            selected_id:null
        }
    },
    methods: {
        createTask() {
            this.$inertia.visit(route('tasks.create'), { method: 'get' });
        },
        editTask(id) {
            this.$inertia.visit(route('tasks.edit', id), {method:'get'});
        },
        showDeleteDialog(id) {
            this.show_delete_dialog = true;
            this.selected_id=id;
        },
        deleteTask() {
            this.$inertia.delete(route('tasks.destroy', this.selected_id), {
                onSuccess: () => {
                    this.show_delete_dialog=false;
                }
            });
        }
    }

 }
</script>