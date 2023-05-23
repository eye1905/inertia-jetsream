<template>
    <AppLayout title="Create Buku">
        
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create Buku
            </h2>
        </template>
        
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="w-full max-w-xs m-auto">
                    
                    <form @submit.prevent="submit" class="px-8 pt-6 pb-8 m-auto mb-4 bg-white rounded shadow-md"
                    enctype="multipart/form-data">
                    
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input v-model="form.name"
                        class="w-full px-3 py-2 mb-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        id="name" type="text">
                        <span class="text-red-500">{{ errors.name }}</span>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                            Description <span class="text-red-500">*</span>
                        </label>
                        
                        <textarea v-model="form.description"
                        class="w-full px-3 py-2 mb-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        id="description" type="text" style="height: 100px;"></textarea>
                        <span class="text-red-500">{{ errors.description }}</span>
                    </div>
                    
                    <div class="flex justify-end">
                        <Button :form="form"></Button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from '@/Components/Button.vue';

export default {
    components: {
        AppLayout,
        Button,
    },
    props: {
        errors: Object,
        books:Object
    },
    data() {
        return {
            form: this.$inertia.form({
                name: this.books.name,
                description: this.books.description
            })
        }
    },
    methods: {
        submit() {
            if(route().current('buku.create')){
                this.form.post(this.route('buku.store'), {
                    _token: this.$page.props.csrf_token,
                });
            }else{
                this.form.put(this.route('buku.update', this.books.id), {
                    _token: this.$page.props.csrf_token,
                });
            }
        }
    }
}
</script>