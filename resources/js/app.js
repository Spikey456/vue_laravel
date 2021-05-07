/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
import axios from 'axios';

 require('./bootstrap');

 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
 //Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 Vue.component('modal', {
     template: '#modal-template'
   })
 
 const app = new Vue({
     el: '#app',
     data: {
         newItem: {'prod_name': '', 'price': 0, 'qty': 0, 'total_price': 0},
         hasError: true,
         items: [],
         total_amount: 0,
         e_id: '',
         e_prod_name: '',
         e_price: 0,
         e_qty: 0,
         e_total_price: 0,
     },
     mounted: function mounted(){
         this.getItems();
     },
     methods: {
         computeTotal: function computeTotal(){
            var _this = this;
            let total = 0;
            for (var i = 0; i < _this.items.length; i++) {
               total += _this.items[i].total_price;
             }
            console.log(total)

            _this.total_amount = total
         },
         getItems: function getItems(){
             var _this = this;
             axios.get('/getItems').then(function(response){
                 _this.items = response.data;
                 _this.total_amount = 0;
             }).catch(error=>{
                 console.log("Get All: "+error);
             });
         },
         createItem: function createItem() {
             var input = this.newItem;
             console.log('CLICKED')
             var _this = this;
             if(input['prod_name'] == '' || input['price'] == 0 || input['qty'] == 0) {
                 this.hasError = false;
             }
             else {
                 this.hasError= true;
                 input['total_price'] = input['price'] * input['qty'] 
                 console.log(input)
                 axios.post('/storeItem', input).then(function(response){
                     _this.newItem = {'prod_name': '', 'price': 0, 'qty': 0}
                     _this.getItems();
                 }).catch(error=>{
                     console.log("Insert: "+error);
                 });
             }
         },
         deleteItem: function deleteItem(item) {
             var _this = this;
             axios.post('/deleteItem/' + item.id).then(function(response){
                 _this.getItems();
             }).catch(error=>{
                 console.log("Delete item: "+error);
             });
         },
         setVal(val_id, val_prod_name, val_price, val_qty) {
             this.e_id = val_id;
             this.e_prod_name = val_prod_name;
             this.e_price = val_price;
             this.e_qty = val_qty;
         },
         editItem: function(){
             var _this = this;
             var id_val_1 = document.getElementById('e_id');
             var prod_name_val_1 = document.getElementById('e_prod_name');
             var price_val_1 = document.getElementById('e_price');
             var qty_val_1 = document.getElementById('e_qty');
             var total_price_val_1 = price_val_1.value * qty_val_1.value;
             var model = document.getElementById('myModal').value;
              axios.post('/editItem/' + id_val_1.value, {val_1: prod_name_val_1.value, val_2: price_val_1.value, val_3: qty_val_1.value, val_4: total_price_val_1})
                .then(response => {
                  _this.getItems();
                });
      },
     }
 });