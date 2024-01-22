<?php $this->load->view('layouts/header') ?>


    <div class="d-flex justify-content-between">
      <h1>Form</h1>
      <div class="">
        <a href="<?php echo base_url('form/list') ?>" class="btn btn-warning">List</a>
      </div>
    </div>
<hr>
    <form method="post">
      <div class="mb-3 col-md-6">
        <label for="name" class="form-label">Ad</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Adinizi daxil edin</div>
      </div>
      <div class="mb-3 col-md-6">
        <label for="surname" class="form-label">Soyad</label>
        <input type="text" class="form-control" id="surname" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Soyadinizi daxil edin</div>
      </div>
      <div class="mb-3 col-md-6">
        <label for="date" class="form-label">Ishe baslama tarix</label>
        <input type="date" class="form-control" name='date' id="date" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Ise baslama vaxtinizi qeyd edin.</div>
      </div>
      <div class="mb-3 col-md-6">
        <label for="role" class="form-label">Vezife</label>
        <select class="form-select form-select-lg mb-3" id="role_id" aria-label=".form-select-lg example">
          <option selected>Rolunuz Daxil Edin</option>
          <?php
          foreach ($roles as $role) {
          ?>
          <option value="<?php echo $role->id ?>"><?= $role->name ?></option>
          <?php
          }
          ?>
        </select
        <div id="emailHelp" class="form-text">Vezifenizi secin</div>
      </div>
      <div class="mb-3 col-md-6">
        <label for="salary" class="form-label">Emek Haqqi</label>
        <input type="text" class="form-control" id="salary" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Emek haqqinizi daxil edin</div>
      </div>
      <div class="mb-3 col-md-6">
        <input class="btn btn-success" id="submitData" value="Gonder">
      </div>
    </form>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#submitData').click(function() {
      let self = $(this);
      let name = $('#name').val(),
          surname = $('#surname').val(),
          date = $('[name="date"]').val(),
          role_id = $('#role_id').val(),
          salary = $('#salary').val();
      $.post({
        url: "<?= base_url('form/form_submit') ?>",
        dataType: 'json',
        data: {
          name: name,
          surname: surname,
          date: date,
          role_id: role_id,
          salary: salary
        },
        success: function(data)
        {
          $('input[type=text], input[type=date], input[type=number]').val('');
          $('form select').prop('selectedIndex', 0);
          alert(data.message);

        },
        error: function(){
          alert('error');
        },
        complete: function(d){
          console.log("data sended");
        }
      })
    })
  });
</script>
<?php $this->load->view('layouts/footer') ?>
