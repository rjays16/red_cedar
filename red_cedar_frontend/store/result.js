import axios from "axios";
const state = {
  items: [],
};

const mutations = {

};

export const actions = {
  getAllItemsResult(){
    return new Promise((resolve, reject) => {
      axios.get(`${process.env.BASE_URL}result`)
        .then(res => {
          resolve(res)
        })
        .catch(err => {
          reject(err.response.data.message)
        })
    })
  },

  exportResult({}) {
    return new Promise((resolve, reject) =>{
      this.$axios.get(`${process.env.BASE_URL}result/xls`, {
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
