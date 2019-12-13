<template>
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cartModalTitle">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <table class="table table-sm table-hover table-borderless" >
		  <thead class="">
			  <tr>
				  <th class="">ID</th>
				  <th class="">name</th>
				  <th class="">price</th>
				  <th class="">quantity</th>
				  <th class="">total</th>
			  </tr>
		  </thead>
		  <tbody>
			  <tr v-for="(product, index) in products" v-bind:key="product.id">
				  <td>{{ product.id }}</td>
				  <td>{{ product.name }}</td>
				  <td>{{ product.price }}</td>
				  <td>
					  <button v-on:click="subtract(product, index)" type="button" class="btn btn-sm btn-danger">-</button>
					  <b>{{ product.quantity }}</b>
					  <button v-on:click="add(product, index)" type="button" class="btn btn-sm btn-success">+</button>
				  </td>
				  <td>
					  {{ productTotal(product) }}
				  </td>

			  </tr>
			  <tr class=" border-top">
				  <td colspan="4" >subtotal: </td>
				  <td  >{{ subtotal }}</td>
			  </tr>

		  </tbody>
	  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue shopping</button>
        <button  v-on:click="order()" id="checkout" type="button" class="btn btn-primary">Checkout</button>
      </div>
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
				products : 	[],
				example_products : 	[
					{
						id : 1,
						name : "example_product_1",
						price : 199,
						quantity : 1,
					},
					{
						id : 2,
						name : "example_product_2",
						price : 299,
						quantity : 2,
					},
				],
			};
	  	},
		watch: {
			// whenever products changes, this function will run and update it in the session via axios
			products: function (newProducts, oldProducts) {
				axios.post(APP_URL+'/session/products', {
					products: JSON.stringify(this.products)
				})
				.then(function (response) {
					console.log('updated products in the session');
				})
				.catch(function (error) {
					console.log('failed to update products in the session');
					console.log(error);
				});
			}
		},
		methods: {
			//add a new product to cart
			addToCart: function(product){
				console.log(product);

				//check wether the product id already exists in the cart
				//if so then increment quantity
				if(this.products.length >= 1) {
					for (let existing_product of this.products){
						if(existing_product.id === product.id){
							console.log('product already in cart. adding 1 more');
							existing_product.quantity++;
							product = null;
							break;
						}
					}
				}
				//push new product to cart array
				if(product){
					console.log(product);
					console.log(this.products);

					this.products.push(product)
				}
				//because increment doesn't trigger vue updates I will trigger it by sorting the array
				this.products.sort();
			},
			//add quantity of a product
			add: function(product, index, quantity = 1){
				product.quantity = product.quantity + quantity;
				Vue.set(this.products, index, product);
				console.log(this.products)
			},
			//subtract from cart
			subtract: function(product, index, quantity = 1){
				if(product.quantity === 1) {
					this.products.splice(index, 1);
				}else {
					product.quantity = product.quantity - quantity;
					Vue.set(this.products, index, product);
				}
			},
			//calculate total
			productTotal: function(product){
				return product.quantity * product.price;
			},
			order : function(){
				if(this.products.length >= 1) {
					axios
						.post(APP_URL+'/order', {
							products : JSON.stringify(this.products),
							restaurant_id : RESTAURANT_ID
						})
						.then(response => console.log(response))
						.catch(error => console.log(error));

					this.products.splice(0,this.products.length);
					$("#checkout").html("succesfully ordered");
				}

			},
			exampleProducts : function(){
				this.products.length >= 1
			}
		},
		computed: {
			//loop over all the products and quantities in the cart to calculate subtotal
			subtotal: function(){
				if(this.products.length >= 1) {
					var subtotal = 0;
					for (let product of this.products) {
					    subtotal += (product.quantity * product.price);
					};
					return subtotal;
				}
			}
		},
        mounted() {
			axios
				.get(APP_URL+'/session/products')
				.then(response => {
					if(response.data.length >= 1){
						this.products = response.data;
					} else {
						this.products = this.example_products;
					}
				});

            console.log('Cart component mounted.');
        }
    }
</script>
