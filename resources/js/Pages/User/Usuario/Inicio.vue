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
                    <div class="d-flex justify-content-center">
                        <v-card style="padding:30px;" max-width="800" hover="true">
                            <v-card-title>{{this.$store.state.datosUsuario.name}}</v-card-title>
                            <v-divider/>
                            <v-form @submit.prevent="sendEmail" ref="form" v-model="frmcontacto.valid" lazy-validation>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                    <v-text-field label="Nombre"  v-model="frmcontacto.nombre" :rules="frmcontacto.nombreRules" clearable required />

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <v-text-field label="Numero"  v-model="frmcontacto.telefono" :rules="frmcontacto.telefonoRules" clearable required/>

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
                            </v-form>
                                <v-card-actions>
                                    <v-btn @click="addProd" color="success">Agregar al carrito</v-btn>
                                </v-card-actions>
                        </v-card>
                    </div>


                </div>
            </section><!-- End Contact Section -->


        </main>
        <Fotter/>
    </v-app>
</template>

<script>

import Fotter from '../Fotter'
import Head from '../Head'
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
        cambiar(){
            this.frmcontacto.nombre=this.$store.state.datosUsuario.name;
            console.log(this.frmcontacto.nombre);
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
    created(){
        this.cambiar();
    },

    components: {
        Fotter,
        Head,
        //Pagination,
        ///^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    },
}
</script>
