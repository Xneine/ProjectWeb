<!-- STOP -->
<?php
    $method = $_SESSION['method2'];
    $namaa = "";
    $entitas = $_SESSION['entity2'];
    $id = $_SESSION['id_ktg'];
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#EDIT">
    <?php echo $method?>
</button>

<!-- Modal -->
<div class="modal fade" id="EDIT" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php
        echo $method . " " . $entitas;
        ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="editKategori.php" method="post">
      <div class="modal-body">

        <!-- isi modal -->
        <div class="mb-3">
            <div class="div"><?php echo $method . " " . $entitas . " ID: " . $id?></div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="katName" class="form-label"><?php  echo $entitas;?> name</label>
            <input class="form-control" id="katName" name="katName" placeholder="Makanan" required>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><?php echo $method?></button>
      </div>
    </form>
    </div>
  </div>
</div>