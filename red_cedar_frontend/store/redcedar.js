import axios from "axios";
const state = {
  items: [],
};

const mutations = {

};

export const actions = {
  getAllItems(){
    return new Promise((resolve, reject) => {
      axios.get(`${process.env.BASE_URL}items`)
        .then(res => {
          resolve(res)
        })
        .catch(err => {
          reject(err.response.data.message)
        })
    })
  },
};
