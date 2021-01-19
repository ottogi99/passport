<template>
    <v-alert type="warning" :value="true">      
      Vuetify was installed properly {{ currentUser }}
      <user-list :current-user="currentUser" @updatedChatWith="updateChatWith"></user-list>

      <div v-if="withOppenent">
        <user-area></user-area>
      </div>
      <div v-else>
        <input type="text"/>
      </div>
    </v-alert>
</template>

<script>
import UserList from './UserList'
import UserArea from './UserArea'

export default {
  name: "MyVuetify",
  props: {
    currentUser: {
      type: Number,
      required: true,
    }
  },

  components: {
    UserList,
    UserArea
  },

  data () {
    return {
      withOppenent: null,
    }
  },

  mounted () {
      console.log('MyVuetify Component mounted.')
  },

  methods: {
    updateChatWith (value) {
      console.log(`emitted updateChatwith: ${value}`);
      this.withOppenent = value;
    }
  }
};
</script>