<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <LayoutSidebar/>
      <div class="col py-3">
        <div class="wrapper d-flex align-items-stretch">
          <!-- Page Content  -->
          <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Consolidated And Result</h2>
            <div class="container">
              <div class="row">
                <div class="col-md-2 mb-1">
                  <input type="number" class="form-control p-3" placeholder="Put limit Rows" v-model="inputLimit" />
                </div>
                <div class="col-md-2">
                  <button type="button" class="btn btn-primary btn-block" @click="updateItems(id, inputLimit)">Go</button>
                </div>
                <div class="col-md-2">
                  <button type="button" class="btn btn-success" @click="getConsolidatedItemsXLS">Download CSV File</button>
                </div>
              </div>
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
    export default {
        name: "Consolidated",
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
        getConsolidatedItems(){
          this.$store.dispatch("consolidated/getAllItemsConsolidated")
            .then((res) => {
              this.items = res.data;
              this.isBusy = false
            })
            .catch(err => {
              this.items = []
              this.isBusy = false
            })
        },

        getConsolidatedItemsXLS(){
          this.$store.dispatch("consolidated/getAllItemsConsolidatedXLS")
            .then((res) => {
            })
            .catch(err => {
            })
        },

        getConfig(){
          this.$store.dispatch("config/getAllConfig")
            .then((res) => {
                this.id = res.data[0].id;
                this.inputLimit = res.data[0].limitrows
              console.log(this.inputLimit);
            })
            .catch(err => {
            })
        },

        updateItems(id, inputlimit){
          this.$store.dispatch("config/update", {
            id: id,
            limitrows: inputlimit
          })
            .then((res) => {
              Swal.fire({
                title: 'Succesfully',
                text: "Successfully Update Config",
                icon: 'success',
              });
              setTimeout(() => {
                window.location.reload()
              }, 1000);
            }).catch((err) => {
            Swal.fire({
              title: 'Hurry',
              text: err,
              icon: 'warning',
            });
          });
        }
      },
      mounted() {
        this.getConsolidatedItems();
        this.getConfig();
      }
    }
</script>

<style scoped>

</style>
