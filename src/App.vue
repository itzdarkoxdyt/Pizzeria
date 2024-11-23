<template>
  <div id="app">
    <header>
      <h1>Pizzería Admin</h1>
      <nav>
        <ul>
          <li><router-link to="/admin/pizzas">Pizzas</router-link></li>
          <li><router-link to="/admin/orders">Órdenes</router-link></li>
        </ul>
      </nav>
    </header>
    <main>
      <router-view></router-view>
    </main>
  </div>
</template>

<style>
#app {
  font-family: Arial, sans-serif;
  margin: 0 auto;
  padding: 20px;
  max-width: 1200px;
}
header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #f4f4f4;
  padding: 10px 20px;
  border-bottom: 2px solid #ddd;
}
nav ul {
  list-style: none;
  display: flex;
  gap: 10px;
}
nav ul li {
  padding: 5px 10px;
}
nav ul li a {
  text-decoration: none;
  color: #333;
}
nav ul li a:hover {
  color: #007BFF;
}
</style>
