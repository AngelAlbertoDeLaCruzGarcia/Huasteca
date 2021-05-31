<template>
    <div>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex">

                <div class="logo mr-auto">
                    <h1 class="text-light"><a href="/Inicio"><img src="/assets/img/Logo.jpeg" width="70px"/></a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
                </div>
                <v-form @submit.prevent="buscarProd">
                    <nav class="nav-menu d-none d-lg-block">
                        <ul>
                            <li style="margin-top:4px">
                                    <v-tooltip bottom>
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-btn color="success" dark v-bind="attrs" v-on="on" data-toggle="modal" data-target="#searchModal">
                                                <i class="icofont-listine-dots"></i>
                                            </v-btn>
                                        </template>
                                        <span>Busqueda Avanzada</span>
                                    </v-tooltip>
                                </li>
                            <li ><v-text-field background-color="white" v-model="frmbuscar.buscar" placeholder="Producto" clearable></v-text-field></li>
                            <li style="margin-top:4px"><v-btn type="submit" color="success"><i class="icofont-search-2"></i></v-btn></li>
                        </ul>
                    </nav>
                </v-form>
                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li class="active"><a href="/Inicio" style="color:black;"><i class="icofont-home"></i></a></li>
                        <li class="drop-down"><a href="#">Categorias</a>
                            <ul>
                                <li><a :href="`/bprod?p=2`">Dama</a></li>
                                <li><a :href="`/bprod?p=1`">Caballero</a></li>
                                <li><a :href="`/bprod?p=3`">Niño</a></li>
                                <li><a :href="`/bprod?p=Camisa`">Camisas</a></li>
                                <li><a :href="`/bprod?p=Conjunto`">Conjuntos</a></li>
                                <li><a :href="`/bprod?p=Blusa`">Blusas</a></li>
                                <li><a :href="`/bprod?p=Cubreboca`">Cubrebocas</a></li>
                                <li><a :href="`/bprod?p=Traje`">Trajes</a></li>
                                <li><a :href="`/bprod?p=Vestido`">Vestidos</a></li>
                                <li><a :href="`/bprod?p=Huarache`">Huaraches</a></li>
                                <li><a :href="`/bprod?p=Tenis`">Tenis</a></li>

                            </ul>
                        </li>
                        <li><a href="/Acerca" style="color:black;">Acerca de</a></li>
                        <li><a href="/Carrito" style="color:black;"><i class="icofont-cart-alt"></i></a></li>
                        <li class="drop-down"><a href="#"><i class="icofont-ui-user"></i></a>
                            <ul>
                                <li v-if="this.$store.state.auth==true"><a href="#" style="color:black;">{{this.$store.state.datosUsuario.name}}</a></li>
                                <li v-if="this.$store.state.auth==false"><a href="#" style="color:black;" data-toggle="modal" data-target="#loginModal">Iniciar sesion</a></li>
                                <li v-if="this.$store.state.auth==false"><a href="#" style="color:black;" data-toggle="modal" data-target="#registrarModal">Registrarse</a></li>
                                <li v-if="this.$store.state.auth==true">
                                    <v-form @submit.prevent="cerrarSesion" ref="form">
                                        <button type="submit" style="backgroud-color:white; color:blue;"><i class="icofont-power"></i></button>
                                    </v-form>

                                </li>


                            </ul>
                        <li><a href="#" style="color:blue;"><i class="icofont-facebook"></i></a></li>
                        <li><a href="#" style="color:green;"><i class="icofont-brand-whatsapp"></i></a></li>

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
                                <v-text-field label="Email" v-model="frmloguear.correo" :counter="50" :rules="frmloguear.correoRules" required clearable
                                 maxlength="50"></v-text-field>
                            </div>
                            <div class="form-group">
                                <v-text-field label="Contraseña" v-model="frmloguear.contra" :rules="frmloguear.contraRules" :counter="30" required clearable
                                :type="showContra ? 'text' : 'password'" :append-icon="showContra ? 'mdi-eye' : 'mdi-eye-off'" @click:append="showContra = !showContra"
                                maxlength="30"></v-text-field>
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

        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Busqueda Avanzada De Productos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="d-flex justify-content-center">
                        <v-alert v-if="errors.email"  border="right" type="warning" elevation="5" width="400px">
                            Correo y/o Contraseña incorrectos

                        </v-alert>
                    </div>
                    <v-form @submit.prevent="buscarProdA" ref="form" v-model="frmbuscarAvan.valid"  lazy-validation>
                        <div class="modal-body">

                            <div class="form-group">
                                <v-text-field label="Camisa/Conjunto/Zapatos/Blusa" v-model="frmbuscarAvan.prod" :counter="30" :rules="frmbuscarAvan.prodRules"
                                required clearable maxlength="30"></v-text-field>
                            </div>

                            <div class="form-group">

                            </div>
                            <div class="form-group">
                                <v-select
                                v-model="frmbuscarAvan.talla"
                                :items="frmbuscarAvan.tallas"
                                menu-props="auto"
                                label="Talla"
                                hide-details
                                single-line
                                ></v-select>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <v-text-field type="number" max="100000" min="1" label="min. $" v-model="frmbuscarAvan.preciomin" :counter="6" :rules="frmbuscarAvan.preciominRules" required clearable></v-text-field>
                                </div>
                                <div class="col">
                                    <v-text-field type="number" max="100000" min="1" label="max. $" v-model="frmbuscarAvan.preciomax" :counter="6" :rules="frmbuscarAvan.preciomaxRules" required clearable></v-text-field>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <v-btn data-dismiss="modal" color="blue darken-1" text >
                                Cerrar
                            </v-btn>
                            <v-btn type="submit" class="ma-2" color="success"  :disabled="!frmbuscarAvan.valid">
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
            frmbuscarAvan:{
                valid: false,
                prod:null,
                prodRules:[
                    v => !!v || 'Campo requerido',
                ],
                talla:'Chica',
                preciomin:null,
                preciominRules:[
                    v => !!v || '$ min. es requerido',
                    v => (v  >= 1) || 'Cantidad min: 1',
                    v => (v  <= 100000) || 'Cantidad max: 100000',

                ],
                preciomax:null,
                preciomaxRules:[
                    v => !!v || '$ max. es requerido',
                    v => (v  >= 1) || 'Cantidad min: 1',
                    v => (v  <= 100000) || 'Cantidad max: 100000',
                ],
                estado:null,
                tallas: [
                    'Chica', 'Mediana', 'Grande', 'Extra Grande',
                ],

            },
            frmbuscar:{
                buscar:''
            },

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
                    onFinish: () => {
                        if(this.errors.email==null){
                            $('#loginModal').modal('hide')
                            this.limpiarlogin()
                            this.$store.dispatch("obtenerUsuario")
                            location.reload();

                        }else{ }
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
                    onFinish: () => {
                        if(this.errors.email==null & this.errors.password==null){
                            //$('#registrarModal').modal('hide')
                            this.limpiarlogin()
                            location.reload();
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
        buscarProdA()
        {
            this.$refs.form.validate();
            if(this.frmbuscarAvan.valid & this.frmbuscarAvan.prod!=null)
            {
                $('#searchModal').modal('hide'),
                this.$inertia.post('bproda',{
                    product:this.frmbuscarAvan.prod,
                    talla:this.frmbuscarAvan.talla,
                    preciomin:this.frmbuscarAvan.preciomin,
                    preciomax:this.frmbuscarAvan.preciomax,
                },
                {
                    onSuccess: () => {
                        $('#searchModal').modal('hide')
                    }
                }
                )
            }
        },
        limpiarlogin(){
            this.frmloguear.correo=null;
            this.frmloguear.contra=null;
        },
        cerrarSesion()
        {
            this.$inertia.post('/logout',
                {

                },
                {
                    onFinish: () => {
                        location.reload();

                    }
                }
            )
        },
    },
    watch:{

    }

}
</script>

