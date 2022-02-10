<template>
  <div class="galleryContainer">
    <div class="products">
      <ul class="main-ul-products">
        <li
          class="product-li-class"
          v-for="product in cartGallery"
          :key="product.test"
        >
          <img
            @click="getPopupDetails(product)"
            :src="product.image"
            :id="product.id"
            class="imgMain-products"
          />
          <h1 class="product-name">{{ product.title }}</h1>
          <p class="price-item">{{ product.price }} $</p>
          <button @click="sendToCartFromGallery(product)" class="btn-product">
            Add item
          </button>
        </li>
      </ul>
    </div>

    <Popupitem
      :product="clickedProduct"
      @send-Product="$emit('send-Product')"
      @close-Popup="showPopup = false"
      v-if="showPopup"
    />
  </div>
</template>

<script>
export default {
  name: "Getgallery",
  components: {
    Popupitem: () => import("./Popupitem.vue"),
  },
  data() {
    return {
      showPopup: false,
      searchedTitle: "",
    };
  },
  props: {
    cartGallery: Array,
    clickedProduct: Object,
  },
  methods: {
    getPopupDetails(product) {
      this.showPopup = true;
      this.$emit("get-Popupdetails", product);
    },

    sendToCartFromGallery(product) {
      this.$emit("sendToCartFromGallery", product);
    },
  },
};
</script>

<style scoped>
/*responsive*/
@media (max-width: 1200px) {
  .main-ul-products {
    grid-template-columns: 50% 50%;
  }
}

@media (max-width: 767px) {
  .footer-col {
    width: 50%;
    margin-bottom: 30px;
  }
}
@media (max-width: 574px) {
  .footer-col {
    width: 100%;
  }
}

/*********************************/
/* Products */
/*********************************/

.select {
  margin-top: 1rem;
  display: flex;
  align-items: center;
  justify-content: center;
}

.category {
  margin-left: 50%;
}

.product-name {
  font-size: 22px;
  text-align: center;
  width: 250px;
}

.galleryContainer {
  display: block;
  justify-content: center;
  margin: 0rem 23rem;
}

.main-ul-products {
  display: grid;
  grid-template-columns: 20rem 20rem 20rem;

  column-gap: 1rem;
  row-gap: 1rem;
  justify-content: center;
  margin-top: 2rem;
}

.imgMain-products {
  height: 170px;
  width: 170px;
}

.product-name {
  font-size: 1.2rem;
  margin-top: 1.5rem;
}

.product-li-class {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  border: 1px solid rgb(0, 0, 0);
  height: 100%;
  border-radius: 10px;
}

.description-item {
  font-size: 1.2rem;
}

.btn-product {
  background-color: antiquewhite;
  color: black;
  height: 35px;
  width: 110px;
  border: 1px solid black;
}

.main-ul {
  display: flex;
  text-decoration: none;
  list-style: none;
  gap: 0.2rem;
}

/*********************************/
/* KORT */
/*********************************/

.price-item {
  color: grey;
  font-size: 30px;
  padding: 10px 0px;
}

.padd {
  padding: 10px 0px 0px 0px;
}

.card button:hover {
  opacity: 0.7;
}
</style>
