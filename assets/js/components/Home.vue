<template>
  <div>
    <div class="p-3 border bg-light">
        <h1 class ="link-primary">CONNEXION</h1>
    </div>
    <div class="container mt-5">
        <form method="POST" action="/connexion">
          <div class="mb-3">
            <label for="inputUser" class="form-label">Nom d'utilisateur*</label>
            <input
              type="inputUser"
              name="inputUser"
              class="form-control"
              id="inputUser"
              required
            />
          </div>
          <div class="mb-3">
            <label for="inputPassword" class="form-label">Mot de passe*</label>
            <input
              type="password"
              class="form-control"
              id="inputPassword"
              name="inputPassword"
              required
            />
          </div>
          <button type="submit" class="btn btn-primary mt-2">Connexion</button>
        </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "home",
  data() {
    return {
    };
  },
  methods: {
  },
};
</script>

<style scoped>

</style>
