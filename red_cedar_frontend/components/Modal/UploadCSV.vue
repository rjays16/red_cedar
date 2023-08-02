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
          <input class="form-control form-control-lg" id="formFileLg" type="file" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Upload</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        name: "UploadCSV"
    }
</script>

<style scoped>

</style>
