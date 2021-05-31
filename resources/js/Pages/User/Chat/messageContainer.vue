<template>
<div>
      <v-responsive
        class="overflow-y-auto"
        max-height="400"
    >
    <div v-for="(message,index) in messages"  :key="index">
        <message-item :message="message" />
    </div>
    </v-responsive>
</div>
</template>

<script>
import messageItem from './messageItem.vue'
export default {
  components: { messageItem },
    props:{
        messages:Object
    },
    data: () => ({
      isActive: false,
    }),

}
</script>
