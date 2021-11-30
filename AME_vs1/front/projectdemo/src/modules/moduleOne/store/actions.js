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
  let { city, company, neighborhood, receiver, selectedState } = payload;
  console.log("payload", city, company, neighborhood, receiver, selectedState);
  Http.post("pesquisarDoacao.php")
    .then(res => {
      console.log(res);
      // dispatch("ActionSetDonations", response.data);
    })
    .catch(res => {
      Notify.create("Pesquisa não encontrada!");
    });

  // Http.post("doacao/control/pesquisarDoacao.php").then(response => {
  //   console.log(response);
  // });
};

export const ActionSetDonations = ({ commit }, payload) => {
  commit(types.SET_DONATIONS, payload);
};
