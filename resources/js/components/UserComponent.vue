<template>
    <div class="form-group">
        <label for="name">Benutzername</label>
        <input type="text" name="name" v-model="user.name" />
        <button class="btn btn-success" v-on:click="saveUser()">Speichern</button>
    </div>
</template>
<script>
    export default{
        props: {
            user: {}
        },
        data() {
            return {
                user_data: {}
            }
        },
        methods: {
            saveUser() {
                let self = this;
                axios.post('/api/user', this.user).then((result) => {
                    self.user_data = result.data.data;
                    this.$emit('update-user', self.user_data);
                });
            },
        }


    }
</script>