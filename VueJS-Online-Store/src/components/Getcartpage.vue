<template>
  <!--CHECKOUT-->
  <main>
    <div class="basket">
      <div
        class="cashout-container"
        v-for="cartitem in filter"
        :key="cartitem.id"
      >
        <div class="basket-labels">
          <ul>
            <li class="item item-heading storlek">Item</li>
            <li class="price storlek">Price</li>
            <li class="quantity storlek">Quantity</li>
            <li class="subtotal storlek">Total</li>
          </ul>
        </div>

        <!--Produkt start-->

        <div class="basket-product">
          <div class="item">
            <div class="product-image">
              <img :src="cartitem.image" alt="" class="product-frame" />
            </div>
            <div class="product-details">
              <h1>{{ cartitem.title }}</h1>
              <p>
                <strong>{{ cartitem.description }}</strong>
              </p>
            </div>
          </div>
          <div class="price">{{ cartitem.price }} $</div>
          <div class="quantity">
            <p class="price">{{ cartitem.quantity }}</p>
          </div>
          <div class="subtotal">
            {{ Math.round(cartitem.price * cartitem.quantity) }} $
          </div>
          <div class="remove">
            <button class="padd" @click="deleteWholeProduct(cartitem.id)">
              Delete whole product
            </button>
            <button class="padd" @click="increaseQuantity(cartitem)">
              Increase
            </button>
            <button class="padd" @click="decreaseQuantity(cartitem.id)">
              Decrease
            </button>
          </div>
        </div>

        <!--Produkt slut-->
      </div>
      <div class="summary-subtotal">
        <div v-if="cart.length === 0">
          <h3>Your cart is empty</h3>
        </div>
        <div v-if="cart.length > 0" class="subtotal-title">Total</div>
        <div v-if="cart.length > 0" class="subtotal-value">
          <h3>{{ Math.round(sumTotal) }} $</h3>
        </div>
      </div>
      <div class="summary-checkout">
        <button
          v-if="cart.length > 0"
          @click="confirmOrder"
          class="checkout-cta"
        >
          Go to Checkout
        </button>
      </div>
      <Popuporder v-if="orderVisible" @close-order="orderVisible = false" />
    </div>
  </main>
  <!--CHECKOUT SLUT-->
</template>

<script>
import Popuporder from "./Popuporder.vue";

export default {
  name: "Getcartpage",
  components: {
    Popuporder,
  },
  data() {
    return {
      orderVisible: false,
    };
  },
  props: {
    cart: Array,
  },
  methods: {
    confirmOrder() {
      this.orderVisible = true;
    },
    deleteWholeProduct(id) {
      this.$emit("deleteProduct", id);
    },
    increaseQuantity(cartitem) {
      this.$emit("increase", cartitem);
    },
    decreaseQuantity(id) {
      this.$emit("decrease", id);
    },
  },

  computed: {
    filter() {
      const sortedCart = [
        ...new Map(
          this.cart.map((cartitem) => [cartitem.id, cartitem])
        ).values(),
      ];
      for (let product of sortedCart) {
        let count = this.cart.filter((cartitem) => cartitem.id === product.id);
        product.quantity = count.length;
      }

      return sortedCart;
    },
    sumTotal() {
      let total = 0;
      for (let i = 0; i < this.cart.length; i++) {
        total += this.cart[i].price;
      }

      return total;
    },
  },
};
</script>

<style scoped>
.quantity {
  display: flex;
  justify-content: center;
}

a {
  border: 0 none;
  outline: 0;
  text-decoration: none;
}

strong {
  font-weight: bold;
}

.padd {
  color: black;
  padding: 0px 10px;
  text-decoration: none;
}

main {
  display: flex;
  align-items: center;
  flex-direction: column;
}

button {
  color: black;
  padding: 0px 10px;
  text-decoration: none;
}

h1 {
  font-size: 0.75rem;
  font-weight: normal;
  margin: 0;
  padding: 0;
}

input,
button {
  border: 0 none;
  outline: 0 none;
}

button {
  background-color: #666;
  color: #fff;
}

.storlek {
  font-size: 16px;
}

button:hover,
button:focus {
  background-color: #555;
}

.basket-labels,
.basket-product {
  width: 100%;
}

img {
  width: 120px;
  height: 100px;
}

input,
button,
.basket,
.basket-labels,
.item,
.price,
.quantity,
.subtotal,
.basket-product,
.product-image,
.product-details {
  float: left;
}

.cashout-container {
  display: flex;
  align-items: center;
  flex-direction: column;
  font-size: 0.75rem;
  margin: 0 auto;
  overflow: hidden;
  padding: 1rem 0;
  width: 960px;
}

.basket {
  width: 960px;
  padding: 100px 0px;
}

.basket-labels {
  border-top: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
  margin-top: 1.625rem;
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

li {
  color: #111;
  display: inline-block;
  padding: 0.625rem 0;
}

li.price:before,
li.subtotal:before {
  content: "";
}

.item {
  width: 55%;
}

.price,
.quantity,
.subtotal {
  width: 15%;
  font-size: 1.1rem;
}

.subtotal {
  text-align: right;
}

.remove {
  bottom: 1.125rem;
  float: right;
  position: absolute;
  right: 0;
  text-align: right;
  width: 45%;
  color: black;
}

.remove button {
  background-color: transparent;
  color: black;
  float: none;
  text-decoration: underline;
  text-transform: uppercase;
  cursor: pointer;
  font-family: Helvetica, sans-serif;
}

.item-heading {
  padding-left: 3rem;
}

.basket-product {
  border-bottom: 1px solid #ccc;
  padding: 1rem 0;
  position: relative;
}

.product-image {
  width: 35%;
}

.product-details {
  width: 65%;
}

.product-frame {
  border: 1px solid #aaa;
}

.product-details {
  padding: 0 1.5rem;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.quantity-field {
  background-color: rgb(248, 221, 196);
  border: 1px solid #aaa;
  border-radius: 4px;
  font-size: 0.625rem;
  padding: 2px;
  width: 3.75rem;
}

.summary-subtotal {
  border-top: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
  margin: 1rem 0;
  overflow: hidden;
  padding: 0.5rem 0;
}

.summary-subtotal {
  border-top: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
  margin: 1rem 0;
  overflow: hidden;
  padding: 0.5rem 0;
}

.subtotal-title,
.subtotal-value {
  color: #111;
  float: left;
  width: 50%;
}

.subtotal-value {
  color: #111;
  float: left;
  width: 50%;
}
.amount-in-basket {
  display: flex;
}
.subtotal-value-off {
  padding-left: 350px;
}

.summary-delivery {
  padding-bottom: 3rem;
}

.subtotal-value {
  text-align: right;
}

.summary-checkout {
  display: flex;
  justify-content: flex-end;
}

.checkout-cta {
  display: flex;
  float: none;
  font-size: 0.75rem;
  text-align: center;
  text-transform: uppercase;
  padding: 0.625rem 0;
  width: 50%;
  background-color: #0096db;
  align-items: center;
  justify-content: center;
}

@media screen and (max-width: 640px) {
  .basket,
  .summary,
  .item,
  .remove {
    width: 100%;
  }
  .basket-labels {
    display: none;
  }

  .item {
    margin-bottom: 1rem;
  }
  .product-image {
    width: 40%;
  }
  .product-details {
    width: 60%;
  }
  .price,
  .subtotal {
    width: 33%;
  }
  .quantity {
    text-align: center;
    width: 34%;
  }
  .quantity-field {
    float: none;
  }
  .remove {
    bottom: 0;
    text-align: left;
    margin-top: 0.75rem;
    position: relative;
  }
  .remove button {
    padding: 0;
  }
  .summary {
    margin-top: 1.25rem;
    position: relative;
  }
}

@media screen and (max-width: 960px) {
  main {
    width: 100%;
  }
  .product-details {
    padding: 0 1rem;
  }
}
</style>
