<template>
<div>
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-4">
                        <div class="footer-info" data-aos="fade-up" data-aos-delay="50">
                            <h3>Indumentarias</h3>
                            <p class="pb-3"><em>La mejor calidad en ropa de la Huasteca</em></p>
                            <p>
                                Calle Nueva <br>
                                Huejutla de Reyes<br><br>
                                <strong>Telefono:</strong>7716838276<br>
                                <strong>Email:</strong> indumentariash@gmail.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="icofont-skype"></i></a>
                                <a href="#" class="linkedin"><i class="icofont-telegram"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="150">
                        <h4>Navegacion</h4>
                        <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="/">Inicio</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/Acerca">Acerca de</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/Carrito">Carrito</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="250">
                        <h4>Categorias</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i><a :href="`/bprod?p=2`">Dama</a></li>
                            <li><i class="bx bx-chevron-right"></i><a :href="`/bprod?p=1`">Caballero</a></li>
                            <li><i class="bx bx-chevron-right"></i><a :href="`/bprod?p=3`">Niño</a></li>
                            <li><i class="bx bx-chevron-right"></i><a :href="`/bprod?p=Camisa`">Camisas</a></li>
                            <v-list dark>
                                <v-list-group :value="false">
                                    <template v-slot:activator>
                                        <v-list-item-title>Mas...</v-list-item-title>
                                    </template>
                                    <v-list-item>
                                        <v-list-item-title>
                                            <li><i class="bx bx-chevron-right"></i><a :href="`/bprod?p=Conjunto`">Conjuntos</a></li>
                                        </v-list-item-title>
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-title>
                                            <li><i class="bx bx-chevron-right"></i><a :href="`/bprod?p=Blusa`">Blusas</a></li>
                                        </v-list-item-title>
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-title>
                                            <li><i class="bx bx-chevron-right"></i><a :href="`/bprod?p=Cubreboca`">Cubrebocas</a></li>
                                        </v-list-item-title>
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-title>
                                            <li><i class="bx bx-chevron-right"></i><a :href="`/bprod?p=Traje`">Trajes</a></li>
                                        </v-list-item-title>
                                    </v-list-item>

                                    <v-list-item>
                                        <v-list-item-title>
                                            <li><i class="bx bx-chevron-right"></i><a :href="`/bprod?p=Huarache`">Huaraches</a></li>
                                        </v-list-item-title>
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-title>
                                            <li><i class="bx bx-chevron-right"></i><a :href="`/bprod?p=Tenis`">Tenis</a></li>
                                        </v-list-item-title>
                                    </v-list-item>
                                </v-list-group>
                            </v-list>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter" data-aos="fade-up" data-aos-delay="350">
                        <h4>Suscribete</h4>
                        <p>Para que puedas recibir ofertas, descuentos, sorpresas y mucho mas</p>
                        <form style="color:black" action="">
                        <input type="email" placeholder="correo@ejemplo.com" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                <a href="/Aviso"><strong><span>Aviso de privacidad</span></strong></a>
                &copy; Copyright <strong><span>Indumentarias</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->

            </div>
        </div>
    </footer>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</div>
</template>

<script>
    export default {

    }
</script>
