<template>
    <div>
        <div class="container" v-if="state === 0">
            <p v-for="project in projects_data">
                {{project.project_name}}
                <user-component v-on:update-user="updateUser" v-bind:user="project.user"></user-component>
                <button class="btn btn-danger" @click="changeState(1, project.user)">State change</button>

            </p>

        </div>
        <div class="container" v-if="state === 1">
            <h1>Neuer State</h1>
            <user-component v-bind:user="state_user"></user-component>
            <button class="btn btn-danger" @click="changeState(0)">State change</button>
        </div>
    </div>
</template>
<script>
    import UserComponent from "./UserComponent";

    export default {
        components: {UserComponent},
        props: {
            projects: []
        },
        data() {
            return {
                projects_data: [],
                state: 0,
                state_user: {}
            }
        },
        mounted() {
            this.projects_data = this.projects;
            this.state = 0;
        },
        methods: {
            updateUser(user) {
                axios.get('/api/projects').then((result) => {
                    this.projects_data = result.data.data;
                });
            },
            changeState(newState, newUser) {
                this.state = newState;
                this.state_user = newUser;
            }
        }
    }
</script>