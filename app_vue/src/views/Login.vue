<template>
  <div class="about">
    <h1>This is an login page</h1>
      <div @click="test">klik</div>
      <form action="http://127.0.0.1:8000/api/login" method="post">
          <input type="text" name="username" v-model="username">
          <input type="password" name="password" v-model="password">
          <button type="button" @click="login">Prijava</button>
      </form>
  </div>
</template>
<script>
import axios from 'axios';
import $router from "lodash";
export default {
    name: 'Login',
    data() {
        return {
            username: null,
            password: null
        }
    },
    methods: {

        test() {
            axios
                .post('http://127.0.0.1:8000/api/test', {ime: 'jole', prezime: 'jovanovic'})
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        login() {
            axios
                .post('http://127.0.0.1:8000/api/login', {username: this.username, password: this.password})
                .then(response => {
                    console.log(response.data);
                    localStorage.setItem('token', response.data.token);
                    this.$router.push('/targets');
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }

}
</script>

