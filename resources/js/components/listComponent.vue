<template>
    <div class="container">
        <form @submit.prevent="addItem">
            <input type="text" v-model="newItem" class="form-control mb-2">
            <input type="text" v-model="newPrice" class="form-control mb-2">
            <input type="submit" name="submit" value="submit" class="btn btn-primary mb-2">
        </form>
        <div id="app">
            <ul class="list-group">
                <li class="list-group-item" v-for="list in lists">{{list.name}}: {{list.price}}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                lists: [
                    {name:'Toyota', price:200000},
                    {name:'Corolla', price:303200},
                    {name:'Alien', price:288000},
                    {name:'Prado', price:435000}
                ],
                newItem:''
            }
        },

        methods:{
            addItem(){
                this.lists.push({
                    name: this.newItem,
                    price: this.newPrice
                })
            }
        }

    }
</script>
