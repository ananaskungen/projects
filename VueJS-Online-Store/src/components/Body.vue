<template>
  <div id="app">
    <div class="header-image">
      <a @click="goToGallery" href="#"
        ><img
          src="https://i.ibb.co/jrpR7f0/logo.png"
          class="loga"
          alt="logo"
          border="0"
      /></a>

      <div class="searchbar">
        <input
          class="main-search"
          type="text"
          name="search"
          placeholder="Search item..."
          v-model="textSearch"
          @keyup.enter="searchProduct(textSearch)"
          v-if="galleryVisible"
        />
      </div>

      <div>
        <button class="button-sort" @click="goToCart">
          Cart ({{ cart.length }})
        </button>
        <button class="button-sort" @click="emptyCart">Empty cart</button>
        <button class="button-sort" @click="goToContact">Contact us</button>
      </div>
    </div>

    <div class="navbar-div" v-if="galleryVisible">
      <ul class="main-ul">
        <li class="main-li-categories">
          <button class="button-sort" @click="filterByCategory('showAll')">
            Show all
          </button>
        </li>
        <li class="main-li-categories">
          <button class="button-sort" @click="filterByCategory('electronics')">
            Electronics
          </button>
        </li>
        <li class="main-li-categories">
          <button class="button-sort" @click="filterByCategory('jewelery')">
            Jewelery
          </button>
        </li>
        <li class="main-li-categories">
          <button
            class="button-sort"
            @click="filterByCategory('men\'s clothing')"
          >
            Men's clothing
          </button>
        </li>
        <li class="main-li-categories">
          <button
            class="button-sort"
            @click="filterByCategory('women\'s clothing')"
          >
            Women's clothing
          </button>
        </li>
      </ul>

      <div class="sortBtn" v-if="galleryVisible">
        <button class="sort-Btn" @click="lowToHigh">Price: Low to High</button>
        <button class="sort-Btn" @click="highToLow">Price: High to Low</button>
      </div>
    </div>

    <Getcartpage
      :cart="cart"
      v-if="cartVisible"
      @decrease="deleteFromCart"
      @increase="increaseToCart"
      @deleteProduct="removeItemsFromCart"
    />
    <Getgallery
      :clickedProduct="clickedProduct"
      :cartGallery="cartGallery"
      v-if="galleryVisible"
      @send-Product="pushProductFromPopup"
      @sendToCartFromGallery="pushProductToCart"
      @get-Popupdetails="setClickedProduct"
    />
    <Contactus v-if="contactVisible" />

    <section>
      <footer class="footer">
        <div class="fot-container">
          <div class="row">
            <div class="footer-col">
              <h4>What we do</h4>
              <ul>
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">privacy policy</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>Get help</h4>
              <ul>
                <li><a href="contact.html">Contact us</a></li>
                <li><a href="#">Shipping</a></li>
                <li><a href="#">Return</a></li>
                <li><a href="#">Order status</a></li>
                <li><a href="#">Payments</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>online shop</h4>
              <ul>
                <li><a href="#">Electronics</a></li>
                <li><a href="#">Jewelery</a></li>
                <li><a href="#">Men's clothing</a></li>
                <li><a href="#">Women's clothing</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </section>
  </div>
</template>

<script>
import Getgallery from "./Getgallery.vue";
import Getcartpage from "./Getcartpage.vue";
import Contactus from "./Contactus.vue";

export default {
  name: "Body",
  components: {
    Getgallery,
    Getcartpage,
    Contactus,
  },
  data() {
    return {
      cart: [],
      cartGallery: [],
      Showallcart: [],
      clickedProduct: null,
      galleryVisible: true,
      cartVisible: false,
      contactVisible: false,
      textSearch: "",
      indexToDelete: null,
    };
  },
  methods: {
    goToCart() {
      this.cartVisible = true;
      this.galleryVisible = false;
      this.contactVisible = false;
    },
    goToContact() {
      this.contactVisible = true;
      this.cartVisible = false;
      this.galleryVisible = false;
    },
    goToGallery() {
      this.contactVisible = false;
      this.cartVisible = false;
      this.galleryVisible = true;
    },

    pushProductFromPopup() {
      this.cart.push(this.clickedProduct);
    },
    pushProductToCart(product) {
      this.cart.push(product);
    },
    setClickedProduct(product) {
      this.clickedProduct = product;
    },
    filterByCategory(category) {
      if (category === "showAll") {
        this.cartGallery = this.Showallcart;
        return;
      }

      this.cartGallery = this.Showallcart.filter((product) => {
        return product.category === category;
      });
    },
    lowToHigh() {
      this.cartGallery.sort(function (lowest, highest) {
        return lowest.price - highest.price;
      });
    },
    highToLow() {
      this.cartGallery.sort(function (lowest, highest) {
        return highest.price - lowest.price;
      });
    },

    searchProduct(textSearch) {
      this.cartGallery = this.Showallcart.filter((product) => {
        return product.title.includes(textSearch);
      });
    },

    emptyCart() {
      this.cart = [];
    },

    deleteFromCart(id) {
      this.indexToDelete = this.cart.findIndex((c) => c.id == id);
      if (this.indexToDelete != -1) {
        this.cart.splice(this.indexToDelete, 1);
      }
    },

    removeItemsFromCart(id) {
      this.cart = this.cart.filter((c) => c.id !== id);
    },
    increaseToCart(cartitem) {
      this.cart.push(cartitem);
    },
  },
  created() {
    fetch("https://fakestoreapi.com/products/")
      .then((res) => res.json())
      .then((json) => (this.Showallcart = this.cartGallery = json));
  },
};
</script>

<style scoped>
/**********************************/
/* HEADER */
/*********************************/
.main-header {
  width: 100%;
}

.header-image {
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  padding: 0 10rem;
  justify-content: space-around;
  background-color: lightgray;
  width: 100%;
}

.main-ul {
  display: flex;
  gap: 2rem;
  list-style: none;
  justify-content: center;
  padding-top: 16px;
  cursor: pointer;
}

.main-li-categories {
  font-weight: bold;
  font-size: 1.5rem;
}

.main-li-categories a {
  text-decoration: none;
  color: black;
}

a:hover {
  opacity: 0.6;
}

.main-li-contact {
  font-weight: bold;
  font-size: 1.5rem;
}

.loga {
  width: 10rem;
}

.main-search {
  height: 3.4rem;
  width: 30rem;
}

.button-sort {
  background-color: #0096db;
  color: white;
  height: 35px;
  width: 110px;
  border: 1px solid black;
}

.select {
  margin-top: 1rem;
  display: flex;
  align-items: center;
  justify-content: center;
}

.category {
  margin-left: 50%;
}

.navbar-div {
  display: flex;
  justify-content: center;
  align-items: flex-end;
  width: 100%;
  gap: 10rem;
  margin-top: 1rem;
}

.button-sort {
  background-color: #0096db;
  color: white;
  height: 35px;
  width: 110px;
  border: 1px solid black;
}
.searchbar {
  display: inline-block;
  height: 3.5rem;
  justify-content: flex-end;
}

.main-search {
  height: 2.5rem;
  width: 16.4rem;
}

.sortBtn {
  display: flex;
  justify-content: flex-end;
  gap: 0.2rem;
}

.sort-Btn {
  background-color: #0096db;
  color: white;
  height: 35px;
  width: 130px;
  border: 1px solid black;
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
  background-color: #0096db;
  color: white;
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
/* FOT */
/*********************************/
.fot-container {
  max-width: 1170px;
  margin: auto;
}
.row {
  display: flex;
  flex-wrap: wrap;
}
ul {
  list-style: none;
}
.footer {
  background-color: #24262b;
  padding: 70px 0;
  margin-top: 150px;
}
.footer-col {
  width: 25%;
  padding: 0 15px;
}
.footer-col h4 {
  font-size: 18px;
  color: #ffffff;
  text-transform: capitalize;
  margin-bottom: 35px;
  font-weight: 500;
  position: relative;
}
.footer-col h4::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: -10px;
  height: 2px;
  box-sizing: border-box;
  width: 50px;
}
.footer-col ul li:not(:last-child) {
  margin-bottom: 10px;
}
.footer-col ul li a {
  font-size: 16px;
  text-transform: capitalize;
  color: #ffffff;
  text-decoration: none;
  font-weight: 300;
  color: #bbbbbb;
  display: block;
  transition: all 0.3s ease;
}
.footer-col ul li a:hover {
  color: #ffffff;
  padding-left: 8px;
}
.footer-col .social-links a {
  display: inline-block;
  height: 40px;
  width: 40px;
  background-color: rgba(255, 255, 255, 0.2);
  margin: 0 10px 10px 0;
  text-align: center;
  line-height: 40px;
  border-radius: 50%;
  color: #ffffff;
  transition: all 0.5s ease;
}
.footer-col .social-links a:hover {
  color: #24262b;
  background-color: #ffffff;
}

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
</style>
