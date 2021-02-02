<template>
    <v-app>
        <Head :errors="errors"/>
        <!-- ======= Hero Section ======= -->
          <section id="hero2" style="padding: 45px 0;">
            <div class="hero-container" data-aos="fade-up">

            </div>
        </section>
        <main id="main">

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                            <v-card class="mx-auto" max-width="500" tile>
                                <v-list flat>
                                    <v-header color="success">Carrito</v-header>
                                        <v-divider/>
                                        <v-list-item-group v-model="selectedItem" color="primary">

                                            <v-list-item v-for="(carritoP,index) in carritoProds" :key="index">
                                                <v-list-item-content>
                                                    <v-list-item-title v-text="carritoP.nombre"></v-list-item-title>
                                                    <v-list-item-subtitle v-text="carritoP.precio"></v-list-item-subtitle>
                                                </v-list-item-content>
                                                <v-list-item-action>
                                                    <v-btn  @click="removeProd(index)" icon>
                                                        <v-icon v-icon color="error">mdi-delete</v-icon>
                                                    </v-btn>
                                                </v-list-item-action>
                                            </v-list-item>
                                        </v-list-item-group>
                                </v-list>
                            </v-card>

                    </div>
                </div>
            </div>
        </main>
    <Fotter/>
    </v-app>
</template>
<script>
import Fotter from '../Fotter'
import Head from '../Head'
export default {
    props:['datops','errors'],
    data() {
        return{
            selectedItem: 1,
            search: '',
            carritoProds: [
                {
                    id: 0,
                    nombre:'',
                }
            ],
        }
    },
    mounted() {
    if (localStorage.getItem('carritoProds')) {
      try {
        this.carritoProds = JSON.parse(localStorage.getItem('carritoProds'));
      } catch(e) {
        localStorage.removeItem('carritoProds');
      }
    }
  },
  methods: {
    addProd() {
      // asegurarse que el usuario efectivamente ha escrito algo
      if (!this.newproductoCarrito) {
        return;
      }

      this.carritoProds.push({  id: this.id2++,nombre:this.newproductoCarrito});
      this.newproductoCarrito = '';
      this.saveProd();
    },
    removeProd(x) {
      this.carritoProds.splice(x, 1);
      this.saveProd();
    },
    saveProd() {
      const parsed = JSON.stringify(this.carritoProds);
      localStorage.setItem('carritoProds', parsed);
    }
  },
  components:{
    Head,
    Fotter
  }

}
</script>
