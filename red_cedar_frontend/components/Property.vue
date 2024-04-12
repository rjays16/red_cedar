<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <LayoutSidebar/>
      <div class="col py-3">
        <div class="wrapper d-flex align-items-stretch">
          <!-- Page Content  -->
          <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Property</h2>
            <!--              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Upload">Upload CVS File</button>-->
            <!--               <button type="button" class="btn btn-success floar-right">Download CSV File</button>-->
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
    <!--    <ModalUploadCSV/>-->
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
    getPropertyItems(){
      this.$store.dispatch("property/getAllItemsProperty")
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
    this.getPropertyItems();
  }
}
</script>

<style scoped>

</style>
