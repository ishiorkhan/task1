<?php require_once APPPATH . 'views/layouts/header.php'; ?>

<div class="d-flex justify-content-between">
    <h1>List</h1>
    <div class="d-flex justify-content-between">
      <div>
        <a href="<?= base_url('/') ?>" class="btn btn-warning" name="">Form</a>
      </div>
    </div>
</div>
<hr>

<form action="<?= base_url('filter') ?>" class="d-flex justify-content-between">
    <div class="mb-3 col-md-3">
        <select class="form-select" name="role" id="role" aria-label="Default select example">
            <option value="">Vəzifəniz</option>
            <?php
            if (isset($roles) && count($roles)>0) {
              foreach ($roles as  $role ){
                  ?>
                  <option <?php echo $role->id == $this->input->get("role") ?
                  'selected' : '' ?> value="<?= $role->id ?>">
                  <?= $role->name ?></option>
              <?php
            }
            }
            ?>
        </select>
    </div>
    <div class="mb-3 col-md-3">
        <input type="number" step="0.01" class="form-control"  name="min_salary" value="<?= $_GET['min_salary'] ?? ''; ?>" id="min_salary" placeholder="Minimum Maaş">
    </div>
    <div class="mb-3 col-md-3">
        <input type="number" step="0.01" class="form-control" name="max_salary" value="<?= $_GET['max_salary'] ?? ''; ?>" id="max_salary" placeholder="Maksimum Maaş">
    </div>
    <div class="">
      <input class="form-control me-2 autocomplete" type="search" value="<?= $_GET['search_text'] ?? ''; ?>" name="search_text" id="search_text" placeholder="Ad və Soyada görə axtarış" aria-label="Search">
      <input class="btn btn-outline-success me-3 col-md-12" value="Axtar" type="submit" ></input>
      <input class="btn btn-outline-danger me-3 col-md-12" value="Reset" id="resetFilter" type="button" ></input>
      <div id="autocomplete-results"></div>
    </div>
</form>

<hr>


<table class="table">
    <thead>
    <tr>
        <th scope="col">Ad</th>
        <th scope="col">Soyad</th>
        <th scope="col">Maaş</th>
        <th scope="col">Başlama Vaxtı</th>
        <th scope="col">Vəzifə</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($employees) && count($employees)>0){
    foreach ($employees as $employee) {
        ?>
        <tr>
            <td><?= $employee->name ?></td>
            <td><?= $employee->surname ?></td>
            <td><?= $employee->salary ?> AZN</td>
            <td><?= $employee->date ?></td>
            <td><?= $employee->role_name ?></td>
        </tr>
        <?php
    }
    }
    ?>
    <?php
 if (isset($filter) && count($filter) > 0) {
     foreach ($filter as $data) {
         ?>
         <tr>
             <td><?= $data->name ?></td>
             <td><?= $data->surname ?></td>
             <td><?= $data->salary ?> AZN</td>
             <td><?= $data->date ?></td>
             <td><?= $data->role_name ?></td>
         </tr>
         <?php
     }
 }
 ?>
 </tbody>
</table>
<?php
if (isset($filter) && count($filter) == 0) { ?>
 <div class="alert alert-warning">Məlumat tapılmadı!</div>
<?php }
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(document).ready(function() {
        $("#search_text").keyup(function() {
            var search_text = $(this).val();

            $.ajax({
                url: "<?= base_url('form/search_keyup') ?>",
                type: 'GET',
                data: {search_text: search_text},
                dataType: 'json',
                success: function(response) {
                    displayResults(response);
                }
            });
        });

        function displayResults(data) {
            var resultsContainer = $("#autocomplete-results");
            resultsContainer.empty();

            if (data.length > 0) {
                $.each(data, function(index, value) {
                    resultsContainer.append('<div>' + value.name + ' ' +value.surname + '</div>');
                });
            } else {
                resultsContainer.append('<div>Məlumat tapılmadı!</div>');
            }
        }

        $('#resetFilter').click(function () {
        $('#max_salary').val('');
        $('#min_salary').val('');
        $('#search_text').val('');
        $('#role')[0].selectedIndex = 0;
    });
    });
</script>

<?php require_once APPPATH . 'views/layouts/footer.php'; ?>
