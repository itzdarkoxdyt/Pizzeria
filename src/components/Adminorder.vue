<template>
  <div>
    <h2>Gestión de Órdenes</h2>
    <ul>
      <li v-for="order in orders" :key="order.id">
        Orden #{{ order.id }} - Estado: {{ order.status }}
        <button @click="updateStatus(order.id)">Actualizar Estado</button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      orders: [
        { id: 1, status: 'Pendiente' },
        { id: 2, status: 'En preparación' },
      ],
    };
  },
  methods: {
    updateStatus(id) {
      console.log('Actualizar estado para orden:', id);
    },
  },
};
</script>

<style>
ul {
  list-style: none;
}
button {
  background-color: #ffc107;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
}
button:hover {
  background-color: #e0a800;
}
</style>
