

<template>
    <AppLayout title="Pegawai">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Pegawai
                </h2>
                
                <button type="button" @click.prevent="goCreate()" class="px-4 py-2 mr-3 text-sm text-green-600 transition border border-green-300 rounded-full hover:bg-green-600 hover:text-white hover:border-transparent">
                    <i class="fa fa-plus"> </i> Create Pegawai
                </button>
            </div>
        </template>
        
        <div class="py-12">

			<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
				<div class="overflow-hidden bg-white shadow-xl sm:rounded-lg" style="padding:15px">
                    <table class="min-w-full divide-y divide-gray-200" >
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-500">No</th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-500">Nama Pegawai</th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-500">Jenis Kelamin</th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-500">Alamat</th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-500">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in pegawai" :key="index"> 
                                <td>{{ index+1}}</td>
                                <td>{{ item.name }}</td>
                                <td>{{ item.gender }}</td>
                                <td>{{ item.phone}}</td>
                                <td>{{ item.address}}</td>
                                <td>
                                    <button @click.prevent="goEdit(`${item.id}`)" class="float-left px-4 py-2 text-green-600 duration-100 rounded hover:text-green-600">
                                        <i class="fa fa-edit"> </i>
                                    </button>

                                    <button @click.prevent="goDelete(`${item.id}`)" class="float-left px-4 py-2 text-red-600 duration-100 rounded hover:text-red-600">
                                        <i class="fa fa-times"> </i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue';
export default{
    components:{
        AppLayout,
    },
    props:{
        pegawai:Object,
    },
    methods: {
        goCreate(){
            this.$inertia.get(route('pegawai.create'));
        },
        goEdit(id){
            this.$inertia.get(route('pegawai.edit', id));
        },
        goDelete(id){
            if (confirm('Are you sure you want to delete this data ?')) {
                this.$inertia.delete(route('pegawai.destroy', id));
            }
        },
        goSearch(){
            this.$inertia.replace(this.route('pegawai.index', { term: this.term }))
        }
    },
}
</script>