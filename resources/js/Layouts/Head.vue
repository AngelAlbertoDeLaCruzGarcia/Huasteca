<template>
<div>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex">

            <div class="logo mr-auto">
                    <h1 class="text-light"><a href="/Inicio"><img src="assets/img/Logo.jpeg" width="90px"/></a></h1>

                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>
            <v-form @submit.prevent="buscarProd">
                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li ><v-text-field background-color="white" v-model="frmbuscar.buscar" placeholder="Producto"></v-text-field></li>
                        <li style="margin-top:4px"><v-btn type="submit" color="success">Buscar</v-btn></li>
                    </ul>
                </nav>
            </v-form>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                <li class="active"><a href="/Inicio" style="color:#fff">Inicio</a></li>
                <li><a href="" style="color:#fff">Acerca de</a></li>
                <li><a href="" style="color:#fff">Carrito</a></li>


                    <li v-if="datos==null"><a href="" style="color:#fff" data-toggle="modal" data-target="#loginModal">Iniciar sesion</a></li>
                    <li v-if="datos==null"><a href="" style="color:#fff" data-toggle="modal" data-target="#registrarModal">Registrarse</a></li>

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
            <v-form @submit.prevent="loguear" ref="form" v-model="frmloguear.valid" lazy-validation>
            <div class="modal-body">

                <div class="form-group">
                    <v-text-field label="Email" v-model="frmloguear.correo"  :counter="50" :rules="frmloguear.correoRules" required></v-text-field>
                </div>
                <div class="form-group">
                        <v-text-field label="Contraseña" v-model="frmloguear.contra" :rules="frmloguear.contraRules"  :counter="30" type="password" required></v-text-field>
                </div>

            </div>
            <div class="modal-footer">
                <v-btn data-dismiss="modal" color="blue darken-1" text >
                    Cerrar
                </v-btn>
                <v-btn type="submit" class="ma-2" color="success"  :disabled="!frmloguear.valid" dark >
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
            <v-form @submit.prevent="registrar" ref="form" v-model="frmloguear.valid" lazy-validation>
            <div class="modal-body">
                <div class="form-group">
                    <v-text-field label="Nombre" v-model="frmregistrar.nombre"  :counter="150" :rules="frmregistrar.nombreRules" required></v-text-field>
                </div>

                <div class="form-group">
                    <v-text-field label="Email" v-model="frmloguear.correo"  :counter="50" :rules="frmloguear.correoRules" required></v-text-field>
                </div>
                <div class="form-group">
                        <v-text-field label="Contraseña" v-model="frmloguear.contra" :rules="frmloguear.contraRules"  :counter="30" type="password" required></v-text-field>
                </div>
                <div class="form-group">
                        <v-text-field label="Repetir Contraseña" v-model="frmregistrar.contra" :rules="frmregistrar.contraRules"  :counter="30" type="password" required></v-text-field>
                </div>
            </div>
            <div class="modal-footer">
                <v-btn data-dismiss="modal" color="blue darken-1" text >
                    Cerrar
                </v-btn>
                <v-btn type="submit" class="ma-2" color="success"  :disabled="!frmloguear.valid" dark >
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
export default {
    props:{
        datos:Object
    },
    data (){
        return{
            frmloguear:{
                dialog: false,
                valid: false,
                correo: '',
                correoRules: [
                    v => !!v || 'E-mail es requerido',
                    v => /.+@.+/.test(v) || 'E-mail no valido',
                    v => (v && v.length >= 10) || 'Se requieren minimo 10 caracteres',
                    v => (v && v.length <= 50) || 'No se permiten mas de 50 caracteres',
                ],
                contra: '',
                contraRules: [
                    v => !!v || 'Contraseña es requerida',
                    v => (v && v.length > 6) || 'Se requieren minimo 8 caracteres',
                ],
            },
            frmregistrar:{
                nombre:'',
                nombreRules:[
                    v => !!v || 'Nombre es requerido',
                    v => (v && v.length >= 10) || 'Se requieren minimo 10 caracteres',
                    v => (v && v.length <= 50) || 'No se permiten mas de 50 caracteres',
                ],
                contra: '',
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

    methods:{
        loguear(){
            this.$inertia.post('login',{
                email:this.frmloguear.correo,
                password:this.frmloguear.contra,
            },
            {
                  onBefore: (visit) => {},
                    onStart: (visit) => {},
                    onProgress: (progress) => {},
                    onSuccess: (page) => {},
                    onCancel: () => {},
                    onFinish: () => {},
            }
            )
            $('#loginModal').modal('hide')

        },
        registrar(){
            this.$inertia.post('register',{
                name:this.frmregistrar.nombre,
                email:this.frmloguear.correo,
                password:this.frmloguear.contra,
                password_confirmation:this.frmregistrar.contra,

            },
            {
                  onBefore: (visit) => {},
                    onStart: (visit) => {},
                    onProgress: (progress) => {},
                    onSuccess: (page) => {},
                    onCancel: () => {},
                    onFinish: () => {},
            }
            )
            $('#registrarModal').modal('hide')
        },
        buscarProd(){
            this.$inertia.get('bprod',{
                p:this.frmbuscar.buscar,
            })

        }
    }

}
</script>

