import * as types from "./mutations-types";
import { Http } from "../../../http/http";
import axios from "axios";
import { Notify } from "quasar";

export const ActionSetStateModal = ({ commit }, payload) => {
  console.log(payload);
  commit(types.SET_MODALSTATEDATA, payload);
};

// export const ActionSetFilmsState = ({ commit }, payload) => {
//   commit(types.SET_STATEFILMS, payload);
// };

// export const ActionGetFilms = ({ dispatch }) => {
//   Http.get("films/").then(response => {
//     dispatch("ActionSetFilmsState", response.data);
//   });
// };

export const ActionGetDonations = ({ dispatch }, payload) => {
  return new Promise((resolve, reject) => {
    Http.post("pesquisarReceptores.php")
      .then(response => {
        // dispatch("ActionSetDonations", response.data.RESULT);
        resolve(response.data.RESULT);
      })
      .catch(response => {
        Notify.create("Pesquisa não encontrada!");
        reject(error);
      });
  });
};

export const ActionSetDonations = ({ commit }, payload) => {
  commit(types.SET_DONATIONS, payload);
};
