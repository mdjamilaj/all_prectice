<template>
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between aling-items-center">
                    <h5>Create Product</h5>
                    <router-link :to="{name: 'product-list'}" class="btn btn-primary">Product List</router-link>
                </div>
                <div class="card-body">
                    <form @submit.prevent="createProduct" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Product name</label>
                                    <input v-model="productForm.productName" type="text" class="form-control" name="productName" placeholder="product name"  :class="{ 'is-invalid': productForm.errors.has('productName') }">
                                    <has-error :form="productForm" field="productName"></has-error>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Product Category</label>
                                    <v-select ref="select" v-model="productForm.productCategory" :options="categories" :reduce="user => user.id" :get-option-label="getOptionLabel" :class="{ 'is-invalid': productForm.errors.has('productCategory') }"></v-select>
                                    <has-error :form="productForm" field="productCategory"></has-error>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Product price</label>
                                    <input v-model="productForm.productPrice" type="number" class="form-control" placeholder="category price"  :class="{ 'is-invalid': productForm.errors.has('productPrice') }">
                                    <has-error :form="productForm" field="productPrice"></has-error>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Discount</label>
                                    <input v-model="productForm.discount" type="number" class="form-control" name="name" placeholder="Discount"  :class="{ 'is-invalid': productForm.errors.has('discount') }">
                                    <has-error :form="productForm" field="discount"></has-error>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Product Image</label>
                                    <div v-if="!productForm.file">
                                        <input id="file" type="file" @change="onFileChange" class="form-control pt-1 pb-2">
                                    </div>
                                    <div v-else>
                                        <img :src="productForm.file" height="80px;" width="150px"/>
                                        <button @click="removeImage" class="btn btn-danger mt-5">&#10006;</button>
                                    </div>
                                    <has-error :form="productForm" field="discount"></has-error>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12">
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-success form-control">Create Product</button>
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
import vSelect from "vue-select";
export default {
    data(){
        return {
            productForm: new Form({
                productName: '',
                productCategory: 1,
                discount: '',
                file: '',
            }),
            categories: [],
        }
    },
    components:{
        vSelect
    },
    methods: {
        createProduct(){
            let self = this;
            self.file = document.getElementById('file').files[0].name;
            self.size = document.getElementById('file').files[0].size;

            var formData = this.productForm;
            formData.append('file', file);

            formData.post('/api/product').then(({ data }) => {
                this.categoryForm.productName = '';
                this.categoryForm.productCategory = '';
                this.categoryForm.discount = '';
                this.categoryForm.file = '';

                this.$toast.success({
                    title:'success',
                    message:'Category Create successfully'
                })
                // this.$toast.success('传递字符串作为通知的内容')
            })
        },
        loadCategories(){
            axios.get('/api/category').then(response => {
                this.categories = response.data;
            })
        },
        getOptionLabel (option) {
            return (option && option.name) || ''
        },
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
            },
        createImage(file) {     
            var image = new Image();
            var reader = new FileReader();
            var vm = this;

            reader.onload = (e) => {
                vm.productForm.file = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        removeImage: function (e) {
            this.productForm.file = '';
        },
    },
    mounted(){
        this.loadCategories();
    }
}
</script>