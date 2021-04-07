<template>
    <v-app>

        <Head :errors="errors"/>
        <!-- ======= Hero Section ======= -->
          <section id="hero2" style="padding: 45px 0;">
            <div class="hero-container" data-aos="fade-up">

            </div>
        </section>

        <main id="main">

            <section id="about" class="about" style="padding: -30px 0;">
            <div class="container">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d8294.004489303681!2d-98.41052841557946!3d21.139213649781027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1605804357256!5m2!1ses!2smx" width="1500" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>

            </div>
            </section>

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
        flash: Object,

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
