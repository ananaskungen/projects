<template>
  <div>
    <button class="close" @click="closeConfirmation()">X</button>
    <p>Thanks for ordering on our fake store</p>
  </div>
</template>

<script>
export default {
  name: "Popuporder",
  methods: {
    closeConfirmation() {
      this.$emit("close-order");
    },
  },
};
</script>

<style></style>
