<template>
  <div class="Test">
    <p>{{ welcome }}</p>
  </div>
</template>

<script>
export default {
  name: "Test",
  props: {
    welcome: String,
  },
};
</script>
