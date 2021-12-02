import axios from "axios";

export const Http = axios.create({
  baseURL: "http://localhost/ame_public/AME_vs1/app/doacao/control/"
});
