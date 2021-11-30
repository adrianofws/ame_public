<template>
  <q-dialog
    :value="modalStateData.modal"
    @before-hide="hide"
    @before-show="requestData"
  >
    <q-card v-if="modalStateData.data" style="width: 920px; max-width: 90vw">
      <q-card-section>
        <div class="text-h6">{{ modalStateData.data.NM_EMPRESA }}</div>
        <div class="text-subtitle2">{{ modalStateData.data.NM_RECEPTOR }}</div>
        <div class="q-pt-md">
          {{ modalStateData.data.DS_MOTIVO_DOACAO }}
        </div>
      </q-card-section>
      <q-separator />
      <q-card-actions>
        <q-btn flat round icon="event"></q-btn>
        <q-btn flat> 7:30PM </q-btn>
        <q-btn flat color="purple-6"> Reserve </q-btn>
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script>
import { mapState, mapActions } from "vuex";

export default {
  name: "ModalShowDate",

  computed: {
    ...mapState("moduleOne", ["modalStateData", "films"]),
  },

  methods: {
    ...mapActions("moduleOne", [
      "ActionSetStateModal",
      "ActionGetFilms",
      "ActionSetFilmsState",
    ]),
    requestData() {
      this.ActionGetFilms();
    },
    hide() {
      this.ActionSetStateModal({ modal: false, data: null });
      this.ActionSetFilmsState([]);
    },
  },
};
</script>

<style>
</style>