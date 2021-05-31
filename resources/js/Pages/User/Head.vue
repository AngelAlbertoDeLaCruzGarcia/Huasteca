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
                        <li >
                            <v-text-field background-color="white" v-model="frmbuscar.buscar" placeholder="Producto" clearable></v-text-field>


                        </li>
                        <li style="margin-top:4px;"><v-btn type="submit" color="success"><i class="icofont-search-2"></i></v-btn></li>
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
                        <li><a href="/contacto" style="color:black;">Contacto</a></li>
                        <li><a href="/Ayuda" style="color:black;">Ayuda</a></li>
                        <li><a href="/chat" style="color:black;">Chat</a></li>

                    </ul>
                </nav><!-- .nav-menu -->
                </v-form>
            </div>
        </header><!-- End Header -->

        <!-- Modales -->

        <!-- Login-->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div v-show="login" class="modal-content">
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
                        <flash-message class="myCustomClass">

                        </flash-message>
                    </div>

                    <v-form @submit.prevent="loguear" ref="form" v-model="frmloguear.valid"  lazy-validation>
                        <div class="modal-body">

                            <div class="form-group">
                                <v-text-field label="Email" v-model="frmloguear.correo" :counter="150" :rules="frmloguear.correoRules" required clearable
                                 ></v-text-field>
                            </div>
                            <div class="form-group">
                                <v-text-field label="Contraseña" v-model="frmloguear.contra" :rules="frmloguear.contraRules" :counter="30" required clearable
                                :type="showContra ? 'text' : 'password'" :append-icon="showContra ? 'mdi-eye' : 'mdi-eye-off'" @click:append="showContra = !showContra"
                                maxlength="30"></v-text-field>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <v-btn color="blue darken-1" @click="chambiarlogin" text x-small>
                                ¿Olvido su contraseña?
                            </v-btn>
                            <v-btn data-dismiss="modal" color="blue darken-1" text >
                                Cerrar
                            </v-btn>
                            <v-btn type="submit" class="ma-2" color="success"  :disabled="!frmvalidlogin">
                                Acceder
                                <v-icon dark right>
                                    mdi-checkbox-marked-circle
                                </v-icon>
                            </v-btn>
                        </div>
                    </v-form>
                </div>
                <!--- Correo a recuperar--->
                <div v-show="recup" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Recuperar Contraseña</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <v-alert v-show="errores"  border="right" type="warning" elevation="5" width="400px">
                            Correo y/o Contraseña incorrectos
                        </v-alert>
                    </div>


                    <v-form @submit.prevent="seguirrecup" ref="form" v-model="frmrecup.valid"  lazy-validation>
                        <div class="modal-body">
                            <div class="form-group">
                                <p style="text-align:center">Si olvido su contraseña, introduzca su corrreo para poder acceder de nuevo a la cuenta</p>
                            </div>

                            <div class="form-group">
                                <v-text-field label="Email" v-model="frmloguear.correo" :counter="150" :rules="frmloguear.correoRules" required clearable
                                 ></v-text-field>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <v-btn color="blue darken-1" @click="backrecup" text x-small>
                                Iniciar sesion
                            </v-btn>
                            <v-btn data-dismiss="modal" color="blue darken-1" text >
                                Cerrar
                            </v-btn>
                            <v-btn type="submit" class="ma-2" color="success"  :disabled="!frmvalidrecup">
                                Aceptar
                                <v-icon dark right>
                                    mdi-checkbox-marked-circle
                                </v-icon>
                            </v-btn>
                        </div>
                    </v-form>
                </div>

                <!--- Metodo a recuperar--->
                <div v-show="recupM" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hola {{datosUs.name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <v-form @submit.prevent="seguirrecupM" ref="form" v-model="frmmetod.valid"  lazy-validation>
                        <div class="modal-body">
                            <div class="form-group">
                                <p style="text-align:center">¿De que manera deseas recuperar tu contraseña?</p>
                            </div>
                            <div class="form-group">
                                <v-list rounded>
                                    <v-list-item-group v-model="frmmetod.selectedItem" color="success">
                                        <v-list-item>
                                            <v-list-item-icon>
                                                <v-icon>mdi-message-text</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-content>
                                                <v-list-item-title>Enviar <strong class="success--text">SMS</strong>  con codigo a tu cel ******{{celular}} </v-list-item-title>
                                            </v-list-item-content>
                                        </v-list-item>
                                        <v-list-item>
                                            <v-list-item-icon>
                                                <v-icon>mdi-email</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-content>
                                                <v-list-item-title>Enviar E-mail a {{frmloguear.correo}} </v-list-item-title>
                                            </v-list-item-content>
                                        </v-list-item>
                                        <v-list-item>
                                            <v-list-item-icon>
                                                <v-icon>mdi-phone</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-content>
                                                <v-list-item-title>Realizar <strong class="primary--text">llamada telefonica</strong> al numero ******{{celular}} </v-list-item-title>
                                            </v-list-item-content>

                                        </v-list-item>
                                    </v-list-item-group>
                                </v-list>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <v-btn color="blue darken-1" @click="noUs" text x-small>
                                ¿No eres tu?
                            </v-btn>
                            <v-btn data-dismiss="modal" color="blue darken-1" text >
                                Cerrar
                            </v-btn>
                            <v-btn type="submit" class="ma-2" color="success" :disabled="!frmvalidMetod">
                                Enviar
                                <v-icon dark right>
                                    mdi-checkbox-marked-circle
                                </v-icon>
                            </v-btn>
                        </div>
                    </v-form>
                </div>

                <!--- SMS--->
                <div v-show="recupSMS" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Verificar SMS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <v-alert v-if="errores"  border="right" type="error" elevation="5" width="400px">
                            Codigo incorrecto
                        </v-alert>
                        <flash-message class="myCustomClass">

                        </flash-message>
                    </div>
                    <v-form @submit.prevent="verificarSMS" ref="form" v-model="frmverificarSMS.valid"  lazy-validation>
                        <div class="modal-body">
                            <div class="form-group">
                                <p style="text-align:center">Ingrese codigo de verificacion enviado a ******{{celular}} valido solo por 5 minutos</p>
                            </div>
                            <div class="form-group">

                                <v-text-field label="*****" v-model="frmverificarSMS.codigo" :counter="5" maxlength="5" :rules="frmverificarSMS.codigoRules" required clearable/>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <v-btn type="submit" class="ma-2" color="success" :disabled="!frmvalidSMS">
                                Aceptar
                                <v-icon dark right>
                                    mdi-checkbox-marked-circle
                                </v-icon>
                            </v-btn>
                        </div>
                    </v-form>
                </div>
            </div>
        </div>

        <!-- Registrar -->
        <div class="modal fade" id="registrarModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" v-show="Reg">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Registrarse</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div v-if="errors.correo" class="d-flex justify-content-center">
                        <v-alert border="right" type="warning" elevation="5" width="500px">
                            Correo ya existe
                        </v-alert>
                    </div>

                    <v-form @submit.prevent="buscarCorreo" ref="form" v-model="frmregistrar.valid" lazy-validation>
                        <div class="modal-body">
                            <div class="form-group">
                                <v-text-field label="Nombre" v-model="frmregistrar.nombre" :counter="150" :rules="frmregistrar.nombreRules" required clearable/>
                            </div>

                            <div class="form-group">
                                <v-text-field label="Email" v-model="frmloguear.correo"  :counter="50" :rules="frmloguear.correoRules" required clearable/>
                            </div>
                            <div class="form-group">
                                <v-text-field label="Contraseña" v-model="frmregistrar.contra" :rules="frmregistrar.contraRules" :counter="30" required clearable
                                :type="showContra ? 'text' : 'password'" :append-icon="showContra ? 'mdi-eye' : 'mdi-eye-off'" @click:append="showContra = !showContra"/>
                            </div>
                            <div class="form-group">
                                <v-text-field label="Repetir Contraseña" v-model="frmregistrar.contra2" :rules="frmregistrar.contraRules2"  :counter="30" type="password" required clearable/>
                            </div>
                                <v-checkbox v-model="frmregistrar.aceptarTerms" :rules="[v => !!v || 'Debes aceptar para poder continuar']" color="success" required>
                                    <template v-slot:label>
                                        <div style="color:black;font-size:12px;">
                                            Acepto el
                                            <v-tooltip bottom>
                                                <template v-slot:activator="{ on }">
                                                    <a target="_blank" href="/Aviso" @click.stop v-on="on">aviso de privacidad</a>
                                                </template>
                                                Abrir en nueva pestaña
                                            </v-tooltip>
                                            de Indumentarias de la Huasteca&reg;
                                        </div>
                                    </template>
                                </v-checkbox>
                        </div>
                        <div class="modal-footer">
                            <v-btn data-dismiss="modal" color="blue darken-1" text >
                                Cerrar
                            </v-btn>
                            <v-btn type="submit" class="ma-2" color="success" :disabled="!frmvalidregistrar" >
                                Registrar
                                <v-icon dark right>
                                    mdi-checkbox-marked-circle
                                </v-icon>
                            </v-btn>
                        </div>
                    </v-form>
                </div>
                <div class="modal-content" v-show="!Reg">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Verificar e-mail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <v-alert v-if="cadena==null"  border="right" type="warning" elevation="5" width="400px">
                            Codigo expirado <a href="#"  @click="chambiarReg">Volver a registrar</a>
                        </v-alert>
                    </div>
                    <v-form @submit.prevent="verifyCorreo" ref="form" v-model="frmverificar.valid" lazy-validation>
                        <div class="modal-body">
                            <flash-message class="myCustomClass"></flash-message>
                            <div class="form-group">
                                <p style="text-align:center">Ingrese el codigo de verificacion que fue enviado a su correo {{frmloguear.correo}}</p>
                            </div>
                            <div class="form-group">
                                <v-text-field label="Codigo" v-model="frmverificar.codigo" :counter="5" maxlength="5" :rules="frmverificar.codigoRules" required clearable/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <v-btn data-dismiss="modal" color="blue darken-1" text >
                                Cerrar
                            </v-btn>
                            <v-btn type="submit" class="ma-2" color="success" :disabled="!frmvalidverify" >
                                Verificar
                                <v-icon dark right>
                                    mdi-checkbox-marked-circle
                                </v-icon>
                            </v-btn>
                        </div>
                    </v-form>
                </div>
            </div>
        </div>

        <!-- Buscar -->
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
export default{
    props:{
        datops:Object,
        errors: Object,
        mensaje: Object,
    },
    data (){
        return{
            cadena:null,
            Reg:true,
            login:true,
            recup:false,
            recupM:false,
            showContra:false,
            cambiarMsg:false,
            errores:false,
            mensaje2:'',
            datosUs:{cel:'Desconocido'},
            men:'Nuevo',
            frmloguear:
            {
                alert:true,
                dialog: false,
                valid: false,
                correo: null,
                correoRules: [
                    v => !!v || 'E-mail es requerido',
                    v => /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(v) || 'E-mail no valido',
                ],
                contra: null,
                contraRules: [
                    v => !!v || 'Contraseña es requerida',
                    v => (v && v.length > 7) || 'Se requieren minimo 8 caracteres',
                ],
            },
            frmregistrar:
            {
                aceptarTerms:false,
                valid:true,
                nombre:null,
                nombreRules:[
                    v => !!v || 'Nombre es requerido',
                    v => (v && v.length >= 10) || 'Se requieren minimo 10 caracteres',
                    v => (v && v.length <= 50) || 'No se permiten mas de 50 caracteres',
                    v => /^[a-zA-ZÀ-ÿ\s]+$/.test(v) || 'Solo se aceptan letras',

                ],
                contra: null,
                contraRules: [
                    v => !!v || 'Contraseña es requerida',
                    v => (v && v.length > 7) || 'Se requieren minimo 8 caracteres',
                    v => /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/.test(v) || 'Contraseña debe contener una letra mayúscula, un carácter numérico y un carácter especial',
                ],
                contra2: null,
                contraRules2: [
                    v => !!v || 'Contraseña es requerida',
                    v => (v && v.length > 7) || 'Se requieren minimo 8 caracteres',
                    v => (!!v && v) === this.frmregistrar.contra || 'Contraseñas deben ser iguales',
                ],
            },
            frmverificar:
            {
                valid: true,
                codigo: String,
                codigoRules: [
                    v => !!v || 'Codigo es requerido',
                ],
            },
            frmverificarSMS:
            {
                valid: true,
                codigo: '',
                codigoRules: [
                    v => !!v || 'Codigo es requerido',
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
            frmrecup:
            {
                valid:false,
            },
            frmmetod:{
                valid:true,
                selectedItem: 3,
                sms:false,
                call: false,
                email:false,
            },
            styleObject: {
                color: 'red',
                fontSize: '13px',
            }

        }
    },
    methods:
    {
        checar() {
           // alert(this.$store.state.auth)

          alert(this.errors.email)
        },
        ///registrar
        buscarCorreo()
        {
            this.$refs.form.validate();
            if(this.frmregistrar.valid && this.frmloguear.correo!=null && this.frmregistrar.nombre!=null )
            {
                this.generarCadena(5);
                this.$inertia.post('bcorreo',{
                    nombre:this.frmregistrar.nombre,
                    correo:this.frmloguear.correo,
                    cadena:this.cadena,
                    _token: this.$page.props.csrf_token,
                },
                {
                    onFinish: () => {
                        if(this.errors.correo==null && this.errors.nombre==null && this.errors.cadena==null){
                            //$('#registrarModal').modal('hide')
                            this.chambiarReg();
                             setInterval(() => {this.cadena=null},1500000)


                        }else{

                        }
                    },
                }
                )
            }
        },
        verifyCorreo()
        {
            let cod1=this.frmverificar.codigo;
            let cod2=this.cadena;
            if(cod1==cod2)
            {
                this.registrar();

            }else
            {
                this.flash('Codigo Incorrecto', 'error', {
                    timeout: 50000,
                });
            }
        },
        chambiarReg()
        {
            if(this.Reg==true){
                this.Reg=false;

            }
            else if(this.Reg==false)
                this.Reg=true;
        },
        ///recuperacion de contra interfaces
        chambiarlogin()
        {
            if(this.login==true){
                this.login=false;
                this.recup=true;
            }
        },
        ingrec(){
            this.login=true;
            this.recupM=false;
        },
        seguirrecup()
        {
            this.errores=false;
            this.$refs.form.validate();
            if(this.frmrecup.valid && this.frmloguear.correo!=null)
            {
                axios.post('bcuenta',{
                    correo:this.frmloguear.correo,
                })
                .then(response => {
                    if(response.status == 200 ){
                        if(this.recup==true){
                            this.recup=false;
                            this.recupM=true;
                            this.datosUs = response.data;
                        }
                    }
                })
                .catch(error => {
                    this.errores=true;
                    console.log(error);
                })

            }
        },
        backrecup()
        {
            if(this.recup==true){
                this.recup=false;
                this.login=true;
            }
        },
        noUs()
        {
            if(this.recupM==true){
                this.recupM=false;
                this.login=true;
            }
        },
        seguirrecupM(){
            switch (this.frmmetod.selectedItem) {
                case 0:
                    this.enviarSMS();
                    break;
                case 1:
                    this.enviarContra();
                    break;
                case 2:
                    this.makeCall();
                    break;
                default:
                    console.log('Opcion no valida');
            }
        },

        loguear()
        {
            this.$refs.form.validate();
            if(this.frmloguear.valid &this.frmloguear.correo!=null)
            {
                this.$inertia.post('login',{
                    email:this.frmloguear.correo,
                    password:this.frmloguear.contra,
                    _token: this.$page.props.csrf_token,
                },
                {
                    onFinish: () => {
                        if(this.errors.email==null){
                            this.$store.dispatch("obtenerUsuario")
                            $('#loginModal').modal('hide')
                            this.limpiarlogin();
                        }else{ }
                    }
                }
                )
            }
        },
        registrar()
        {
            if(this.frmloguear.correo!=null)
            {
                this.$inertia.post('register',{
                    name:this.frmregistrar.nombre,
                    email:this.frmloguear.correo,
                    password:this.frmregistrar.contra,
                    password_confirmation:this.frmregistrar.contra2,
                    _token: this.$page.props.csrf_token,
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

        ///recuperacion de contra solicitudes
        enviarContra()
        {
            if(this.frmloguear.correo!=null)
            {
                this.$inertia.post('/forgot-password',{
                    email:this.frmloguear.correo,
                    _token: this.$page.props.csrf_token,

                },
                {
                    onFinish: () => {
                        if(this.errors.correo==null){
                            this.ingrec();
                            this.flash('Contraseña de recuperacion enviada', 'success', {
                                timeout: 50000,
                            });
                        }else{ }
                    }
                }
                )
            }
        },
        enviarSMS(){
            this.errores=false;
            axios.post('bcelular',{
                cel:this.datosUs.cel,
            })
            .then(response => {
                if(response.status == 200 ){
                    if(this.recupM==true){
                        this.recupM=false;
                        this.recupSMS=true;
                        this.mensaje2 = response.data;

                    }

                }
            })
            .catch(error => {
                this.errores=true;
                console.log(error);
            })
        },
        verificarSMS(){
            this.errores=false;
            axios.post('verifycelular',{
                codigo:this.frmverificarSMS.codigo,
                id:this.datosUs.id,
            })
            .then(response => {
                if(response.status == 200 ){
                    if(this.recupSMS==true){
                        this.$store.dispatch("obtenerUsuario")
                        $('#loginModal').modal('hide')
                        this.limpiarlogin();
                    }
                }
            })
            .catch(error => {
                this.errores=true;
                console.log(error);
            })


        },
        makeCall(){
            this.errores=false;
            axios.post('verifyCall',{
                cel:this.datosUs.cel,
            })
            .then(response => {
                if(response.status == 200 ){

                    alert('Llamada exitosa');

                }
            })
            .catch(error => {
                this.errores=true;
                console.log(error);
            })
        },
        buscarProd(){
            this.$inertia.get('bprod',{
                p:this.frmbuscar.buscar,
            })
        },
        buscarProdA()
        {
            this.$refs.form.validate();
            if(this.frmbuscarAvan.valid & this.frmbuscarAvan.prod!=null & this.frmbuscarAvan.talla!=null & this.frmbuscarAvan.preciomin!=null & this.frmbuscarAvan.preciomax!=null)
            {
                $('#searchModal').modal('hide'),
                this.$inertia.post('bproda',{
                    product:this.frmbuscarAvan.prod,
                    talla:this.frmbuscarAvan.talla,
                    preciomin:this.frmbuscarAvan.preciomin,
                    preciomax:this.frmbuscarAvan.preciomax,
                    _token: this.$page.props.csrf_token,
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
            this.$inertia.post('/logout',{},
                {
                    onFinish: () => {
                        location.reload();
                    }
                }
            )
        },
        generarCadena(num) {
            const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let result1= '';
            const charactersLength = characters.length;
            for ( let i = 0; i < num; i++ ) {
                result1 += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            this.cadena = result1;
        }

    },
    computed: {
        frmvalidlogin () {
                return (
                this.frmloguear.correo &&
                this.frmloguear.contra &&
                this.frmloguear.valid
            )
        },
        frmvalidrecup () {
            return (
                this.frmloguear.correo &&
                this.frmrecup.valid

            )
        },
        frmvalidregistrar () {
            return (
                this.frmloguear.correo &&
                this.frmregistrar.nombre &&
                this.frmregistrar.contra &&
                this.frmregistrar.contra2 &&
                this.frmregistrar.valid  &&
                this.frmregistrar.aceptarTerms
            )
        },
        frmvalidverify () {
            return (
                this.frmverificar.codigo &&
                this.frmverificar.valid
            )
        },
        frmvalidMetod() {
            return (
                this.frmmetod.selectedItem<3 &&
                this.frmmetod.valid
            )
        },
        frmvalidSMS () {
            return (
                this.frmverificarSMS.codigo &&
                this.frmverificarSMS.valid
            )
        },
        celular: function () {
            let cad='';
            cad=this.datosUs.cel;
            return cad.substr(-4);
        },
    },


}
</script>

