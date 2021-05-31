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
                                <v-card>
                                    <div v-if="this.$store.state.auth">
                                        <message-container :messages="messages"/>
                                        <input-message :room="currentRoom"
                                            v-on:messagesent="getMessages()"
                                        />
                                    </div>
                                    <div v-if="!this.$store.state.auth">
                                        <h1 style="padding:30%;">Necesitas Iniciar Sesion</h1>
                                    </div>

                                </v-card>
                            </div>
                        </div>

                    </div>
            </section>

        </main>
        <Fotter/>
    </v-app>
</template>

<script>
import inputMessage from './inputMessage'
import messageContainer from './messageContainer'
import Fotter from '../Fotter'
import Head from '../Head'
export default {
    metaInfo: { title: 'Chat' },
    ///props:['prods'],
    props:{
        errors: Object,
    },
    data () {
      return {
          chatRooms:[],
          currentRoom:[],
          messages:[],

      }
    },

    methods: {
        getRooms(){
            axios.get('/chat/rooms')
            .then( response => {
                this.chatRooms = response.data;
                this.setRoom(response.data[0]);
            })
            .catch( error => {
                console.log(error);
            })
        },
        setRoom(room){
            this.currentRoom= room;
            this.getMessages();
        },
        getMessages:function(){
                axios.get('/chat/room/'+this.currentRoom.id+'/messages')
                .then( response => {
                    this.messages = response.data;
                })
                .catch( error => {
                    console.log(error);
                })

        },
                mensaje:function(){

        alert("hola desde javascript");

        }
    },
    created(){
        this.getRooms();
        setInterval(() => {this.getMessages()},5000)
        //setInterval(this.mensaje(),3000);
    },

    components: {
        Fotter,
        Head,
        inputMessage,
        messageContainer
    },
}
</script>

