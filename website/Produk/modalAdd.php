<?php
    $method = $_SESSION['method1'];
    $namaa = "";
    $entitas = $_SESSION['entity1'];
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ADD">
  <?php echo $method?>
</button>

<!-- Modal -->
<div class="modal fade" id="ADD" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php
        echo $method . " " . $entitas;
        ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="insertKategori.php" method="post">
      <div class="modal-body">

        <!-- isi modal -->
        <div class="mb-3">
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