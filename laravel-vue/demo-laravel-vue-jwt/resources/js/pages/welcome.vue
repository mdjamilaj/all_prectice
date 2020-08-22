<template>
  <div>
    <div class="container mx-auto">
      <carousel :autoplay="true" :items="1" autoHeight="true">
        <img src="/img/banner.jpg" />
        <img src="/img/banner.jpg" />
        <img src="/img/banner.jpg" />
        <img src="/img/banner.jpg" />
        <img src="/img/banner.jpg" />
        <img src="/img/banner.jpg" />
        <img src="/img/banner.jpg" />
        <img src="/img/banner.jpg" />
      </carousel>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import carousel from "vue-owl-carousel";
import axios from "axios";
export default {
  layout: "default",
  components: { carousel },

  metaInfo() {
    return { title: this.$t("home") };
  },
  data: () => ({
    title: "Kmf Gaming Mall",
    products: [],
    blogs: []
  }),

  methods: {
    
  },

  computed: mapGetters({
    authenticated: "auth/check"
  }),
  mounted() {
  }
};
</script>
