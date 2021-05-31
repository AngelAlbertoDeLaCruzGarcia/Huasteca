<template>
  <div style="margin-bottom:20px;">
    <v-card class="mx-auto" color="success" dark max-width="900"
        v-if="message.user.name===this.$store.state.datosUsuario.name">
        <v-card-text class="headline font-weight-bold">
        {{message.message}}
        </v-card-text>

        <v-card-actions>
            <v-list-item class="grow">
                <v-list-item-avatar color="grey darken-3">
                    <v-img class="elevation-6" :src="`${message.user.profile_photo_url}`"/>
                </v-list-item-avatar>
                <v-list-item-content>
                    <v-list-item-title>
                        Tú
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-card-actions>
    </v-card>

    <v-card class="mx-left " color="info" dark max-width="900" v-if="message.user.name!==this.$store.state.datosUsuario.name">
        <v-card-text class="headline font-weight-bold">
        {{message.message}}
        </v-card-text>

        <v-card-actions>
            <v-list-item class="grow">
                <v-list-item-avatar color="grey darken-3">
                    <v-img class="elevation-6" :src="`${message.user.profile_photo_url}`"/>
                </v-list-item-avatar>
                <v-list-item-content>
                    <v-list-item-title>
                        {{message.user.name}}

                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-card-actions>
    </v-card>

  </div>
</template>

<script>
export default {
    props:['message'],

}
</script>
