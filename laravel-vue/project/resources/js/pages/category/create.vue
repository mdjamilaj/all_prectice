<template>
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between aling-items-center">
                    <h5>Create Category</h5>
                    <router-link :to="{name: 'category-list'}" class="btn btn-primary">Category List</router-link>
                </div>
                <div class="card-body">
                    <form @submit.prevent="createCategory">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Category name</label>
                                    <input v-model="categoryForm.name" type="text" class="form-control" name="name" placeholder="category name"  :class="{ 'is-invalid': categoryForm.errors.has('name') }">
                                    <has-error :form="categoryForm" field="name"></has-error>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-success">Create Category</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Form } from 'vform'
export default {
    data(){
        return {
            categoryForm: new Form({
                name: '',
            }),
        }
    },
    methods: {
        createCategory(){
            this.categoryForm.post('/api/category').then(({ data }) => {
                this.categoryForm.name = '';
                this.$toast.success({
                    title:'success',
                    message:'Category Create successfully'
                })
                // this.$toast.success('传递字符串作为通知的内容')
            })
        }
    }
}
</script>