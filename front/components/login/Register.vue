<template>
     <v-form ref="form">
         <v-text-field
            v-model="login.name"
            label="Nome"
        ></v-text-field>

        <v-text-field
            v-model="login.email"
            label="Email"
            type="email"
        ></v-text-field>

        <v-text-field
            v-model="login.password"
            :append-icon="showPass ? 'mdi-eye' : 'mdi-eye-off'"
            :type="showPass ? 'text' : 'password'"
            name="input-10-1"
            label="Password"
            @click:append="showPass = !showPass"
        ></v-text-field>

        <div class="mt-6">
            <v-btn
                color="error"
                class="mr-4"
                @click="$emit('is-login-page', true)"
            >
                Login
            </v-btn>
    
            <v-btn
                color="warning"
                @click="callRegister"
                >
                Save
            </v-btn>
        </div>
    </v-form>
</template>

<script>
export default {
    layout: 'auth',
    
    data() {
        return {
            loading: false,
            showPass: false,
            login: {
                name: null,
                email: null,
                password: null
            },
        }
    },

    methods: {
        callRegister() {
            

        }
    }
}
</script>
