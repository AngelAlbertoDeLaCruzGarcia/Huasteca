<template>
    <v-app>

        <Head :errors="errors"/>
        <!-- ======= Hero Section ======= -->
          <section id="hero2" style="padding: 45px 0;">
            <div class="hero-container" data-aos="fade-up">

            </div>
        </section>

        <main id="main">

            <section id="contact" class="contact section-bg">
                <div class="container">
                    <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                        <h2>Ayuda</h2>
                        <p>Si necesitas soporte tecnico o tienes alguna duda envianos un e-mail o llama al 5525212365 desde el interior de la republica</p>
                        <p>¡Estamos para ayudarte!</p>
                    </div>

                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-6">
                            <div class="info-box mb-4">
                            <v-icon >mdi-map-marker-radius-outline</v-icon>
                            <h3>Nuestra direccion</h3>
                            <p>Calle Nueva, Huejutla de Reyes, 43000</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                        <v-icon>mdi-email</v-icon>
                        <h3>Email</h3>
                        <p>contact@example.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                        <v-icon>mdi-phone-in-talk</v-icon>
                        <h3>Lamadas y Whatsapp</h3>
                        <p>5525212365</p>
                        </div>
                    </div>

                    </div>


                </div>
            </section><!-- End Contact Section -->

        </main>
        <Fotter/>
    </v-app>
</template>

<script>

import Fotter from './Fotter'
import Head from './Head'
//import Pagination from '@/Layouts/Pagination'

export default {
    metaInfo: { title: 'Acerca' },
    ///props:['prods'],
    props:{
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
