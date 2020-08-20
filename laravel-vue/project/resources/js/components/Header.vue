<template>
<nav class="navbar mb-3 navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
    <router-link class="navbar-brand" :to="{name: 'home'}">Navbar</router-link>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <!-- <div class="text-center justify-content-center">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div> -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <router-link class="nav-link btn btn-info btn-sm mr-2" :to="{name: 'category-list'}">Product Category</router-link>
        </li>
        <li class="nav-item active">
            <router-link class="nav-link btn btn-info btn-sm" :to="{name: 'product-list'}"> Product </router-link>
        </li>
        </ul>
    </div>
  </div>
</nav>
</template>