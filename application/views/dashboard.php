<main class="content">
				<div class="container-fluid p-0">

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Tambahfoto"> add photo</button>
				</div>

<!-- Modal -->
<div class="modal fade" id="Tambahfoto" tabindex="-1" role="dialog" aria-labelledby="Tambahfoto" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Tambahfoto"> Add Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('dashboard/tambahfoto')?>" method="POST">
        <label for="judul_foto">Judul Foto:</label>
        <input type="text" id="judul_foto" name="judul_foto" required>

        <label for="deskripsi_foto">Deskripsi Foto:</label>
        <textarea id="deskripsi_foto" name="deskripsi_foto" required></textarea>

        <label for="file_foto">Pilih Foto:</label>
        <input type="file" id="file_foto" name="file_foto" accept="image/*" required>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
    </div>
  </div>
</div>
			</main>
        