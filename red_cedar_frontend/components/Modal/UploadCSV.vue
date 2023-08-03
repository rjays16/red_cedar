<template>
  <div class="modal fade" id="Upload" tabindex="-1" role="dialog" aria-labelledby="UploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UploadModalLabel">Upload CSV File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="formFileLg" class="form-label">Upload CSV File</label>
          <input class="form-control form-control-lg" @change="handleFileUpload" id="formFileLg" type="file" />
        </div>
        <div class="modal-footer">
          <button type="button" @click="submitFile" class="btn btn-primary">Upload</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Swal from "sweetalert2";
    export default {
        name: "UploadCSV",
      data(){
          return {

          }
      },
      methods: {
        handleFileUpload(event) {
          this.file = event.target.files[0];
        },

        async submitFile() {
          if (!this.file) {
            Swal.fire({
              title: 'Hurry',
              text: "No file selected",
              icon: 'warning',
            });
            return;
          }

          try {
            const response = await this.$store.dispatch('redcedar/upload', { file: this.file });
            console.log(response);
            Swal.fire({
              title: 'Succesfully',
              text: "Successfully upload csv file",
              icon: 'success',
            });
          } catch (err) {
            Swal.fire({
              title: 'Hurry',
              text: err,
              icon: 'warning',
            });
          }
        },
      }
    }

</script>

<style scoped>

</style>
