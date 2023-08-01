<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
          <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Menu</span>
          </a>
          <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
              <a href="#" class="nav-link align-middle px-0">
                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Main</span>
              </a>
            </li>
          </ul>
          <hr>
        </div>
      </div>
      <div class="col py-3">
          <div class="wrapper d-flex align-items-stretch">
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
              <h2 class="mb-4">APG WellStar Main</h2>
              <div class="container-fluid">
                <div class="container">
                  <div class="float-right">
                    <a href="#" class="btn btn-primary btn-sm">
                      <i class="bi bi-cloud-upload"></i> Upload CSV
                    </a>

                  </div>

                  <div class="float-right mx-2">
                    <label for="csvDownload" class="btn btn-success btn-sm">
                      <i class="bi bi-cloud-download"></i> Download CSV
                      <input type="file" id="csvDownload" style="display:none">
                    </label>
                  </div>
                </div>
                <b-table
                  striped hover
                  :items="items"
                  :fields="fields"
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
                    class="float-right"
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
  </div>
</template>

<script>
    export default {
      name: "Sidebar",
      data() {
        return {
          items: [],
          fields: [],
          currentPage: 1,
          perPage: 10,
          isBusy: true,
        }
      },
      computed: {
        rows() {
          return this.items.length
        }
      },
      methods: {
        getItems(){
          this.$store.dispatch("redcedar/getAllItems")
            .then((res) => {
              this.items = res.data;
              this.isBusy = false
            })
            .catch(err => {
              this.items = []
              this.isBusy = false
            })
        },
      },
      mounted() {
        this.getItems();
      }
    }
</script>

<style scoped>

</style>
