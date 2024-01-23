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
        <th style="width:500px" scope="col">ID</th>
        <th style="width:600px" scope="col">Açar Söz</th>
        <th style="width:200px" scope="col">Təkrar Sayı</th>
    </tr>
    </thead>
    <tbody>
    <?php
 if (isset($logs) && count($logs) > 0) {
     foreach ($logs as $log) {
         ?>
         <tr>
             <td>#<?= $log->id ?></td>
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

        let currentUrl = window.location.href;

        // Parametreleri temizle
        let newUrl = removeURLParameters(currentUrl);

        // Yeni URL'ye yönlendir
        window.location.href = newUrl;
    });

    function removeURLParameters(url) {
        var urlParts = url.split('?');
        return urlParts[0]; // Parametreler olmadan URL'yi geri döndür
    }
    });
</script>

<?php require_once APPPATH . 'views/layouts/footer.php'; ?>
