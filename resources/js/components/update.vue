<template>
    <form class="mt-5" @submit.prevent="updateTodo">
        <div class="mb-3 text-center text-uppercase">
                <strong class="form-label">Update todo</strong>
                <div class="alert alert-success" role="alert" v-if="updated">
                    todo updated successfully !
                </div>
        </div>
        <div class="mb-3">
            <label for="Title" class="form-label" v-bind:class=" titleHasError ? 'text-danger' : '' ">Title</label>
            <input type="text" class="form-control" @change="tchange"  v-bind:class=" titleHasError ? 'border-danger' : '' " id="Title" v-model="title" aria-describedby="Title" placeholder="Title">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" v-bind:class=" descHasError ? 'text-danger' : '' ">description</label>
            <textarea class="form-control" @change="dchange"  v-bind:class=" descHasError ? 'border-danger' : '' " v-model="description" id="exampleInputPassword1" placeholder="description"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</template>

<script>
    export default {
        name:"update",
        data:function(){
            return{
                title:"",
                description:"",
                descHasError:false,
                titleHasError:false,
                updated:false
            }
        },
        methods:{
            loadTodo(){
                const id = this.$route.params.id;
                axios.get("api/todos/"+id).then(res=>{
                    this.title = res.data.data.title;
                    this.description = res.data.data.description;
                }).catch(err=>{
                    console.log(err);
                });
            },
            updateTodo(){
                if(this.title && this.description ){
                    
                    const id = this.$route.params.id;
                    axios.put('api/updateTodo/'+id,{ title:this.title,description:this.description }).then(res=>{
                        this.updated=true;
                    }).catch(err=>{
                        console.log(err);
                    })

                }else{
                    if(!this.title){
                        this.titleHasError=true;
                    }else{
                        this.descHasError=true;
                    }
                }
            },
            dchange(){
                this.descHasError=false;
            },
            tchange(){
                this.titleHasError=false;
            }
        },
        created(){
            this.loadTodo();
        }
    }
</script> 