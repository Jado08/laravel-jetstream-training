<template>
    <AppLayout title="Create Task">
        <div class="flex px-4 m-10">
            
        </div>
    <FormSection >
        <template #title>
            Profile Information
        </template>

        <template #description>
            Update your account's profile information and email address.
        </template>

        <template #form>

            <!-- Description -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="description" value="Description" />
                <TextInput
                    id="description"
                    v-model="form.description"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="description"
                />
                <InputError :message="$attrs.errors.description" class="mt-2" />
            </div>

            <!-- Status -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="status" value="Status" />
                <TextInput
                    id="status"
                    v-model="form.status"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="status"
                />
                <InputError :message="$attrs.errors.status" class="mt-2" />
            </div>

            <!-- Assignee -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="assignee" value="Assignee" />
                <TextInput
                    id="assignee"
                    v-model="form.assignee"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="assignee"
                />
                <InputError :message="$attrs.errors.assignee" class="mt-2" />
            </div>
            
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="saveTask">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
    </AppLayout>
</template>
<script>
 import AppLayout from "@/Layouts/AppLayout.vue";
 import { Link } from '@inertiajs/vue3';
 import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

 export default{
    components: {
        AppLayout,
        Link,
        ActionMessage,
        FormSection,
        InputError,
        InputLabel,
        PrimaryButton,
        SecondaryButton,
        TextInput
        
    },

    data:function() {       //diri ang variables
        return{
            form: this.$inertia.form({
                description:null,
                status:null,
                assignee:null
            }),
                
        };
    },

    methods: {
        saveTask() {
            this.$inertia.post(route('tasks.store'), this.form,{
                onSuccess:() => {
                this.form.reset();
            }
            });
        }
    }
 }
</script>