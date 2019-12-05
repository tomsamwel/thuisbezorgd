<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
				<table class="table table-sm table-hover table-striped" >
					<thead class="thead-dark">
						<tr>
							<th class="">ID</th>
							<th class="">name</th>
							<th class="">price</th>
							<th class="">quantity</th>
							<th class="">total</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="product in products" v-bind:key="product.id">
							<td>{{ product.id }}</td>
							<td>{{ product.name }}</td>
							<td>{{ product.price }}</td>
							<td>
								<button v-on:click="subtract(product)" type="button" class="btn btn-sm btn-danger">-</button>
								{{ product.quantity }}
								<button v-on:click="add(product)" type="button" class="btn btn-sm btn-success">+</button>
							</td>
							<td>
								{{ productTotal(product) }}
							</td>

						</tr>
					</tbody>
				</table>
            </div>
        </div>
    </div>
</template>

<script>
	import CartAdd from './CartAdd.vue';


    export default {
		components: {
			CartAdd
		},
		data() {
			return {
				products : JSON.parse( sessionStorage.getItem('products') )
			};
	  	},
		methods: {
			add: function(product, quantity = 1){
				product.quantity = product.quantity + quantity;
			},
			subtract: function(product, quantity = 1){
				if(product.quantity === 1) {
					
				}
				product.quantity = product.quantity - quantity;
			},
			productTotal: function(product){
				return product.quantity * product.price;
			}
		},
		computed: {
			subtotal: function(){
				this.products.forEach()
			}
		},
        mounted() {
            console.log('Cart component mounted.');
			console.log('products in session found: ' + JSON.stringify(this.products))
        }
    }
</script>
