<?php $this->load->view('layouts/header') ?>


    <div class="d-flex justify-content-between">
      <h1>Form</h1>
      <div class="">
        <a href="<?= base_url('form/list') ?>" class="btn btn-success">List</a>
        <a href="<?= base_url('form/logs') ?>" class="btn btn-danger">Logs</a>
      </div>

    </div>
<hr>
    <form method="post">
      <div class="mb-3 col-md-6">
        <label for="name" class="form-label">Ad</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text d-none" id="name_text">Adınızı daxil edin</div>
      </div>
      <div class="mb-3 col-md-6">
        <label for="surname" class="form-label">Soyad</label>
        <input type="text" class="form-control" id="surname" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text d-none" id="surname_text">Soyadınızı daxil edin</div>
      </div>
      <div class="mb-3 col-md-6">
        <label for="date" class="form-label">İşə başlama vaxtı</label>
        <input type="date" class="form-control" name='date' id="date" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text d-none">İşə başlama vaxtınızı qeyd edin</div>
      </div>
      <div class="mb-3 col-md-6">
        <label for="role" class="form-label">Vəzifə</label>
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
      </div>
      <div class="mb-3 col-md-12">
        <label for="salary" class="form-label">Emek Haqqi</label>
        <input type="text" class="form-control" id="salary" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text d-none">Emek haqqinizi daxil edin</div>
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

      if (!name) {
        $('[name="name"]').addClass('is-invalid');
      } else {
        $('[name="name"]').removeClass('is-invalid');
      }
      if (!surname) {
        $('[name="surname"]').addClass('is-invalid');
      } else {
        $('[name="surname"]').removeClass('is-invalid');
      }

      alert('Form tam doldurulmalıdır!');
      if(!name || !surname) return;

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

        },
        complete: function(d){
          console.log("data sended");
        }
      })
    })
  });
</script>
<?php $this->load->view('layouts/footer') ?>
