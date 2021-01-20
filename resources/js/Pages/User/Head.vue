<template>
    <div>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex">

                <div class="logo mr-auto">
                    <h1 class="text-light"><a href="/Inicio"><img src="assets/img/logo.png"/></a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
                </div>
                <v-form @submit.prevent="buscarProd">
                    <nav class="nav-menu d-none d-lg-block">
                        <ul>
                            <li ><v-text-field background-color="white" v-model="frmbuscar.buscar" placeholder="Producto" clearable></v-text-field></li>
                            <li style="margin-top:4px"><v-btn type="submit" color="success"><i class="fas fa-search"></i></v-btn></li>
                        </ul>
                    </nav>
                </v-form>

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li class="active"><a href="/Inicio" style="color:black;"><i class="fas fa-home"></i></a></li>
                        <li><a href="/Acerca" style="color:black;">Acerca de</a></li>
                        <li><a href="/Carrito" style="color:black;"><i class="fas fa-shopping-cart"></i></a></li>
                        <li v-if="this.$store.state.auth==false"><a href="" style="color:black;" data-toggle="modal" data-target="#loginModal">Iniciar sesion</a></li>
                        <li v-if="this.$store.state.auth==false"><a href="" style="color:black;" data-toggle="modal" data-target="#registrarModal">Registrarse</a></li>
                        <li v-if="this.$store.state.auth==true"><inertia-link href="/logout" method="post" style="color:black;"><i class="fas fa-power-off"></i></inertia-link></li>
                    </ul>
                </nav><!-- .nav-menu -->
            </div>
        </header><!-- End Header -->


        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="d-flex justify-content-center">
                        <v-alert v-if="errors.email"  border="right" type="warning" elevation="5" width="400px">
                            Correo y/o Contraseña incorrectos

                        </v-alert>
                    </div>
                    <v-form @submit.prevent="loguear" ref="form" v-model="frmloguear.valid"  lazy-validation>
                        <div class="modal-body">

                            <div class="form-group">
                                <v-text-field label="Email" v-model="frmloguear.correo" :counter="50" :rules="frmloguear.correoRules" required clearable></v-text-field>
                            </div>
                            <div class="form-group">
                                <v-text-field label="Contraseña" v-model="frmloguear.contra" :rules="frmloguear.contraRules" :counter="30" required clearable
                                :type="showContra ? 'text' : 'password'" :append-icon="showContra ? 'mdi-eye' : 'mdi-eye-off'" @click:append="showContra = !showContra"></v-text-field>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <v-btn data-dismiss="modal" color="blue darken-1" text >
                                Cerrar
                            </v-btn>
                            <v-btn type="submit" class="ma-2" color="success"  :disabled="!frmloguear.valid">
                                Acceder
                                <v-icon dark right>
                                    mdi-checkbox-marked-circle
                                </v-icon>
                            </v-btn>
                        </div>
                    </v-form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="registrarModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Registrarse</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div v-if="errors.email" class="d-flex justify-content-center">
                        <v-alert border="right" type="warning" elevation="5" width="500px">
                            Correo ya existe
                        </v-alert>
                    </div>
                    <div v-if="errors.password" class="d-flex justify-content-center">
                        <v-alert border="right" type="warning" elevation="5" width="500px">
                            Contraseñas no coninciden
                        </v-alert>
                    </div>


                    <v-form @submit.prevent="registrar" ref="form" v-model="frmregistrar.valid" lazy-validation>
                        <div class="modal-body">
                            <div class="form-group">
                                <v-text-field label="Nombre" v-model="frmregistrar.nombre"  :counter="150" :rules="frmregistrar.nombreRules" required clearable></v-text-field>
                            </div>

                            <div class="form-group">
                                <v-text-field label="Email" v-model="frmloguear.correo"  :counter="50" :rules="frmloguear.correoRules" required clearable></v-text-field>
                            </div>
                            <div class="form-group">
                                <v-text-field label="Contraseña" v-model="frmloguear.contra" :rules="frmloguear.contraRules" :counter="30" required clearable
                                :type="showContra ? 'text' : 'password'" :append-icon="showContra ? 'mdi-eye' : 'mdi-eye-off'" @click:append="showContra = !showContra"></v-text-field>

                            </div>
                            <div class="form-group">
                                    <v-text-field label="Repetir Contraseña" v-model="frmregistrar.contra" :rules="frmregistrar.contraRules"  :counter="30" type="password" required clearable></v-text-field>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <v-btn data-dismiss="modal" color="blue darken-1" text >
                                Cerrar
                            </v-btn>
                            <v-btn type="submit" class="ma-2" color="success"  :disabled="!frmregistrar.valid" >
                                Acceder
                                <v-icon dark right>
                                    mdi-checkbox-marked-circle
                                </v-icon>
                            </v-btn>
                        </div>
                    </v-form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Button from '../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/Button.vue';

export default{
  components: { Button },
    props:{
        datops:Object,
        errors: Object,

    },
    data (){
        return{
            d:Array,
            abrirErrors:false,
            showContra:false,
            frmloguear:
            {
                alert:true,
                dialog: false,
                valid: false,
                correo: null,
                correoRules: [
                    v => !!v || 'E-mail es requerido',
                    v => /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(v) || 'E-mail no valido',
                    v => (v && v.length >= 10) || 'Se requieren minimo 10 caracteres',
                    v => (v && v.length <= 50) || 'No se permiten mas de 50 caracteres',
                ],

                contra: null,
                contraRules: [
                    v => !!v || 'Contraseña es requerida',
                    v => (v && v.length > 6) || 'Se requieren minimo 8 caracteres',
                ],
            },
            frmregistrar:
            {
                valid:true,
                nombre:null,
                nombreRules:[
                    v => !!v || 'Nombre es requerido',
                    v => (v && v.length >= 10) || 'Se requieren minimo 10 caracteres',
                    v => (v && v.length <= 50) || 'No se permiten mas de 50 caracteres',
                ],
                contra: null,
                contraRules: [
                    v => !!v || 'Contraseña es requerida',
                    v => (v && v.length > 6) || 'Se requieren minimo 8 caracteres',
                ],
            },
            frmbuscar:{
                buscar:''
            }
        }
    },
    methods:
    {
        checar() {
           // alert(this.$store.state.auth)

          alert(this.errors.email)
        },
        loguear()
        {
            this.$refs.form.validate();
            if(this.frmloguear.valid &this.frmloguear.correo!=null)
            {
                this.$inertia.post('login',{
                    email:this.frmloguear.correo,
                    password:this.frmloguear.contra,
                },
                {
                    onSuccess: () => {
                        if(this.errors.email==null){
                            $('#loginModal').modal('hide')
                            this.limpiarlogin()
                            this.$store.dispatch("obtenerUsuario")

                        }else{


                        }
                    }
                }
                )
            }
        },
        registrar()
        {
            this.$refs.form.validate();
            if(this.frmregistrar.valid & this.frmloguear.correo!=null)
            {
                this.$inertia.post('register',{
                    name:this.frmregistrar.nombre,
                    email:this.frmloguear.correo,
                    password:this.frmloguear.contra,
                    password_confirmation:this.frmregistrar.contra,
                },
                {
                    onSuccess: () => {
                        if(this.errors.email==null & this.errors.password==null){
                            $('#registrarModal').modal('hide')
                            this.limpiarlogin()
                        }else{

                        }
                    },
                }
                )
            }
        },
        buscarProd(){
            this.$inertia.get('bprod',{
                p:this.frmbuscar.buscar,
            })
        },
        limpiarlogin(){
            this.frmloguear.correo=null;
            this.frmloguear.contra=null;
        }
    },
    watch:{

    }

}
</script>

