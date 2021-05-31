<template>
<div>
    <v-text-field
        v-model="message"
        :append-outer-icon="message ? 'mdi-send' : 'mdi-microphone'"
        clear-icon="mdi-close-circle"
        clearable
        label="Escribe un mensaje...."
        type="text"
        @click:append-outer="sendMessage"
        @click:clear="clearMessage"
        @keyup.enter="sendMessage"
    />
</div>
</template>

<script>
export default {
    props:['room'],
    data: () => ({
      message: null,
      iconIndex: 0,

    }),

    computed: {
      icon () {
        return this.icons[this.iconIndex]
      },
    },

    methods: {
      sendMessage ()
      {
            if(this.message!=null){
                axios.post('chat/room/'+ this.room.id +'/message',{
                    message: this.message
                })
                .then(response => {
                    if(response.status == 201 ){
                        this.clearMessage();
                        this.resetIcon();
                        this.$emit('messagesent');
                    }
                })
                .catch(error => {
                    console.log(error);
                })

            }
            return;
      },
      clearMessage () {
        this.message = ''
      },
      resetIcon () {
        this.iconIndex = 0
      },

    },

}
</script>
