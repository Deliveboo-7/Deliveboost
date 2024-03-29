/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { forEach } = require('lodash');

require('./bootstrap');

window.Vue = require('vue');

new Vue({
    el: '#app',

    data: function(){
        return {
            typologiesIds : [],
            isActive: false,
            restaurants : [],
            loading: false,
            dishes : [],
            cart:[],
            totalItems:0,
            finalPrice:0,
            checkout:[],
            restaurantID : null,
            selectedRestaurant : 0,
            selectedDishes: [],
            sendMailRestaurant : null,

            hostedFieldInstance: false,
            nonce: "",
            error: "",
            typologySelected : 'typologySelected',
            customerName: '',
            address: '',
            phone: ''

        }
    },

    methods: {

        getData(id) {

            // Se l'array degli id delle tipologie contiene già l'id
            // lo rimuovo perchè vuol dire che è già stato cliccato
            if (this.typologiesIds.includes(id)) {
                let index = this.typologiesIds.indexOf(id)
                this.typologiesIds.splice(index, 1)
                console.log("Rimosso elemento ", id);

            } else {
                // altrimenti lo pusho
                this.typologiesIds.push(id)
            }

            // Creo l'url al quale farò la chiamata api
            // basandomi su ogni id che l'utente ha cliccato
            // ES: api/typology?0=2&1=3&2=4
            // l'utente ha cliccato le tipologie con id 2,3,4
            let params = this.typologiesIds;
            this.loading = true;
            axios.get('/api/typology',
                {
                    params
                })
                .then(res => {
                    this.restaurants = res.data;
                    console.log(this.restaurants);
                    this.loading = false;
            })
        },
        getRestaurantMenu(id) {

            return `menu/restaurant/${id}`
        },

        selectRestaurant(id) {

            localStorage.setItem('selectedRestaurant', id);
        },

        deleteFilter() {
            this.restaurants = [];
            this.typologiesIds = [];
        },

        addDish(dish){

            if (!this.cart.includes(dish)) {

                dish.quantity = 1;
                this.cart.push(dish);
                this.totalItems++;


                this.selectedDishes.push(dish.id);
                // const parsed = JSON.stringify(this.selectedDishes);
                localStorage.setItem('selectedDishes', this.selectedDishes);

            }else{

                dish.quantity++;
                this.totalItems++
            }

            this.finalPrice += dish.price;
            localStorage.setItem('finalPrice',this.finalPrice);
        },


        saveCart() {
            this.sendMailRestaurant = this.selectedRestaurant;
            localStorage.setItem('sendMailRestaurant', this.sendMailRestaurant);

            const parsed = JSON.stringify(this.cart);
            localStorage.setItem('checkout', parsed);
            this.cart = [];
            this.finalPrice = 0;
            this.restaurantID = null;
        },

        addQty(dish){

            dish.quantity++;
            this.finalPrice += dish.price;
            localStorage.setItem('finalPrice',this.finalPrice);

        },

        removeQty(dish){

            if (dish.quantity > 0 ) {

                dish.quantity--;
                this.finalPrice -= dish.price;
            }

            localStorage.setItem('finalPrice',this.finalPrice);

        },

        //CART

        // //CHECKOUT
        payWithCreditCard() {

            if (this.checkout.length > 0) {

                if(this.hostedFieldInstance
                    && this.customerName != ''
                    && this.address != ''
                    && this.phone != '')
                {
                    this.hostedFieldInstance.tokenize()
                        .then(payload => {

                            this.nonce = payload.nonce;
                            document.querySelector('#nonce').value = payload.nonce;
                            var form = document.querySelector('#payment-form');
                            form.submit();

                            // svuotamento array checkout
                            localStorage.removeItem('checkout');
                            localStorage.removeItem('selectedRestaurant');
                            this.restaurantID = null;

                        })
                        .catch(err => {
                            console.error('errore',err);
                            if(err.code =="HOSTED_FIELDS_FIELDS_INVALID"){
                                err.message = 'Card details are invalid.';
                                this.error = err.message;
                            }

                        if(err.code =="HOSTED_FIELDS_FIELDS_EMPTY"){
                            err.message = 'The fields are empty. Please enter your payment information. ';
                            this.error = err.message;
                        }

                    })
                }

            } else {
                this.error = "Your cart is empty";
            }
        }
    },

    mounted: function () {


        if (localStorage.getItem('checkout') && localStorage.getItem('finalPrice')) {

            this.finalPrice = parseInt(localStorage.getItem('finalPrice'));
            this.checkout = JSON.parse(localStorage.getItem('checkout'));
            localStorage.removeItem('checkout');
            localStorage.removeItem('finalPrice');
        }

        // this.restaurantID = localStorage.getItem('selectedRestaurant');
        this.restaurantID = parseInt(window.location.href.split('/').pop());
        this.selectedRestaurant = localStorage.getItem('selectedRestaurant');
        this.sendMailRestaurant = localStorage.getItem('sendMailRestaurant');

        if (parseInt(this.selectedRestaurant) !== parseInt(window.location.href.split('/').pop())) {

            this.selectedRestaurant = parseInt(window.location.href.split('/').pop());
            localStorage.setItem('selectedRestaurant', this.selectedRestaurant);
        }

        // localStorage.setItem('selectedRestaurant',this.selectedRestaurant);

        // localStorage.setItem('selectedRestaurant', this.restaurantID);
        // console.log(this.restaurantID);

        if (!isNaN(this.restaurantID)) {

            axios.get('/api/dishes', {params: this.restaurantID})
                .then(res => {
                    console.log(res.data)
                    res.data.sort(function(a, b){
                        let nameA = a.name.toLowerCase(), nameB = b.name.toLowerCase()
                        if (nameA < nameB) //sort string ascending
                            return -1
                        if (nameA > nameB)
                            return 1
                        return 0 //default return value (no sorting)
                    })
                    this.dishes = res.data;
                })
        }

        if (localStorage.getItem('selectedDishes')) {

            this.selectedDishes = localStorage.getItem('selectedDishes');
            localStorage.removeItem('selectedDishes');

        }

        // http://localhost:8000/menu/restaurant/1
        // this.restaurantID = parseInt(window.location.href.slice(38);


        braintree.client.create({
            //We’ll need an authorization key to use the Braintree SDK
            authorization: ''
        })
            .then(clientInstance => {

                let options = {
                    client: clientInstance,
                    styles: {
                        input: {
                            'font-size': '14px',
                            'font-family': 'Open Sans'
                        }
                    },
                    fields: {
                        number: {
                            selector: '#creditCardNumber',
                            placeholder: 'Enter Credit Card'
                        },
                        cvv: {
                            selector: '#cvv',
                            placeholder: 'Enter CVV'
                        },
                        expirationDate: {
                            selector: '#expireDate',
                            placeholder: '00 / 0000'
                        }
                    }
                }

                return braintree.hostedFields.create(options)
            })
            .then(hostedFieldInstance => {
                // @TODO - Use hostedFieldInstance to send data to Braintree
                this.hostedFieldInstance = hostedFieldInstance;
                // console.log(hostedFieldInstance);
            })
            .catch(err => {
                console.log(err);
            });
    },
});



