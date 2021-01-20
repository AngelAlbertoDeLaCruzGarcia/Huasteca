<template>
<v-app>
        <Head :errors="errors"/>
        <!-- ======= Hero Section ======= -->
         <section id="hero2">
            <div class="hero-container" data-aos="fade-up">
            <h2>Huasteca</h2>
            </div>
        </section><!-- End Hero -->


        <main id="main">
            <!-- ======= Portfolio Section ======= -->
            <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                    <h2>Productos</h2>
                    <p>La mejor calidad de la region huasteca de Mexico</p>
                </div>


                <div class="row portfolio-container" data-aos="fade-up">
                    <div v-for="prod in prods" :key="prod.intIDProd" class="portfolio-item" >
                        <inertia-link :href="`/Inicio/${prod.intIDProd}`">
                            <v-card class="mx-auto" max-width="350" hover="true">
                                <v-img class="white--text align-end" height="200px"
                                :src="`${prod.vchImg}`">
                                </v-img>
                                <v-card-title>{{prod.vchProd}}</v-card-title>

                                <v-card-subtitle class="pb-0">
                                Number 10
                                </v-card-subtitle>

                                <v-card-text class="text--primary">
                                <div><strong>${{prod.fltPrecio}}</strong></div>

                                <div>{{prod.vchDesc}}</div>
                                </v-card-text>

                                <v-card-actions>

                                <v-btn
                                    color="orange"
                                    text
                                >
                                Comprar
                                </v-btn>
                                </v-card-actions>
                                    </v-card></inertia-link>
                            <!-- <Pagination :links="prods.links"/>-->
                    </div>
                </div>

            </div>
            </section><!-- End Portfolio Section -->


        </main><!-- End #main -->

        <Fotter/>
    </v-app>
</template>

<script>

import Fotter from '../Fotter'
import Head from '../Head'
//import Pagination from '@/Layouts/Pagination'

export default {
    metaInfo: { title: 'Inicio' },
    ///props:['prods'],
    props:{
        prods:Object,
                errors: Object,

    },
    data () {
      return {


      }
    },

    methods: {
        checar() {
          alert(this.prods)
        },
    },

    components: {
        Fotter,
        Head,
        //Pagination,
    },
}
</script>
