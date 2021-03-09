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

            hostedFieldInstance: false,
            nonce: "",
            error: "",
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
            // location.href = '/restaurant/menu/' + id;
            return `menu/restaurant/${id}`
        },

        deleteFilter() {
            this.restaurants = [];
            this.typologiesIds = [];
        },

        //CART

        // //CHECKOUT
        payWithCreditCard() {
            if(this.hostedFieldInstance)
            {
              this.hostedFieldInstance.tokenize()
              .then(payload => {
                  console.log(payload);
                  this.nonce = payload.nonce;
                  document.querySelector('#nonce').value = payload.nonce;
                  var form = document.querySelector('#payment-form');
                  form.submit();
                //   form.reset();
              })
              .catch(err => {
                console.error(err);
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
        }

    },

    mounted() {

        
        braintree.client.create( {
            //We’ll need an authorization key to use the Braintree SDK
            authorization: 'sandbox_rz45x897_q45722tz9wpy5sm5'
        })
        .then(clientInstance => {
            console.log('clientInst',clientInstance);
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
            console.log(hostedFieldInstance);
        })
        .catch(err => {
            console.log(err);
        });
     },

});



