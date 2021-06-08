<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">JosdeDaus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item" v-if="!isAuthenticated">
                <router-link
                    class="nav-link"
                    data-toggle="collapse"
                    :to="{name: 'login'}"
                >
                    Loging
                </router-link>
            </li>
            <template v-else>
                <li class="nav-item">
                    <router-link
                        class="nav-link"
                        data-toggle="collapse"
                        :to="{name: 'index'}"
                    >
                        Index
                    </router-link>
                </li>
                <li class="nav-item" v-on:click="logout">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </template>
            </ul>
            <span class="navbar-text">
               {{ username }}
            </span>
        </div>
    </nav>
    <div class="container">
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isAuthenticated: false,
            username: ''
        }
    },
    watch: {
        $route() {
            if (localStorage.getItem('token'))
                this.isAuthenticated = true
            else {
                this.isAuthenticated = false
                this.$router.push({name: 'login'})
            }
            if (localStorage.getItem('username'))
                this.username = localStorage.getItem('username')
            else
                this.username = ''
        }
    },
    methods: {
        logout() {
            axios.defaults.headers.common = {
                Authorization: "Bearer " + localStorage.getItem("token")
            };
            axios.post('/api/logout').then(() => {
                localStorage.removeItem('token')
                localStorage.removeItem('username')
                this.$router.push({name: 'login'})
            });
        }
    }
}
</script>