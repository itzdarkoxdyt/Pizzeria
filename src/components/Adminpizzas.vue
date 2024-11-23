<template>
  <div>
    <h2>Gestión de Pizzas</h2>
    <button @click="$router.push('/admin/pizzas/create')">Crear Nueva Pizza</button>
    <ul>
      <li v-for="pizza in pizzas" :key="pizza.id">
        {{ pizza.name }} - ${{ pizza.price }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      pizzas: [
        { id: 1, name: 'Margarita', price: 10 },
        { id: 2, name: 'Pepperoni', price: 12 },
      ],
    };
  },
};
</script>

<style>
h2 {
  color: #444;
}
button {
  background-color: #007BFF;
  color: #fff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
}
button:hover {
  background-color: #0056b3;
}
</style>
