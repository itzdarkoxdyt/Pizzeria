<template>
  <div>
    <h2>Crear Nueva Pizza</h2>
    <form @submit.prevent="savePizza">
      <div>
        <label for="name">Nombre:</label>
        <input id="name" v-model="pizza.name" required />
      </div>
      <div>
        <label for="price">Precio:</label>
        <input id="price" type="number" v-model="pizza.price" required />
      </div>
      <button type="submit">Guardar</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      pizza: { name: '', price: 0 },
    };
  },
  methods: {
    savePizza() {
      console.log('Pizza guardada:', this.pizza);
      this.$router.push('/admin/pizzas');
    },
  },
};
</script>

<style>
form div {
  margin-bottom: 10px;
}
label {
  display: block;
  margin-bottom: 5px;
}
input {
  padding: 5px;
  width: 100%;
}
button {
  background-color: #28a745;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}
button:hover {
  background-color: #218838;
}
</style>
