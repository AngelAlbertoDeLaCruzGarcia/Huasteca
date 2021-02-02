<template>
    <v-app>

        <Head :errors="errors"/>

        <!-- ======= Hero Section ======= -->
        <section id="hero2" style="padding: 45px 0;">
            <div class="hero-container" data-aos="fade-up">

            </div>
        </section>
        <main id="main">

            <!-- =======Slider ======= -->
            <section id="about" class="about" style="padding: -30px 0;">
                <div class="container">
                    <v-card elevation="24" max-width="100%" class="mx-auto">
                        <v-carousel cycle height="370" hide-delimiter-background show-arrows-on-hover>
                            <v-carousel-item v-for="(item,i) in items" :key="i" :src="`${item.src}`"></v-carousel-item>
                        </v-carousel>
                    </v-card>
                </div>
            </section><!-- Slider -->

            <!-- ======= Portfolio Section ======= -->
            <section id="portfolio" class="portfolio" style="margin-bottom:20px;">
                <div class="container">
                    <div class="row" data-aos="fade-in">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <ul id="portfolio-flters">
                                <li><v-btn @click="cambiarT" color="success" x-small rounded>Todo</v-btn></li>
                                <li><v-btn @click="cambiarD" color="success" x-small rounded>Dama</v-btn></li>
                                <li><v-btn @click="cambiarC" color="success" x-small rounded>Caballero</v-btn></li>
                                <li><v-btn @click="cambiarI" color="success" x-small rounded>Infantil</v-btn></li>

                            </ul>
                        </div>
                    </div>

                    <div class="row portfolio-container">
                        <div v-for="prod in prods" :key="prod.intIDProd">
                            <ul v-if="prod.intIdCat==1" v-show="caba">
                                <inertia-link :href="`/Inicio/${prod.intIDProd}`">
                                    <v-card class="mx-auto" max-width="350" hover="true">
                                        <v-img class="white--text align-end" height="200px" :src="`${prod.vchImg}`"/>                                        <v-card-title>{{prod.vchProd}}</v-card-title>
                                        <v-card-subtitle class="pb-0"> Caballero  </v-card-subtitle>
                                        <v-card-text class="text--primary">
                                            <div><strong>${{prod.fltPrecio}}</strong></div>
                                            <div>{{prod.vchDesc}}</div>
                                        </v-card-text>
                                        <v-card-actions>
                                            <v-btn color="success"> Comprar </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </inertia-link>
                            </ul>
                            <ul v-if="prod.intIdCat==2" v-show="dama">
                                <inertia-link :href="`/Inicio/${prod.intIDProd}`">
                                    <v-card class="mx-auto" max-width="350" hover="true">
                                        <v-img class="white--text align-end" height="200px" :src="`${prod.vchImg}`"/>

                                        <v-card-title>{{prod.vchProd}}</v-card-title>

                                        <v-card-subtitle class="pb-0">Dama</v-card-subtitle>

                                        <v-card-text class="text--primary">
                                            <div><strong>${{prod.fltPrecio}}</strong></div>

                                                <div>{{prod.vchDesc}}</div>
                                        </v-card-text>

                                        <v-card-actions>
                                            <v-btn color="success">Comprar</v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </inertia-link>
                            </ul>
                            <ul v-if="prod.intIdCat==3" v-show="infa">
                                <inertia-link :href="`/Inicio/${prod.intIDProd}`">
                                    <v-card class="mx-auto" max-width="350" hover="true">
                                        <v-img class="white--text align-end" height="200px" :src="`${prod.vchImg}`"/>
                                        <v-card-title>{{prod.vchProd}}</v-card-title>
                                        <v-card-subtitle class="pb-0">Infantil </v-card-subtitle>
                                        <v-card-text class="text--primary">
                                            <div><strong>${{prod.fltPrecio}}</strong></div>
                                            <div>{{prod.vchDesc}}</div>
                                        </v-card-text>
                                        <v-card-actions>
                                            <v-btn color="success">Comprar</v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </inertia-link>
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
        i:'Nuevo',
        caba: true,
        dama: true,
        infa: true,
        cont: this.$store.state.count,
        items:
        [
            {
            src: 'assets/img/imgSlider1.jpg',
            },
            {
            src: 'assets/img/imgSlider2.jpg',
            },
            {
            src: 'assets/img/imgSlider3.jpg',
            },
        ],
      }
    },
    methods: {
        checar() {
          alert(this.cont)
        },
        cambiarD:function()
        {
            this.dama=true;
            this.caba=false;
            this.infa=false;
        },
        cambiarC:function()
        {
            this.dama=false;
            this.caba=true;
            this.infa=false;
        },
        cambiarI:function()
        {
            this.dama=false;
            this.caba=false;
            this.infa=true;
        },
        cambiarT:function()
        {
            this.dama=true;
            this.caba=true;
            this.infa=true;
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
