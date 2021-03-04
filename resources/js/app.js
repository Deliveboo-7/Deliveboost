/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

new Vue({
    el: '#app',

    data: function(){
        return {
            typologiesIds : [],
            isActive: false,
            restaurants : [],
            loading: false

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
        }
    },

    mounted() {

    }

});
