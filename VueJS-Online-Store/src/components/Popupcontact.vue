<template>
  <div class="popup-contact">
    <button class="close" @click="closeMail()">X</button>
    <p class="popup-contact-p">Thanks for your mail, we will never reply</p>
  </div>
</template>

<script>
export default {
  name: "Popupcontact",
  methods: {
    closeMail() {
      this.$emit("close-mail");
    },
  },
};
</script>

<style>
.blury-parent {
  width: 100%;
  height: 100%;
  filter: blur(8px);
}

.popup-contact {
  display: block;
  background: rgb(255, 255, 255);
  width: 800px;
  padding: 20px;
  position: fixed;
  border: 2px solid rgb(172, 169, 169);
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  font-family: Helvetica, sans-serif;
  position: fixed;
  box-shadow: 0 3rem 50rem rgb(0 0 0 / 50%);
  height: 25rem;
}

.close {
  background-color: #0096db;
  color: white;
  padding: 1.2rem;
  margin-bottom: 2rem;
  border-radius: 5px;
}

.popup-contact-p {
  font-size: 2rem;
  margin-top: 4rem;
}
</style>
