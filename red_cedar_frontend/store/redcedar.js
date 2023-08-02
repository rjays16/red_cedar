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

  async upload({}, payload) {
    try {
      const formData = new FormData();
      formData.append('file', payload.file);

      const response = await axios.post('items', formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      });

      return response.data;
    } catch (error) {
      throw error;
    }
  },
};
