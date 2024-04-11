<template>
    <div class="d-flex justify-content-center align-items-center min-height-100">
        <div v-if="errors">
            <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
                <p v-for="error in v" :key="error" class="text-sm">
                    {{ error }}
                </p>
            </div>
        </div>
        <form class="center-login" @submit.prevent="login">
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="email"
                       id="form2Example1"
                       class="form-control" placeholder="Email address" v-model="form.email"/>
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password"
                       id="form2Example2"
                       class="form-control" placeholder="Password" v-model="form.password"/>
            </div>

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4 w-100">Sign in</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="#!">Register</a></p>
            </div>
        </form>
    </div>
</template>
<script setup>
import useUser from "@/service/User.js";
import {reactive} from "vue";

const {user, loginUser, errors} = useUser()
const form = reactive({
    email: '',
    password: ''
})

const login = async () => {
    await loginUser({...form})
}
</script>
<style scoped>
.center-login{
    width: 400px;
    margin: 0 auto;
}
.min-height-100{
    min-height: 100vh;
}
</style>
