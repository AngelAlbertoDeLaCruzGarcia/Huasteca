<template>
    <v-app>
        <Head :errors="errors"/>
        <section id="hero2">
            <div class="hero-container" data-aos="fade-up">
            <h2>Huasteca</h2>
            </div>
        </section><!-- End Hero -->
       <main id="main">
            <section id="portfolio" class="portfolio">
                <div class="container">

                <div class="row portfolio-container" data-aos="fade-up">
                <div class="flex-direction: row" hover="true">
                    <v-card
                    img="https://cdn.vuetifyjs.com/images/cards/girl.jpg"
                    height="500"
                    width="600"
                    hover="true"
                    ></v-card>
                    <v-card  max-width="300" hover="true">
                        <v-card-title>{{datops.vchProd}}</v-card-title>
                        <v-divider/>
                        <v-card-text class="text--primary">
                            <div><strong>${{datops.fltPrecio}}</strong></div>

                            <div>{{datops.vchDesc}}</div>

                            <div>{{datops.vchTalla}}</div>

                        </v-card-text>

                        <v-card-actions>
                            <v-btn @click="addProd" color="success">Agregar al carrito</v-btn>
                        </v-card-actions>
                    </v-card>
                 </div>
                </div>
                </div>
            </section>
        </main>
        <Fotter/>
    </v-app>
</template>
<script>
import Fotter from '../Fotter'
import Head from '../Head'
export default {
    props:{
        datops:Array,
        errors: Object,
    },
  data() {
        return{
        carritoProds: [
            {

                nombre:'Angel',
                precio: 0,
            }
        ],
        newproductoCarrito: null,
        newproductoCarrito2: null,
        id2: 0,
        }
    },
    mounted() {
    if (localStorage.getItem('carritoProds')) {
      try {
        this.carritoProds = JSON.parse(localStorage.getItem('carritoProds'));
      } catch(e) {
        localStorage.removeItem('carritoProds');
      }
    }
  },
  methods: {
    addProd() {
      // asegurarse que el usuario efectivamente ha escrito algo
      /*if (!this.newproductoCarrito) {
        return;
      }*/
      this.carritoProds.push
      ({
            nombre:this.datops.vchProd,
            precio: this.datops.fltPrecio,
      });
      //this.datops.vchProd = '';
      this.saveProd();
      var r = confirm("Agregado correctamente\n ¿Desea ir ir al carrito?");
        if (r == true) {
         this.$inertia.get(
             '/Carrito'
         );
        } else {
        txt = "You pressed Cancel!";
        }
    },
    removeProd(x) {
      this.carritoProds.splice(x, 1);
      this.saveProd();
    },
    saveProd() {
      const parsed = JSON.stringify(this.carritoProds);
      localStorage.setItem('carritoProds', parsed);
    }
  },
   components: {
        Fotter,
        Head,
    },


}
</script>
