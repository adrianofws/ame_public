import * as types from "./mutations-types";
import { Http } from "../../../http/http";
import axios from "axios";
import { Notify } from "quasar";

export const ActionSetStateModal = ({ commit }, payload) => {
  console.log(payload);
  commit(types.SET_MODALSTATEDATA, payload);
};

export const ActionGetDonations = ({ dispatch }, payload) => {
  console.log({ ...payload });
  return new Promise((resolve, reject) => {
    Http.post("pesquisarReceptores.php", { ...payload })
      .then(response => {
        resolve(response.data.RESULT);
      })
      .catch(response => {
        Notify.create("Pesquisa não encontrada!");
        reject(error);
      });
  });
};
