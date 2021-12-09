<template>
    <form class="mt-5" @submit.prevent="addNewTodo">
        <div class="mb-3 text-center text-uppercase">
                <strong class="form-label">Create new Title</strong>
                <div class="alert alert-success" role="alert" v-if="added">
                    new todo added successfully !
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
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</template>

<script>
    export default {
        name:"create",
        data:function(){
            return{
                title:"",
                description:"",
                descHasError:false,
                titleHasError:false,
                added:false
            }
        },
        methods:{
            addNewTodo(){
                if(this.title && this.description ){
                    
                    axios.post('api/addTodo',{title:this.title,description:this.description}).then(res=>{
                        this.added=true;
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
        }
    }
</script> 