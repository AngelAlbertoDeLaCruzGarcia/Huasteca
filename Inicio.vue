<template>
<v-app>
     <Head/>
        <!-- ======= Hero Section ======= -->
        <section id="hero">
            <div class="hero-container" data-aos="fade-up">
            <h1>Indumentarias de la Huasteca</h1>
            <h2>la huasteca solo hay una, y como la huasteca ninguna</h2>
            <a href="#portfolio" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
            </div>
        </section><!-- End Hero -->

        <main id="main">
            <!-- ======= Portfolio Section ======= -->
            <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Productos</h2>
                <p>La mejor calidad de la region huasteca de Mexico</p>

                <button v-on:click="checar">checar</button>

                </div>

                <div class="row" data-aos="fade-in">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-c">Caballero</li>
                    <li data-filter=".filter-n">Niño</li>
                    <li data-filter=".filter-d">Dama</li>
                    </ul>
                </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up">


                <div v-for="prod in prods" :key="prod.intIDProd">
                    <ul v-if="prod.intIdCat==1"><div class="portfolio-item filter-c">

                        <p>{{prod.vchImg}}</p>
                        <p>{{prod.vchProd}}</p>
                        <p>{{prod.vchDesc}}</p>
                        <inertia-link :href="`/Inicio/${prod.intIDProd}`">Mostrar2 </inertia-link>
                    </div></ul>
                    <ul v-if="prod.intIdCat==2"><div class="portfolio-item filter-d">

                        <p>{{prod.vchImg}}</p>
                        <p>{{prod.vchProd}}</p>
                        <p>{{prod.vchDesc}}</p>
                        <inertia-link :href="`/Inicio/${prod.intIDProd}`">Mostrar2 </inertia-link>
                    </div></ul>
                    <ul v-if="prod.intIdCat==3"><div class="portfolio-item filter-n ">

                        <p>{{prod.vchImg}}</p>
                        <p>{{prod.vchProd}}</p>
                        <p>{{prod.vchDesc}}</p>
                        <inertia-link :href="`/Inicio/${prod.intIDProd}`">Mostrar2 </inertia-link>
                    </div></ul>

                </div>

<!---
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                    <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                        <a href="#" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                    <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                        <a href="#" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                    <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="bx bx-plus"></i></a>
                        <a href="#" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                    </div>
                </div>

-->


                </div>
            </div>
            </section><!-- End Portfolio Section -->


            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Contact</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                    <i class="bx bx-map"></i>
                    <h3>Our Address</h3>
                    <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email Us</h3>
                    <p>contact@example.com</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Call Us</h3>
                    <p>+1 5589 55488 55</p>
                    </div>
                </div>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-6 ">
                    <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d8294.004489303681!2d-98.41052841557946!3d21.139213649781027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1605804357256!5m2!1ses!2smx" width="500" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

                </div>

            </div>
            </section><!-- End Contact Section -->

        </main><!-- End #main -->

        <Fotter/>
    </v-app>
</template>

<script>

import Fotter from '@/Layouts/Fotter'
import Head from '@/Layouts/Head'
export default {
    metaInfo: { title: 'Inicio' },
    ///props:['prods'],
    props:{
        prods:Array,
    },
    data () {
      return {


      }
    },

    methods: {
        checar() {
          alert(this.prods.vchImg)
        },
    },


    components: {
        Fotter,
        Head,
    },
}
</script>
