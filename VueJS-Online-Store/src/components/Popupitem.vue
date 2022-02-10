<template>
  <div class="parent-popup">
    <div id="popup-content">
      <button class="close" @click="onClose()">X</button>
      <h1>{{ product.title }}</h1>
      <img
        class="bildpopup"
        :src="product.image"
        width="250px"
        height="300px"
        :id="product.id"
        :key="product.id"
      />
      <div>
        <h4 class="beskriv">Description</h4>
        <p id="popup-desc">
          {{ product.description }}
        </p>
        <button class="knappen" @click="sendProductToCart()">Add item</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Popupitem",

  props: {
    product: Object,
  },
  methods: {
    onClose() {
      this.$emit("close-Popup");
    },
    sendProductToCart() {
      this.$emit("send-Product");
    },
  },
};
</script>

<style scoped>
/* POPUP */

.parent-popup {
  display: flex;
  align-items: center;
  justify-content: center;
}

.bildpopup {
  padding-top: 10px;
}

#popup-content {
  display: block;
  background: rgb(255, 255, 255);
  width: 500px;
  padding: 20px;
  position: fixed;
  border: 2px solid rgb(172, 169, 169);
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  font-family: Helvetica, sans-serif;
}

.beskriv {
  padding: 10px 0px;
  font-size: 20px;
}

.knappen {
  padding: 13px 25px;
  background-color: antiquewhite;
  color: black;
  margin: 20px 0px;
}

.close {
  padding: 10px 15px;
  background-color: antiquewhite;
  color: black;
  margin: 20px 0px;
}

.popUp {
  display: block;
  width: 300px;
  height: 300px;
  border: 2px solid rgb(0, 0, 0);
}
</style>
