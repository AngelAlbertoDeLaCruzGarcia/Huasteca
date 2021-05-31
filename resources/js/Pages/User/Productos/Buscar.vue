<template>
<v-app>
        <Head :errors="errors"/>
        <!-- ======= Hero Section ======= -->
          <section id="hero2" style="padding: 45px 0;">
            <div class="hero-container" data-aos="fade-up">

            </div>
        </section>



        <main id="main">
                        <!-- ======= Portfolio Section ======= -->

                <section id="portfolio" class="portfolio">
                    <div class="container">
                        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                            <p v-if="checar">Resultados de: <strong>{{nombre}}</strong></p>
                        </div>



                    <div class="row portfolio-container" data-aos="fade-up">
                        <div v-for="prod in prods" :key="prod.intIDProd">
                            <ul v-if="prod.intIdCat==1">
                                <div class="portfolio-item filter-c">
                                    <inertia-link :href="`/Inicio/${prod.intIDProd}`">

                                    <v-card class="mx-auto" max-width="350" hover="true">
                                        <v-img class="white--text align-end" height="200px"
                                        :src="`${prod.vchImg}`">
                                        </v-img>
                                        <v-card-title>{{prod.vchProd}}</v-card-title>
                                        <v-card-subtitle class="pb-0">
                                        Caballero
                                        </v-card-subtitle>

                                        <v-card-text class="text--primary">
                                        <div><strong>${{prod.fltPrecio}}</strong></div>

                                        <div>{{prod.vchDesc}}</div>
                                        </v-card-text>

                                        <v-card-actions>
                                        <v-btn
                                            color="success"

                                        >
                                        Comprar
                                        </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </inertia-link>

                                </div>
                            </ul>
                            <ul v-if="prod.intIdCat==2">
                                <div class="portfolio-item filter-d">
                                    <inertia-link :href="`/Inicio/${prod.intIDProd}`">

                                       <v-card class="mx-auto" max-width="350" hover="true">
                                        <v-img class="white--text align-end" height="200px"
                                        :src="`${prod.vchImg}`">
                                        </v-img>
                                        <v-card-title>{{prod.vchProd}}</v-card-title>

                                        <v-card-subtitle class="pb-0">
                                        Dama
                                        </v-card-subtitle>

                                        <v-card-text class="text--primary">
                                        <div><strong>${{prod.fltPrecio}}</strong></div>

                                        <div>{{prod.vchDesc}}</div>
                                        </v-card-text>

                                        <v-card-actions>
                                        <v-btn color="success">
                                        Comprar
                                        </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                    </inertia-link>

                                </div>
                            </ul>
                            <ul v-if="prod.intIdCat==3">
                                <div class="portfolio-item filter-n" hover="true">
                                    <inertia-link :href="`/Inicio/${prod.intIDProd}`">

                                    <v-card class="mx-auto" max-width="350">
                                        <v-img class="white--text align-end" height="200px"
                                        :src="`${prod.vchImg}`">
                                        </v-img>
                                        <v-card-title>{{prod.vchProd}}</v-card-title>

                                        <v-card-subtitle class="pb-0">
                                        Infantil
                                        </v-card-subtitle>

                                        <v-card-text class="text--primary">
                                        <div><strong>${{prod.fltPrecio}}</strong></div>

                                        <div>{{prod.vchDesc}}</div>
                                        </v-card-text>

                                        <v-card-actions>
                                        <v-btn
                                            color="success"

                                        >
                                        Comprar
                                        </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                    </inertia-link>
                                </div>
                            </ul>
                            <ul v-if="prod.intIdCat==4">
                                <div class="portfolio-item filter-n" hover="true">
                                    <inertia-link :href="`/Inicio/${prod.intIDProd}`">

                                    <v-card class="mx-auto" max-width="350">
                                        <v-img class="white--text align-end" height="200px"
                                        :src="`${prod.vchImg}`">
                                        </v-img>
                                        <v-card-title>{{prod.vchProd}}</v-card-title>

                                        <v-card-subtitle class="pb-0">
                                        Unisex
                                        </v-card-subtitle>

                                        <v-card-text class="text--primary">
                                        <div><strong>${{prod.fltPrecio}}</strong></div>

                                        <div>{{prod.vchDesc}}</div>
                                        </v-card-text>

                                        <v-card-actions>
                                        <v-btn
                                            color="success"

                                        >
                                        Comprar
                                        </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                    </inertia-link>
                                </div>
                            </ul>

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
        nombre:Object,
        checar:Boolean,
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
