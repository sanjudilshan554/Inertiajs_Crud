<template>
    <AppLayout>
        <template #content>
            <div>
                <div class="container">
                    <h1 class="text-center">Todo List</h1>
                    <form @submit.prevent="NewTask()">
                        <div class="row">
                            <div class="insert lg col-8">
                                <input type="text" name="title" id="title" v-model="title" class="form-control">
                            </div>
                            <div class="col-4">
                                <input type="submit" value="" class="btn btn-primary">
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">title</th>
                                    <th scope="col">status</th>
                                    <th scope="col">option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
</template>

<script >
import AppLayout from '@/Layouts/App.vue'

export default {

    data() {
        return{
            TodoForm: {
                title: ''
            }
        }  
    },

    components: {
        AppLayout
    },

    methods:{
        async NewTask(){
            try{
                await axios.post(route('Todo.store'),this.TodoForm);
            }catch(error){
                console.log('Error:',error);
            }
            
        }   
    },
    
}
</script>

<style scoped></style>