<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <div class="container">
      <form action="index.php" method="POST">
            <h1 class="my-4">Update your Note</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">New Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1edit" name="titleedit" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">New Description</label>
                <textarea class="form-control" name="descriptionedit" id="exampleInputPassword1edit" cols="30" rows="5"></textarea>
            </div>

        </form>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>