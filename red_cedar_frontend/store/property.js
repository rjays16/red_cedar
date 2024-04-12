import axios from "axios";
const state = {
  items: [],
};

const mutations = {

};

export const actions = {
  getAllItemsProperty(){
    return new Promise((resolve, reject) => {
      axios.get(`${process.env.BASE_URL}property`)
        .then(res => {
          resolve(res)
        })
        .catch(err => {
          reject(err.response.data.message)
        })
    })
  },

};
