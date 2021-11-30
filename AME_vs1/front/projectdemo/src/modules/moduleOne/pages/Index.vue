<template>
  <q-page class="">
    <div class="q-ma-xl">
      <div class="header">Doações</div>
      <div class="row q-mt-lg">
        <div class="col-6 q-px-sm">
          <q-select
            outlined
            v-model="filters.selectedState"
            :options="optionsTest"
            label="Estado"
          />
        </div>
        <div class="col-6 q-px-sm">
          <q-input v-model="filters.company" outlined label="Empresa" />
        </div>
      </div>
      <div class="row q-mt-sm">
        <div class="col-6 q-px-sm">
          <q-input v-model="filters.city" outlined label="Cidade" />
        </div>
        <div class="col-6 q-px-sm">
          <q-input v-model="filters.receiver" outlined label="Receptor" />
        </div>
      </div>
      <div class="row q-mt-sm">
        <div class="col-6 q-px-sm">
          <q-input v-model="filters.neighborhood" outlined label="Bairro " />
        </div>
      </div>
      <q-btn
        class="q-px-lg q-mx-sm q-mt-md"
        color="purple-6"
        label="Pesquisar"
        @click="setStateModal"
      />
    </div>
    <div class="q-ma-xl">
      <q-table
        title="Empresas"
        :data="data"
        :columns="columns"
        row-key="name"
        :selected.sync="selected"
        @row-click="onRowClick"
      ></q-table>
    </div>

    <router-view />
    <ModalShowData />
  </q-page>
</template>

<script>
import { mapActions, mapState } from "vuex";
import ModalShowData from "../../../components/moduleOne/ModalShowData.vue";

export default {
  name: "PageIndex",
  data() {
    return {
      filters: {
        selectedState: null,
        city: "",
        neighborhood: "",
        company: "",
        receiver: "",
      },
      selected: [],
      columns: [
        {
          name: "desc",
          required: true,
          label: "Empresa",
          align: "left",
          style: "width: 100px",
          field: "NM_EMPRESA",
          format: (val) => `${val}`,
          sortable: true,
        },
        {
          name: "Receptor",
          align: "left",
          style: "width: 100px",
          label: "Receptor",
          field: "NM_RECEPTOR",
          sortable: true,
        },
        {
          name: "reason",
          align: "left",
          style: "width: 600px",
          label: "Motivo",
          field: "DS_MOTIVO_DOACAO",
        },
      ],
      data: [],
    };
  },

  components: {
    ModalShowData,
  },
  computed: {
    ...mapState("moduleOne", ["optionsTest", "donations"]),
  },

  methods: {
    ...mapActions("moduleOne", ["ActionSetStateModal", "ActionGetDonations"]),

    onRowClick(evt, row) {
      console.log("clicked on", row);
      this.ActionSetStateModal({
        modal: true,
        data: row,
      });
    },

    setTable() {
      this.ActionGetDonations(this.filters);
      this.data = this.donations;
    },

    setStateModal() {
      this.setTable();
    },
  },
};
</script>

<style scoped>
.header {
  font-size: 24px;
  font-weight: bold;
}
</style>
