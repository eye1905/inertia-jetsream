<template>
	<AppLayout title="Buku">

		<template #header>
            
			<h2 class="flex justify-between text-xl font-semibold leading-tight text-gray-800">
				<p>
					Buku
					<i class="fa-solid fa-book"></i>
				</p>
				
				<button @click.prevent="goCreate()" class="px-4 py-2 mr-3 text-sm text-green-600 transition border border-green-300 rounded-full hover:bg-green-600 hover:text-white hover:border-transparent" type="button">
					<i class="fa fa-plus"> </i> Create Buku
				</button>
			</h2>
		</template>
		
		<div class="py-12">
            
		</div>
	</AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
export default {
	components: {
		AppLayout
	},
	props: {
		pegawai: Object
	},
    methods:{
       
    }
}
</script>