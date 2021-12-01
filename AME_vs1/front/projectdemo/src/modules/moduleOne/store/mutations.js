import * as types from "./mutations-types";

export default {
  [types.SET_MODALSTATEDATA](state, payload) {
    state.modalStateData = payload;
  }
};
