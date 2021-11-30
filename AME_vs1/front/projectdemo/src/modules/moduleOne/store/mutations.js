import * as types from "./mutations-types";

export default {
  [types.SET_MODALSTATEDATA](state, payload) {
    state.modalStateData = payload;
  },
  //   [types.SET_STATEFILMS](state, payload) {
  //     state.films = payload;
  //   },
  [types.SET_DONATIONS](state, payload) {
    state.donations = payload;
  }
};
