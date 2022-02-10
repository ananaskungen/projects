<template>
  <div>
    <form class="cta-form" name="sign-up">
      <div class="contact-container">
        <div>
          <label for="full-name">Full Name</label>
          <input
            id="full-name"
            type="text"
            placeholder="John Smith"
            name="full-name"
            required
          />
        </div>
        <div>
          <label for="email">Email address</label>
          <input
            id="email"
            type="email"
            placeholder="me@example.com"
            name="email"
            required
          />
        </div>
        <div>
          <h3>Message</h3>
          <textarea
            class="cta-message"
            name="Message"
            id=""
            cols="30"
            rows="4"
            placeholder="Type your message here"
          />
          <input
            type="submit"
            @click="sendEmail"
            class="btn--form"
            placeholder="Send"
          />
        </div>
      </div>
    </form>
    <Popupcontact v-if="contactVisible" @close-mail="contactVisible = false" />
  </div>
</template>

<script>
import Popupcontact from "./Popupcontact.vue";

export default {
  name: "Contactus",
  data() {
    return {
      contactVisible: false,
    };
  },
  components: {
    Popupcontact,
  },
  methods: {
    sendEmail(Event) {
      this.contactVisible = true;
      Event.preventDefault();
    },
  },
};
</script>

<style scoped>
/***************************/
/* Contact SECTION*/
/***************************/
.cta-form {
  display: flex;
  font-size: 1.6rem;
  font-weight: 500;
  margin-bottom: 1.2rem;
  height: 40rem;
  align-content: center;
  margin-top: 2rem;
  flex-direction: column;
  align-items: center;
}

.btn--form {
  background-color: #0096db;
  color: white;
  padding: 1.2rem;
  width: 10rem;
  border-radius: 5px;
}

.contact-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-evenly;
  height: 35rem;
  width: 50%;
  box-shadow: 0px 1px 8px 0px;
}

.cta-form label {
  display: block;
  font-size: 1.6rem;
  font-weight: 500;
  margin-bottom: 1.2rem;
  font-weight: bold;
}

.cta-form input,
.cta-form select {
  width: 100%;
  padding: 1.2rem;
  font-size: 1.8rem;
  font-family: inherit;
  color: inherit;
  border: 1px solid black;
  border-radius: 9px;
}

.cta-form input::placeholder {
  color: #aaa;
}

.cta-message {
  display: block;
  font-size: 1.6rem;
  font-weight: 500;
  margin-bottom: 1.2rem;
}
</style>
