<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between aling-items-center">
                         <h5 class="mb-0">Product Categories</h5>
                         <router-link class="btn btn-primary btn-sm" :to="{name: 'create-category'}">Create Category </router-link>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th style="width: 100px"> ID </th>
                                    <th> Name </th>
                                    <th> Slug </th>
                                    <th style="width: 150px"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="category in categories" :key="category.id">
                                    <td style="width: 100px"> {{ category.id }} </td>
                                    <td> {{ category.name }} </td>
                                    <td> {{ category.slug }}</td>
                                    <td style="width: 150px">
                                        <router-link :to="{name: 'edit-category', params: {id: category.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                                        <a @click.prevent="deleteCategory(category)" href="#" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            categories: [],
        }
    },
    methods: {
        loadCategories(){
            axios.get('/api/category').then(response => {
                this.categories = response.data;
            })
        },
        deleteCategory(category){
            axios.delete(`/api/category/${category.id}`).then(() => {
                this.$toast.success({
                    title:'success',
                    message:'Category Delete successfully'
                })
                let index = this.categories.indexOf(category);
                this.categories.splice(index, 1);
            })
        }
    },
    mounted() {
        this.loadCategories();
    }
}
</script>