<template>
<v-app>
        <Head :errors="errors"/>
        <!-- ======= Hero Section ======= -->
          <section id="hero2" style="padding: 45px 0;">
            <div class="hero-container" data-aos="fade-up">

            </div>
        </section>




        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1>Aviso de privacidad</h1>
                    <p>La presente Política de Privacidad explica como “Indumentarias típicas de las Huastecas” con Domicilio en la Colonia Parque de Poblamiento Solidaridad Calle Poniente 6 esq Avenida Central M-U L-1, es responsable de recabar sus datos personales, del uso que se le dé a los mismos y de su protección.</p>
                    <p>Su información personal será utilizada para proveer los servicios y productos que ha solicitado, informarle sobre cambios en los mismos y evaluar la calidad del servicio que le brindamos. Para las finalidades antes mencionadas, requerimos obtener los siguientes datos personales: datos de la tarjeta de crédito con la cual se realizara el proceso de compra , datos personales como el peso, la estatura, edad, medidas y sus preferencias, considerado como sensible según la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, Tarjetas de crédito y domicilio .</p>
                    <p>Usted tiene derecho de acceder, rectificar y cancelar sus datos personales, así como de oponerse al tratamiento de los mismos o revocar el consentimiento que para tal fin nos haya otorgado, a través de los procedimientos que hemos implementado. Para conocer dichos procedimientos, los requisitos y plazos, se puede poner en contacto con nuestro departamento de datos personales en  el correo electrónico induHuastecas@huasteca.com o visitar nuestra sitio web “Indumentarias típicas de las Huastecas”.
                    Asimismo, le informamos que sus datos personales no serán  transferidos ni  tratados dentro ni fuera del país, por personas distintas a esta empresa. Indumentarias típicas de las Huastecas, es el único responsable del manejo de sus datos personales.
                    Si usted desea dejar de recibir mensajes promocionales de nuestra parte puede solicitarlo a través del correo electrónico: induHuastecas@huasteca.com.</p>
                        Consiento que mis datos personales sean transferidos en los términos que señala el presente aviso de privacidad.
                        Acepto recibir mensajes promocionales vía correo electrónico.
                    Para más información con respecto a nosotros o alguna duda respecto a nuestro aviso de privacidad, favor de contactar por  llamada a la Ing. Ana Itzel Miranda Hernández con el numero de 7717007476 o por medio de un correo electrónico  al correo  induHuastecas@huasteca.com.
                    Cualquier modificación a este aviso de privacidad podrá consultarla en nuestro sitio web.
                    <strong>Fecha última actualización [20/Septiembre/2020]</strong>
                    <p></p>
                    <h1 class="">Cookies</h1>
                    <p>Las cookies son archivos de texto que son descargados automáticamente y almacenados en el disco duro del equipo de cómputo del usuario al navegar en una página de Internet específica, que permiten recordar al servidor de Internet algunos datos sobre este usuario, entre ellos, sus preferencias para la visualización de las páginas en ese servidor, nombre y contraseña.</p>
                    <p>Utilizamos los siguientes tipos de cookies en nuestros Servicios:</p>
                    <ul>
                        <li>• &nbsp;&nbsp;Cookies estrictamente necesarias. Estas cookies son esenciales porque le permiten utilizar nuestros Servicios. Estas cookies no recopilan información sobre usted con fines de marketing. Esta categoría de cookies es esencial para que nuestros Servicios funcionen y no se pueden desactivar.</li>
                        <br>
                        <li>• &nbsp;&nbsp;Cookies funcionales. Utilizamos cookies funcionales para recordar sus elecciones, de modo que podamos adaptar nuestros Servicios para proporcionarle funciones mejoradas y contenido personalizado. </li>
                        <br>
                        <li>• &nbsp;&nbsp;Cookies de rendimiento o analíticas. Estas cookies recopilan información pasiva sobre cómo utiliza nuestros Servicios, incluidas las páginas web que visita y los enlaces en los que pulsa. Utilizamos la información recopilada por dichas cookies para mejorar y optimizar nuestros Servicios. </li>
                        <br>
                        <li>• &nbsp;&nbsp;Cookies publicitarias o de orientación. Estas cookies se utilizan para hacer que los mensajes publicitarios sean más relevantes para usted. Realizan funciones como evitar que el mismo anuncio reaparezca continuamente, asegurando que los anuncios se muestren correctamente para los anunciantes y, en algunos casos, seleccionando anuncios basados en sus intereses. </li>
                    </ul>
                    <p>Le informamos que utilizamos cookies y web beacons para obtener información personal de usted, como la siguiente:</p>
                    <ul>
                        <li>• &nbsp;&nbsp;Su tipo de navegador y sistema operativo.</li>
                        <li>• &nbsp;&nbsp;Las páginas de Internet que visita.</li>
                        <li>• &nbsp;&nbsp;Los vínculos que sigue.</li>
                        <li>• &nbsp;&nbsp;La dirección IP.</li>
                        <li>• &nbsp;&nbsp;El sitio que visitó antes de entrar al nuestro. </li>
                        <li>• &nbsp;&nbsp;Estas cookies y otras tecnologías pueden ser deshabilitadas</li>
                        <li>• &nbsp;&nbsp;Para conocer cómo hacerlo, consulte el siguiente vínculo o dirección electrónica</li>
                    </ul>


                </div>
            </div>
        </div>


        <Fotter/>
    </v-app>
</template>

<script>

import Fotter from './Fotter'
import Head from './Head'
//import Pagination from '@/Layouts/Pagination'

export default {
    metaInfo: { title: 'Inicio' },
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
