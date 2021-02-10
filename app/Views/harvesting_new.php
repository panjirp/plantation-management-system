<?php include 'header.php';?>


  <!-- FORM INPUT -->
  <div class="content content-fixed content-auth">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <!-- <p class="text-dashboard-small mb-3">Record</p> -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url("harvesting"); ?>"></a>Tambah Data Harvesting</li>
            </ol>
          </nav>
          <h3>Tambah Data Harvesting</h3>
        </div>
      </div>

      <div class="d-flex justify-content-center">
        <div class="card card bg-white w-75">
          <div class="card-body pb-2">
            <form action="<?php echo base_url("harvesting/input_process"); ?>" method="post" data-parsley-validate>

              <div class="form-group">
                <p class="text-req">Tanggal<em>*</em></p>
                <input type="text" class="form-control" placeholder="Choose date" name="harvDate" id="datepicker4" required>
              </div>

              <div class="form-group">
                <p class="text-req">Afdeling<em>*</em></p>
                <select class="custom-select" id="afdelingId" name="afdelingId" required>
                  <option value="" selected disabled>Pilih Afdeling</option>
                  <?php 
                    for ($i = 0; $i < count($afdeling); $i++) {
                        echo "<option value=" . $afdeling[$i]->id . ">" . $afdeling[$i]->name . "</option>";                    
                    } 
                  ?>
                </select>
              </div>

              <div class="form-group">
                <p class="text-req">Tahun Tanam<em>*</em></p>
                <select class="custom-select" id="tahunTanamId" name="tahunTanamId" required>
                  <option value="" selected disabled>Pilih Tahun Tanam</option>
                </select>
              </div>

              <div class="form-group">
                <p class="text-req mt-4">Blok<em>*</em></p>
                <select class="custom-select" id="blockId" name="blockId" required>
                  <option value="" selected disabled>Pilih Blok</option>
                </select>
              </div>

              <div class="form-group">
                <p class="text-req mt-4">Ancak/TPH<em>*</em></p>
                <select class="custom-select" id="tphId" name="tphId" required>
                  <option value="" selected disabled>Pilih TPH</option>
                </select>
              </div>

              <div class="form-group">
                <p class="text-req mt-4">Kemandoran<em>*</em></p>
                <select class="custom-select" id="groupId" name="groupId" required>
                  <option value="" selected disabled>Pilih Kemandoran</option>
                </select>
              </div>

              <div class="form-group">
                <p class="text-req mt-4">Mandor<em>*</em></p>
                <select class="custom-select" id="mandorId" name="mandorId" required>
                  <option value="" selected disabled>Pilih Mandor</option>
                </select>
              </div>
              
              <div class="form-group">
                <p class="text-req mt-4">Pemanen<em>*</em></p>
                <select class="custom-select" id="pemanenId" name="pemanenId" required>
                  <option value="" selected disabled>Pilih Pemanen</option>
                  <?php 
                    for ($i = 0; $i < count($worker); $i++) {
                        echo "<option value=" . $worker[$i]->id . ">" . $worker[$i]->name . "</option>";                    
                    } 
                  ?>
                </select>
              </div>

              <div class="form-group">
                <p class="text-req">Pembrondol<em>*</em></p>
                <select class="custom-select" id="pembrondolId" name="pembrondolId" required>
                  <option value="" selected disabled>Pilih Pembrondol</option>
                  <?php 
                    for ($i = 0; $i < count($worker); $i++) {
                        echo "<option value=" . $worker[$i]->id . ">" . $worker[$i]->name . "</option>";                    
                    } 
                  ?>
                </select>
              </div>

              <div class="form-group">
                <p class="text-req">TBS Dipanen<em>*</em></p>
                <input type="number" name="tbsDipanen" class="form-control" placeholder="" min=0 value=0>
              </div>

              <div class="form-group">
                <p class="text-req">Mentah<em>*</em></p>
                <input type="number" name="mentah" class="form-control" placeholder="" min=0 value=0>
              </div>

              <div class="form-group">
                <p class="text-req">Kurang Matang<em>*</em></p>
                <input type="number" name="kurangMatang" class="form-control" placeholder="" min=0 value=0>
              </div>

              <div class="form-group">
                <p class="text-req">Terlalu Matang<em>*</em></p>
                <input type="number" name="terlaluMatang" class="form-control" placeholder="" min=0 value=0>
              </div>

              <div class="form-group">
                <p class="text-req">Kosong<em>*</em></p>
                <input type="number" name="kosong" class="form-control" placeholder="" min=0 value=0>
              </div>

              <div class="form-group">
                <p class="text-req">Busuk<em>*</em></p>
                <input type="number" name="busuk" class="form-control" placeholder="" min=0 value=0>
              </div>

              <div class="form-group">
                <p class="text-req">Brondolan<em>*</em></p>
                <input type="number" name="brondolan" class="form-control" placeholder="" min=0 value=0>
              </div>

              <div class="form-group">
                <p class="text-req">Catatan<em>*</em></p>
                <textarea class="form-control" rows="2" name="catatan" placeholder=""></textarea>
              </div>

              <div class="float-right">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

</body>

<?php include 'footer.php';?>


<script>
  $('#datepicker4').datepicker({
    dateFormat: 'yy-mm-dd'
  });

    $('#afdelingId').change(function(){
        afdelingId = $('#afdelingId').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('areaStatement/getPlantingYear'); ?>", 
            dataType:"json",//return type expected as json
            data:{"afdelingId": afdelingId},
            success: function(afdeling){
                for (var i = 0; i < afdeling.length; i++) {
                    var opt = $('<option />'); 
                    opt.val(afdeling[i]["id"]);
                    opt.text(afdeling[i]["name"]);
                    $('#tahunTanamId').append(opt);
                }
            },
        });

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('worker/getWorkerGroup'); ?>", 
            dataType:"json",//return type expected as json
            data:{"afdelingId": afdelingId},
            success: function(group){
                for (var i = 0; i < group.length; i++) {
                    var opt = $('<option />'); 
                    opt.val(group[i]["id"]);
                    opt.text(group[i]["name"]);
                    $('#groupId').append(opt);
                }
            },
        });
    });

    $('#tahunTanamId').change(function(){
        tahunTanamId = $('#tahunTanamId').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('areaStatement/getBlock'); ?>", 
            data:{tahunTanamId: tahunTanamId},
            dataType:"json",//return type expected as json
            success: function(block){
                for (var i = 0; i < block.length; i++) {
                    var opt = $('<option />'); 
                    opt.val(block[i]["id"]);
                    opt.text(block[i]["name"]);
                    $('#blockId').append(opt);
                }
            },
        });
    });

    $('#blockId').change(function(){
        blockId = $('#blockId').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('areaStatement/getTph'); ?>", 
            data:{blockId: blockId},
            dataType:"json",//return type expected as json
            success: function(tph){
                for (var i = 0; i < tph.length; i++) {
                    var opt = $('<option />'); 
                    opt.val(tph[i]["id"]);
                    opt.text(tph[i]["name"]);
                    $('#tphId').append(opt);
                }
            },
        });
    });

    $('#groupId').change(function(){
      groupId = $('#groupId').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('worker/getMandore'); ?>", 
            data:{groupId: groupId},
            dataType:"json",//return type expected as json
            success: function(mandore){
                for (var i = 0; i < mandore.length; i++) {
                    var opt = $('<option />'); 
                    opt.val(mandore[i]["id"]);
                    opt.text(mandore[i]["name"]);
                    $('#mandorId').append(opt);
                }
            },
        });
    });
  </script>
</html>