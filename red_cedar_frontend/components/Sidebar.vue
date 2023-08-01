<template>
  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <h1><a href="index" class="logo">Red Cedar</a></h1>
      <ul class="list-unstyled components mb-5">
        <li class="active">
          <a href="/"><span class="fa fa-home mr-3"></span> Homepage</a>
        </li>
        <li>
          <a href=""><span class="fa fa-user mr-3"></span>Result</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
      <h2 class="mb-4">APG WellStar Main</h2>
      <b-table striped hover :items="items" :fields="fields"></b-table>
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
        }
      },
      methods: {
        getItems(){
          this.$store.dispatch("redcedar/getAllItems")
            .then((res) => {
              this.items = res.data;
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
