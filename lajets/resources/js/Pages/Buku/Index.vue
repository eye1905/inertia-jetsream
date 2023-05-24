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
				<div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    
					<div class="flex justify-end mt-3">
						<div class="mb-3 xl:w-96">
							<div class="relative flex items-stretch w-4/5 mb-3 input-group">

								<input id="search" type='text' v-model="term" @keyup="search"
									class="outline-none focus:ring-0 rounded-r-none form-control relative min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0"
									placeholder="Search...">

								<button
									class="rounded-l-none btn px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center"
									type="button" id="button-addon2">
									<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search"
										class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
										<path fill="currentColor"
											d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
										</path>
									</svg>
								</button>
							</div>
						</div>
					</div>
                    <div v-if="$page.props.flash.success" class="text-md text-green-600 flex justify-center">
                        {{ $page.props.flash.success }}
                    </div>
                    <br>
					<table class="min-w-full divide-y divide-gray-200">
						<thead class="bg-gray-50">
							<tr>
								<th scope="col"
									class="px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-500 uppercase">
									ID
								</th>
								<th scope="col"
									class="px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-500 uppercase">
									Name
								</th>
                                <th scope="col"
									class="px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-500 uppercase">
									Descrition
								</th>
								<th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-500 uppercase">
									Created at
								</th>
								<th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-500 uppercase">
									Action
								</th>
							</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="(item, index) in books" :key="index">
                                <td class="px-6 py-4 whitespace-nowrap">
									{{ index+1 }}
								</td>
                                <td class="px-6 py-4 whitespace-nowrap">
									{{ item.name }}
								</td>
                                <td class="px-6 py-4 whitespace-nowrap">
									{{ item.description }}
								</td>
                                <td class="px-6 py-4 whitespace-nowrap">
									{{ item.created_at }}
								</td>
                                <td>
									<button @click.prevent="goEdit(`${item.id}`)" class="float-left px-4 py-2 text-green-600 duration-100 rounded hover:text-green-600">
                                        <i class="fa fa-edit"> </i>
                                    </button>

                                    <button @click.prevent="deletePost(`${item.id}`)" class="float-left px-4 py-2 text-red-600 duration-100 rounded hover:text-red-600">
                                        <i class="fa fa-times"> </i>
                                    </button>
                                </td>
                            </tr>
						</tbody>
					</table>
                    <br>
				</div>
			</div>
		</div>
	</AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
export default {
	components: {
		AppLayout
	},
	props: {
		books: Object,
        success:Object
	},
    methods:{
        deletePost(id) {
            if (confirm('Are you sure you want to delete this data ?')) {
                this.$inertia.delete(route('buku.destroy', id));
            }
        },
		goEdit(id) {
            this.$inertia.get(route('buku.edit', id));
        },
		goCreate() {
            this.$inertia.get(route('buku.create'));
        },
        search() {
			this.$inertia.replace(this.route('buku.index', { term: this.term }))
		},
    }
}
</script>