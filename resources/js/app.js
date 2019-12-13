/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/autocomplete.js';



var products = [
	{
		id : 1,
		name : "product_1",
		price : 199,
		quantity : 1,
	},
	{
		id : 2,
		name : "product_2",
		price : 299,
		quantity : 2,
	},
	{
		id : 3,
		name : "product_3",
		price : 599,
		quantity : 3,
	},
	{
		id : 4,
		name : "product_4",
		price : 120,
		quantity : 4,
	}
];

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// Vue.component('CartTable', require('./components/CartTable.vue').default);
// Vue.component('CartRow', require('./components/CartRow.vue').default);
// Vue.component('CartAdd', require('./components/CartAdd.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
	data : {

	},
});


$(document).ready(function() {

	//autocomplete search ajax
	$( "#search" ).autocomplete({
		source: function(request, response) {
			$.ajax({
			url: "http://localhost/thuisbezorgd/public/autocomplete",
			data: {
					term : request.term
			 },
			dataType: "json",
			success: function(data){
			   var resp = $.map(data,function(obj){
					//console.log(obj.city_name);
					return {label: obj.name, value: obj.id};
			   });
			   response(resp);
		   },
		});
		},
		minLength: 1,
		select: function( event, ui ) {
			window.location.href = "http://localhost/thuisbezorgd/public/restaurants/" + ui.item.value;
			return false;
		},
	});

	//tiny script to prompt deletes
	$(".delete").on("submit", function(){
		return confirm("Do you want to delete this item?");
	});
});
