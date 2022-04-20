<template>
  <div>
    <div name="bas" class="container rapport">
      <form
        name="formRAPPORT_VISITE"
        method="post"
        action="/comptes-rendus/new"
      >
        <h1>Rapport de visite</h1>
        <div class="input-group mb-3">
          <label class="col-form-label">NUMERO :</label>
              <input type="number" size="10" name="RAP_NUM" class="form-control" />
          <label class="col-form-label">DATE VISITE :</label>
              <input
                type="date"
                size="10"
                name="RAP_DATEVISITE"
                class="form-control"
              />
        </div>
        <div class="input-group mb-3">
          <label class="col-form-label">PRATICIEN :</label>
            <select name="PRA_NUM" class="form-select"></select>
          <label class="col-form-label">COEFFICIENT :</label>
            <input type="text" size="6" name="PRA_COEFF" class="form-control" />
        </div>
          <label class="col-form-label">REMPLACANT :</label>
            <input
              type="checkbox"
              class="form-check-input"
              checked="false"
              onClick="selectionne(true,this.checked,'PRA_REMPLACANT');"
            />
            <select
              name="PRA_REMPLACANT"
              disabled="disabled"
              class="form-select">
            </select>
        <div class="input-group mb-3">
          <label class="col-form-label">DATE :</label
          ><input type="date" size="19" name="RAP_DATE" class="form-control" />
          <label class="col-form-label">MOTIF :</label>
          <select
            name="RAP_MOTIF"
            class="form-select"
            onClick="selectionne('AUT',this.value,'RAP_MOTIFAUTRE');"
          >
            <option value="PRD">Périodicité</option>
            <option value="ACT">Actualisation</option>
            <option value="REL">Relance</option>
            <option value="SOL">Sollicitation praticien</option>
            <option value="AUT">Autre</option>
          </select>
        </div>
        <input
          type="text"
          name="RAP_MOTIFAUTRE"
          class="form-control"
          disabled="disabled"
        />
        <label class="col-form-label">BILAN :</label
        ><textarea
          rows="5"
          cols="50"
          name="RAP_BILAN"
          class="form-control"
        ></textarea>
        <div>
          <label class="col-form-label">
            <h3>Eléments présentés</h3>
          </label>
        </div>
        <div class="input-group mb-3">
          <label class="col-form-label"> PRODUIT 1 : </label
          ><select name="PROD1" class="form-control"></select>
          <label class="col-form-label"> PRODUIT 2 : </label
          ><select name="PROD2" class="form-control"></select>
          <label class="col-form-label">DOCUMENTATION OFFERTE :</label
          ><input
            name="RAP_DOC"
            type="checkbox"
            class="form-check-input"
            checked="false"
          />
        </div>
        <div>
           <label class="col-form-label"><h3>Echantillons</h3></label>
        </div>
        <div class="input-group mb-3">
          <div class="col-form-label">
            <label class="col-form-label">Produit : </label>
            <select name="PRA_ECH1" class="form-select">
              <option>Produits</option>
            </select>
            <input type="number" name="PRA_QTE1" size="2" class="form-control" />
            <input
              type="button"
              id="but1"
              value="+"
              onclick="ajoutLigne(1);"
            />
          </div>
        </div>
        <label class="col-form-label">SAISIE DEFINITIVE :</label>
        <input
          name="RAP_LOCK"
          type="checkbox"
          class="form-check-input"
          checked="false"
        />
        <label class="col-form-label"></label>
        <div>
          <input type="reset" value="annuler" class="btn btn-danger" /><input
            type="submit"
            class="btn btn-primary"
          />
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "cr",
  data() {
    return {};
  },
  methods: {},
};
</script>
<style scoped>

</style>
