<template>
  <div class="container">
    <form-component @new="addProduct"></form-component>
    <table class="table mt-3">
      <thead>
        <tr>
          <th scope="col">Product</th>
          <th scope="col">Description</th>
          <th scope="col">Price</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <products-component
          v-for="(product,index) in products"
          :key="product.id"
          :product="product"
          @update="updateProduct(index, ...arguments)"
          @delete="deleteProduct(index)">
          </products-component>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products:[]
    }
  },
  methods: {
    addProduct(product) { 
      this.products.push(product);
    },
    updateProduct(index, product) {
      this.products[index] = product;
    },
    deleteProduct(index) {
      this.products.splice(index, 1);
    }
  },
  mounted() {
    axios.get('/products').then((response) => {
      this.products = response.data;
    })
  }
};
</script>
