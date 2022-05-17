<template>
  <v-row justify="center" align="center">
    <v-col cols="12" sm="8" md="6">
      <v-card >
        <v-card-title>Login</v-card-title>

        <v-card-text class="py-4 d-flex justify-center">
          <login-form v-if="isLoginPage" @is-login-page="changePage" />

          <login-register v-else @is-login-page="changePage" />
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
export default {
    layout: 'auth',
    
    data() {
        return {
            isLoginPage: true,
        }
    },

    methods: {
        changePage(status) {
            this.isLoginPage = status
        }
    }
}
</script>
