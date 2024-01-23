<?php require_once APPPATH . 'views/layouts/header.php'; ?>

<div class="d-flex justify-content-between">
    <h1>List</h1>
    <div class="d-flex justify-content-between">
      <div>
        <a href="<?= base_url('/list') ?>" class="btn btn-success" name="">List</a>
        <a href="<?= base_url('/') ?>" class="btn btn-danger" name="">Form</a>
      </div>
    </div>
</div>
<hr>



<hr>


<table class="table">
    <thead>
    <tr>
        <th  style="width:1000px" scope="col">Açar Söz</th>
        <th  scope="col">Təkrar Sayı</th>
    </tr>
    </thead>
    <tbody>
    <?php
 if (isset($logs) && count($logs) > 0) {
     foreach ($logs as $log) {
         ?>
         <tr>
             <td><?= $log->keywords ?></td>
             <td><?= $log->keywords_count ?></td>
         </tr>
         <?php
     }
 }
 ?>
 </tbody>
</table>
<?php
if (isset($logs) && count($logs) == 0) { ?>
 <div class="alert alert-warning">Məlumat tapılmadı!</div>
<?php }
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<?php require_once APPPATH . 'views/layouts/footer.php'; ?>
