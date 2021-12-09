<template>
    <div class="card mt-5">
        <div class="card-header fw-bold text-center">
            Todos List
        </div>
        <div class="card-body py-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th colspan="2">description</th>
                        <th>created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="todo in todos">
                        <th scope="row">{{ todo.id }}</th>
                        <td>{{ todo.title }}</td>
                        <td colspan="2">{{ todo.description }}</td>
                        <td>{{ todo.created_at }}</td>
                        <td>
                            <router-link :to="'/update/'+todo.id"  class="btn btn-success" >Update</router-link>
                            <button class="btn btn-danger" @click="deleteTodo( todo.id ,todo.title )" >Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>


<script>
    export default{
        name:"Home",
        data:function(){
            return{
                todos:[]
            }
        },
        created(){
            this.getTodos();
        },
        methods:{
            getTodos(){
                axios.get("api/todos").then(res=>{
                this.todos = res.data.data
                }).catch(err=>{
                    console.log(err);
                })
            }
            ,
            deleteTodo( id , title ){
                if( confirm('do you want to delete '+title ) ){
                    axios.delete("api/deleteTodo/"+ id).then(res=>{
                        this.getTodos();
                    }).catch(err =>{
                        console.log(err);
                    });
                }else{
                    return;
                }
            }
        }
    }

</script>