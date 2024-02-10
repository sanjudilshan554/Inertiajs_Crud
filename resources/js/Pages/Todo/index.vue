<template>
    <AppLayout>
        <template #content>
            <div>
                <div class="container">
                    <h1 class="text-center">Todo List</h1>
                    <form @submit.prevent="NewTask()">
                        <div class="row">
                            <div class="insert lg col-8">
                                <input type="text" name="title" id="title" v-model="TodoForm.title" class="form-control">
                            </div>
                            <div class="col-4">
                                <input type="submit" value="" class="btn btn-primary">
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">title</th>
                                    <th scope="col">
                                        
                                    </th>
                                    <th scope="col">option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(task, index) in tasks">
                                    <td scope="col">{{ ++index }}</td>
                                    <td scope="col">{{ task.title }} </td>
                                    <td scope="col">
                                        <span v-if="task.status == 1" class="badge bg-success">completed</span>
                                        <span v-else class="badge bg-secondary" >not completed</span>
                                    </td>
                                    <td scope="col">
                                        <button class="btn btn-danger fa fa-trash m-1"
                                            @click="deleteTodo(task.id)"></button>
                                        <button type="button" class="btn btn-primary btn btn-primary fa fa-pencil m-1"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                            @click="editTodo(task.id)">
                                        </button>
                                        <button class="btn btn-warning fa fa-check m-1" @click="status(task.id)">
                                        </button>
                                        <a href="" class="btn btn-dark fa fa-arrow-down m-1"></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="updateTodo(task_id)">
                            <div class="row">
                                <div class="insert lg col-8">
                                    <input type="text" name="title" id="title" v-model="TodoForm.title"
                                        class="form-control">
                                </div>
                                <div class="col-4">
                                    <input type="submit" value="update" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script >
import AppLayout from '@/Layouts/App.vue'
import axios from 'axios';

export default {

    data() {
        return {
            TodoForm: {
                title: ''
            },
            tasks: [],

            updateTododata: {
                title: '',
            }
        }
    },

    created() {
        this.getTodo();
    },

    components: {
        AppLayout
    },

    methods: {
        async NewTask() {
            try {
                const respones = await axios.post(route('Todo.store'), this.TodoForm);
                this.getTodo();

                this.TodoForm.title='';
            } catch (error) {
                console.log('Error:', error);
            }

        },

        async getTodo() {
            try {
                const response = await axios.get(route('data'));
                this.tasks = response.data;
            } catch (error) {
                console.log('Error:', error);
            }
        },

        async deleteTodo(id) {
            try {
                await axios.get(route('todo.delete', id));
                this.getTodo();
            } catch (error) {
                console.log('Error:', error);
            }

        },

        async editTodo(id) {
            try {
                const response = await axios.get(route('todo.edit', id));
                this.TodoForm.title = response.data.title;
                this.task_id = response.data.id;
            } catch (error) {
                console.log('Error:', error);
            }

        },

        async updateTodo(id) {
            try {
                const update = await axios.post(route('todo.update', id), this.TodoForm);
                console.log(update);
                this.getTodo();
            } catch (error) {
                console.log('Error:', error);
            }
        },

        async status(id) {
            try {
                await axios.post(route('todo.status', id));
                this.getTodo();
            } catch (error) {
                console.log('Error:', error);
            }
        }
    },

}
</script>

<style scoped></style>