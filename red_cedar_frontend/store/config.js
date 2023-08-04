import axios from "axios";
const state = {

};

const mutations = {

};

export const actions = {
  getAllConfig(){
    return new Promise((resolve, reject) => {
      axios.get(`${process.env.BASE_URL}config`)
        .then(res => {
          resolve(res)
        })
        .catch(err => {
          reject(err.response.data.message)
        })
    })
  },

  update({}, data) {
    return new Promise((resolve, reject) => {
      axios.put(`${process.env.BASE_URL}config/${data['id']}`, data)
        .then(res => {
          resolve(res)
        })
        .catch(err => {
          reject(err.response.data.message)
        })
    })
  },
};
