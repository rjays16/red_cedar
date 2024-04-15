<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <LayoutSidebar/>
      <div class="col py-3">
        <div class="wrapper d-flex align-items-stretch">
          <!-- Page Content  -->
          <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Result</h2>
            <div class="container">
              <div class="row">
                <div class="col-md-3">
                  <button type="button" class="btn btn-success btn-export" @click="getResultItemsXLS">Download Excel File</button>
                </div>
              </div>
              <br>
              <b-table
                striped hover
                :items="items"
                :fields="fields"
                :bordered="bordered"
                :responsive="true"
                :busy="isBusy"
                :per-page="perPage"
                :current-page="currentPage"
                :show-empty="items.length === 0">
                <template slot="table-busy">
                  <div class="text-center text-success my-2">
                    <b-spinner class="align-middle"></b-spinner>
                    <strong>Loading...</strong>
                  </div>
                </template>
                <template #empty>
                  <div class="text-center">
                    Empty Data
                  </div>
                </template>
              </b-table>
              <div class="w-100 m-2">
                <b-pagination
                  v-model="currentPage"
                  :total-rows="rows"
                  :per-page="perPage"
                  aria-controls="my-table"
                ></b-pagination>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--    <ModalUploadCSV/>-->
  </div>
</template>

<script>
import Swal from 'sweetalert2';
import { disableButton } from "~/components/Helper/functions.js"
export default {
  name: "Result",
  data() {
    return {
      items: [],
      fields: [],
      currentPage: 1,
      perPage: 10,
      isBusy: true,
      bordered: false,
      inputLimit: 0,
      id: 0,
    }
  },
  computed: {
    rows() {
      return this.items.length
    }
  },
  methods: {
    getResultItems(){
      this.$store.dispatch("result/getAllItemsResult")
        .then((res) => {
          this.items = res.data;
          this.isBusy = false
        })
        .catch(err => {
          this.items = []
          this.isBusy = false
        })
    },


    getResultItemsXLS(){
      disableButton('.btn-export', true)
      this.$store.dispatch("result/exportResult")
        .then(res => {
          const url = URL.createObjectURL(new Blob([res.data]))
          const link = document.createElement('a')
          link.href = url
          link.setAttribute('download', "result.xlsx")
          document.body.appendChild(link)
          link.click()
          document.body.removeChild(link)
          disableButton('.btn-export', false)
        })
        .catch(err => {
          this.$message.error('Could not export the file. Please contact the site admin.')
          disableButton('.btn-export', false)
        })
    },
  },
  mounted() {
    this.getResultItems();
  }
}
</script>

<style scoped>

</style>
