<template>
  <tr>
    <th>
      <input type="text" class="form-control" v-if="editMode" v-model="product.product" />
      <span v-else>{{ product.product }}</span>
    </th>
    <th>
      <input type="text" class="form-control" v-if="editMode" v-model="product.description" />
      <span v-else>{{ product.description }}</span>
    </th>
    <th>
      <input type="number" class="form-control" v-if="editMode" v-model="product.price" />
      <span v-else>$ {{ product.price }}</span>
    </th>
    <td>
      <button class="btn btn-success" @click="onClickUpdate()" v-if="editMode">
        <i class="fas fa-save"></i>
      </button>
      <button class="btn btn-success" @click="onClickEdit()" v-else>
        <i class="fas fa-pen"></i>
      </button>
      <button class="btn btn-danger" @click="onClickDelete()">
        <i class="fas fa-trash-alt"></i>
      </button>
    </td>
  </tr>
</template>

<script>
export default {
  props: ["product"],
  data() {
    return {
      editMode: false
    };
  },
  methods: {
    onClickEdit() {
      this.editMode = true;
    },
    onClickDelete() {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.value) {
          axios.delete(`/products/${this.product.id}`).then(() => {
            this.$emit("delete");
          });
        }
      });
    },
    onClickUpdate() {
      const params = {
        product: this.product.product,
        description: this.product.description,
        price: this.product.price
      };
      axios.put(`/products/${this.product.id}`, params).then(response => {
        this.editMode = false;
        const products = response.data;
        this.$emit("update", products);
      });
      Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Your product has been update",
        showConfirmButton: false,
        timer: 1500
      });
    }
  }
};
</script>
