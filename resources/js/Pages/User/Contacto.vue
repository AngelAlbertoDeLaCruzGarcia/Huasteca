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
                        <h2>Contacto</h2>
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

                    <div class="row" >

                    <div class="col-lg-6 ">
                        <v-img class="mb-4 mb-lg-0" src="/assets/img/pag/asistencia.jpg" style="border:10; width: 100%; height: 384px;"/>
                    </div>

                    <div class="col-lg-6">
                        <v-form @submit.prevent="sendEmail" ref="form" v-model="frmcontacto.valid" lazy-validation>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                <v-text-field label="Nombre" v-model="frmcontacto.nombre" :rules="frmcontacto.nombreRules" clearable required />

                                </div>
                                <div class="col-md-6 form-group">
                                    <v-text-field label="Numero" v-model="frmcontacto.telefono" :rules="frmcontacto.telefonoRules" clearable required/>

                                </div>
                            </div>
                            <div class="form-group">
                                <v-text-field v-model="frmcontacto.correo" :rules="frmcontacto.correoRules" label="Email" clearable required />

                            </div>
                            <div class="form-group">
                                <v-textarea label="Mensaje" v-model="frmcontacto.msg" :rules="frmcontacto.msgRules" clearable required></v-textarea>
                            </div>
                            <div class="mb-3">

                            </div>
                            <div class="text-center" v-show="!frmcontacto.confirmacion"><v-btn color="success" type="submit" :disabled="!frmcontacto.valid">Enviar Mensaje</v-btn></div>
                            <div class="text-center" v-show="frmcontacto.confirmacion"><v-btn color="success" type="submit" disabled="true">Enviar Mensaje</v-btn></div>
                        </v-form>
                        <v-alert v-show="frmcontacto.confirmacion"  border="right" type="success" elevation="5" width="600px">
                           <strong>¡Mensaje enviado! </strong> En breve recibirás una respuesta.

                        </v-alert>
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
    metaInfo: { title: 'Contacto' },
    ///props:['prods'],
    props:{
        errors: Object,
    },
    data () {
      return {
        frmcontacto:
        {
            confirmacion: false,
            valid: true,
            correo: null,
            correoRules: [
                v => !!v || 'E-mail es requerido',
                v => /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(v) || 'E-mail no valido',
            ],
            nombre:null,
            nombreRules: [
                v => !!v || 'Nombre es requerido',
                v => /^[a-zA-ZÀ-ÿ\s]+$/.test(v) || 'Solo se aceptan letras',
            ],
            telefono:null,
            telefonoRules: [
                v => !!v || 'Telefono es requerido',
                v => /^[0-9]+$/.test(v) || 'Solo numeros',
                v => /^\d{10}$/.test(v)  || 'Solo 10 caracteres',


            ],
            msg:null,
            msgRules: [
                v => !!v || 'Mensage es requerido',
            ],

        },
      }
    },

    methods: {
        checar() {
          alert(this.prods)
        },
        sendEmail()
        {
            this.$refs.form.validate();
            if(this.frmcontacto.valid & this.frmcontacto.correo!=null & this.frmcontacto.nombre!=null & this.frmcontacto.msg!=null & this.frmcontacto.telefono!=null)
            {
                this.$inertia.post('/contacto',{

                    nombre:this.frmcontacto.nombre,
                    correo:this.frmcontacto.correo,
                    telefono:this.frmcontacto.telefono,
                    msg:this.frmcontacto.msg,
                },
                {
                    preserveScroll: true,
                    onFinish: () => {
                        this.frmcontacto.confirmacion=true
                    }
                }
                )

            }
        },

    },

    components: {
        Fotter,
        Head,
        //Pagination,
        ///^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    },
}
</script>
