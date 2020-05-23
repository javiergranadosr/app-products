<template>
  <form v-on:submit.prevent="newProduct()">
    <div class="row mt-3">
      <div class="col-lg-3">
        <input type="text" class="form-control" placeholder="Product" v-model="product" />
      </div>
      <div class="col-lg-6">
        <input type="text" class="form-control" placeholder="Description" v-model="description" />
      </div>
      <div class="col-lg-2">
        <input type="number" step="0.01" class="form-control" placeholder="Price" v-model="price" />
      </div>
      <div class="col-lg-1">
        <button class="btn btn-success btn-block">
          <i class="fas fa-plus"></i>
        </button>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  data() {
    return {
      product: "",
      description: "",
      price: ""
    };
  },
  methods: {
    newProduct() {
      if (this.product == "" || this.description == "" || this.price == "") {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          confirmButtonText: "Retry",
          text: "Complete blank fields!"
        });
        return false;
      }
      const params = {
        product: this.product,
        price: this.price,
        description: this.description
      };
      axios.post("/products", params).then(response => {
        const product = response.data;
        this.$emit("new", product);
      });
      Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Your product has been saved",
        showConfirmButton: false,
        timer: 1500
      });
    }
  }
};
</script>
