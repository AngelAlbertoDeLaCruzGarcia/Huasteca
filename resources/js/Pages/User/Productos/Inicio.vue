<template>
    <v-app>
        <Head :errors="errors"/>
        <!-- ======= Hero Section ======= -->
        <section id="hero">
            <div class="hero-container" data-aos="fade-up">
                <h1>Indumentarias de la Huasteca</h1>
                <h2>la huasteca solo hay una, y como la huasteca ninguna</h2>
                <a href="#portfolio" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
            </div>
        </section><!-- End Hero
          <v-img src="@/assets/ic.png"></v-img> -->
        <main id="main">
            <!-- ======= Portfolio Section ======= -->
            <section id="portfolio" class="portfolio">
                <div class="container">
                    <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                        <h2>Productos</h2>
                        <p>La mejor calidad de la region huasteca de Mexico</p>
                        <button v-on:click="checar">checar</button>
                        Completed Todos: {{ doneTodosCount }}
                    </div>

                    <div class="row" data-aos="fade-in">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <ul id="portfolio-flters">
                                <li data-filter="*" class="filter-active">All</li>
                                <li data-filter=".filter-c">Caballero</li>
                                <li data-filter=".filter-d">Dama</li>
                                <li data-filter=".filter-n">Niño</li>
                            </ul>
                        </div>
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
                                        src="`${prod.vchImg}`">
                                        </v-img>
                                        <v-card-title>{{prod.vchProd}}</v-card-title>

                                        <v-card-subtitle class="pb-0">
                                        Para Dama
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
                                        Niño
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
import { mapGetters } from 'vuex';

export default {
    metaInfo: { title: 'Inicio' },
    ///props:['prods'],
    props:{
        prods:Array,
        errors: Object,

    },
    data () {
      return {
        r:'https://cdn.vuetifyjs.com/images/cards/docks.jpg',
        i:'Nuevo',
        cont: this.$store.state.count,
      }
    },
    methods: {
        checar() {
          alert(this.cont)
        },
    },
    computed: mapGetters([
        'doneTodos', 'doneTodosCount', 'getTodoById'
    ]),

    components: {
        Fotter,
        Head,
    },
}
</script>
