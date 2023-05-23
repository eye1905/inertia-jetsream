

<template>
    <AppLayout title="Pegawai">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Pegawai
                </h2>
                
                <a :href="`pegawai/create`" class="px-4 py-2 mr-3 text-sm text-green-600 transition border border-green-300 rounded-full hover:bg-green-600 hover:text-white hover:border-transparent">
                    <i class="fa fa-plus"> </i> Create Pegawai
                </a>
            </div>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-white-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
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
                                    <a :href="`/pegawai/${item.id}/pegawai`" class="btn text-green-400">
                                        <i class="fa fa-edit"></i>
                                    </a>
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
        
    },
}
</script>