import axios from "axios";
const state = {
  items: [],
};

const mutations = {

};

export const actions = {
  getAllItemsConsolidated(){
    return new Promise((resolve, reject) => {
      axios.get(`${process.env.BASE_URL}consolidated/limit`)
        .then(res => {
          resolve(res)
        })
        .catch(err => {
          reject(err.response.data.message)
        })
    })
  },

  exportConsolidatedWithLimit({}) {
    return new Promise((resolve, reject) =>{
      this.$axios.get(`${process.env.BASE_URL}consolidated/xls`, {
        responseType: 'blob'
      })
        .then(res => {
          resolve(res)
        })
        .catch(err => {
          reject(err)
        })
    })
  },
};
