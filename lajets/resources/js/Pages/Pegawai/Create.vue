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
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="w-full max-w-lg m-auto">
                    
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
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="books">
                            Gender <span class="text-red-500">*</span>
                        </label>

                        <select v-model="form.gender" id="gender" class="w-full px-3 py-2 mb-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
							<option v-for="(item, index) in kelamin" :key="index" v-bind:value="index" >{{ item }}</option>
						</select>

                        <span class="text-red-500">{{ errors.gender }}</span>
                    </div>

					<div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="books">
                            Telepon <span class="text-red-500">*</span>
                        </label>

                        <input v-model="form.phone"
                        class="w-full px-3 py-2 mb-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        id="phone" name="phone" type="number" step="any">

                        <span class="text-red-500">{{ errors.phone }}</span>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                            Alamat <span class="text-red-500">*</span>
                        </label>
                        
                        <textarea v-model="form.address"
                        class="w-full px-3 py-2 mb-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        id="address" type="text" style="height: 100px;"></textarea>
                        <span class="text-red-500">{{ errors.address }}</span>
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
		pegawai: Object,
		errors:Object,
		kelamin:Object,
	},
	data() {
        return {
            form: this.$inertia.form({
                name: this.pegawai.name,
                address: this.pegawai.address,
				phone: this.pegawai.phone,
				gender: this.pegawai.gender
            })
        }
    },
	methods: {
        submit() {
            if(route().current('pegawai.create')){
                this.form.post(this.route('pegawai.store'), {
                    _token: this.$page.props.csrf_token,
                });
            }else{
                this.form.put(this.route('pegawai.update', this.pegawai.id), {
                    _token: this.$page.props.csrf_token,
                });
            }
        }
    }
}
</script>