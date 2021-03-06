<style>
td.details-control {
    background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('https://datatables.net/examples/resources/details_close.png') no-repeat center center;
}
</style>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <?php $this->load->view('layout/breadcrumb') ?>

            <div class="row">
                              <div class="col-lg-6">
                                  <div class="panel panel-primary">
                                      <div class="panel-heading">
                                          <h3 class="panel-title">Ringkasan Sumber</h3>
                                      </div>
                                      <div class="panel-body">
                                          <ul class="list-group">
                                              <li class="list-group-item">
                                                  <span class="badge badge-success" id="jum_pupr" style="font-size:10pt; font-weight: bold;">0</span>
                                                  PUPR
                                              </li>
                                              <li class="list-group-item">
                                                  <span class="badge badge-danger" id="jum_sni" style="font-size:10pt; font-weight: bold;">0</span>
                                                  SNI
                                              </li>
                                              <li class="list-group-item">
                                                  <span class="badge badge-danger" id="jum_estimatorid" style="font-size:10pt; font-weight: bold;">0</span>
                                                  Estimator.id
                                              </li>
                                              <li class="list-group-item">
                                                  <span class="badge badge-danger" id="jum_empiris" style="font-size:10pt; font-weight: bold;">0</span>
                                                  Empiris
                                              </li>
                                          </ul>
                                      </div>
                                      <div class="panel-footer">
                                        <strong><h4 class="panel-title" style="margin-left: 25px;">Jumlah AHS yang dibutuhkan <span class="badge badge-primary pull-right" id="jum_ahs" style="font-size:11pt; font-weight: bold; margin-right: 21px;"></span></h4></strong>
                                      </div>
                                  </div>
                              </div>
                            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="button" id="btn-tambah" class="btn btn-primary waves-effect waves-light" onclick="tampilTambahAHS()"><strong><i class="fa  fa-plus-circle"></i> TAMBAH <?php echo $menu ?></strong></button>
                    <button type="button" id="btn-impor" class="btn btn-danger waves-effect waves-light" onclick="tampilImporAHS()"><strong><i class="fa fa-upload"></i> IMPOR <?php echo $menu ?></strong></button>
                    <button type="button" id="btn-impor-bua" class="btn btn-danger waves-effect waves-light" onclick="tampilImporBUA()"><strong><i class="fa fa-upload"></i> IMPOR BUA</strong></button>
                    <br><br>
                    <div id="panel-tambah-ahs" class="panel panel-default" style="display: none">
                        <div class="panel-heading"> 
                            <h3 class="panel-title">TAMBAH <?php echo $menu ?></h3> 
                        </div> 
                        <div class="panel-body"> 
                          <form role="form" id="frm-ahs">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <!-- <div class="form-group">
                                        <label>ID Kategori Pekerjaan</label>
                                        <input type="hidden" id="id_kategori_pekerjaan" name="id_kategori_pekerjaan" class="form-control">
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label>Nama Kategori Pekerjaan</label>
                                        <input type="hidden" id="nama_kategori_pekerjaan" name="nama_kategori_pekerjaan" class="form-control">
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label>ID Pekerjaan</label>
                                        <input type="hidden" id="id_pekerjaan" name="id_pekerjaan" class="form-control">
                                    </div> -->
                                    <div class="form-group">
                                        <label>Nama Pekerjaan</label>
                                        <input type="text" id="nama_pekerjaan" name="nama_pekerjaan" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <select class="select2-satuan required" style="width: 100%" id="satuan" name="satuan">
                                          <option value=""></option>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group"> -->
                                        <!-- <label>Tahun</label> -->
                                        <!-- <div id="spinner-tahun">
                                          <div class="input-group input-small">
                                              <input type="hidden" id="tahun" name="tahun" class="spinner-input form-control" maxlength="4" readonly="">
                                              <div class="spinner-buttons input-group-btn btn-group-vertical">
                                                  <button type="button" class="btn spinner-up btn-xs btn-default waves-effect">
                                                      <i class="fa fa-angle-up"></i>
                                                  </button>
                                                  <button type="button" class="btn spinner-down btn-xs btn-default waves-effect">
                                                      <i class="fa fa-angle-down"></i>
                                                  </button>
                                              </div>
                                          </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <!-- <label>Sumber</label> -->
                                        <!-- <select id="sumber" name="sumber" class="form-control">
                                          <option value="">- Pilih -</option>
                                          <option value="1">PUPR</option>
                                          <option value="2">SNI</option>
                                          <option value="3" selected>Estimator.id</option>
                                        </select>
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="hidden" id="keterangan" name="keterangan" class="form-control">
                                    </div> -->
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table class="table table-bordered table-striped" id="tabel-bahan">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center" width="15%">ID Bahan</th>
                                                <th style="text-align: center" width="50%">Uraian Bahan</th>
                                                <th style="text-align: center" width="13%">Satuan</th>
                                                <th style="text-align: center" width="15%">Koefisien</th>
                                                <th style="text-align: center" width="7%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data-bahan"></tbody>
                                    </table>
                                </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="panel-footer"> 
                                          <button type="button" id="btn-tambah-bahan" class="btn btn-info waves-effect waves-light" onclick="tambahRincian('A')"><strong><i class="fa fa-plus-circle"></i> TAMBAH BAHAN</strong></button>
                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-isi="Web Master"><i class="fa fa-plus-circle"></i> BAHAN BARU</button>
                                      </div> 
                                    </div>
                                  </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table class="table table-bordered table-striped" id="tabel-upah">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center" width="15%">ID Upah</th>
                                                <th style="text-align: center" width="50%">Uraian Upah</th>
                                                <th style="text-align: center" width="13%">Satuan</th>
                                                <th style="text-align: center" width="15%">Koefisien</th>
                                                <th style="text-align: center" width="7%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data-upah"></tbody>
                                    </table>
                                </div>
                                <div class="panel-footer"> 
                                    <h3 class="panel-title"><button type="button" id="btn-tambah-upah" class="btn btn-info waves-effect waves-light" onclick="tambahRincian('B')"><strong><i class="fa fa-plus-circle"></i> TAMBAH UPAH</strong></button></h3> 
                                </div> 
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table class="table table-bordered table-striped" id="tabel-alat">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center" width="15%">ID Alat</th>
                                                <th style="text-align: center" width="50%">Uraian Alat</th>
                                                <th style="text-align: center" width="13%">Satuan</th>
                                                <th style="text-align: center" width="15%">Koefisien</th>
                                                <th style="text-align: center" width="7%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data-alat"></tbody>
                                    </table>
                                </div>
                                <div class="panel-footer"> 
                                    <h3 class="panel-title"><button type="button" id="btn-tambah-alat" class="btn btn-info waves-effect waves-light" onclick="tambahRincian('C')"><strong><i class="fa fa-plus-circle"></i> TAMBAH ALAT</strong></button></h3> 
                                </div>
                            </div>
                            <center>
                              <button type="button" id="btn-simpan" class="btn btn-success waves-effect waves-light" onclick="simpanAHS()"><strong><i class="fa fa-check"></i> SIMPAN</strong></button>
                              <button type="button" id="btn-batal" class="btn btn-warning waves-effect waves-light" onclick="batalTambahAHS()"><strong><i class="fa fa-times"></i> BATAL</strong></button>
                            <center>
                          </form>
                        </div> 
                    </div>

                    <div id="panel-impor-ahs" class="panel panel-default" style="display: none">
                        <div class="panel-heading"> 
                            <h3 class="panel-title">IMPOR <?php echo $menu ?></h3> 
                        </div> 
                        <div class="panel-body"> 
                          <form action="impor" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Pilih File (xls/xlsx)</label>
                                        <input type="file" class="form-control" name="file_ahs" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <center>
                              <button type="submit" id="btn-impor-ahs" class="btn btn-success waves-effect waves-light"><strong><i class="fa fa-upload"></i> IMPOR</strong></button>
                              <button type="button" id="btn-batal-impor" class="btn btn-warning waves-effect waves-light" onclick="batalImporAHS()"><strong><i class="fa fa-times"></i> BATAL</strong></button>
                            <center>
                          </form>
                        </div> 
                    </div>
                    
                    <div id="panel-impor-bua" class="panel panel-default" style="display: none">
                        <div class="panel-heading"> 
                            <h3 class="panel-title">IMPOR BUA</h3> 
                        </div> 
                        <div class="panel-body"> 
                          <form action="imporBUA" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Pilih File (xls/xlsx)</label>
                                        <input type="file" class="form-control" name="file_bua" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <center>
                              <button type="submit" id="btn-impor-bua" class="btn btn-success waves-effect waves-light"><strong><i class="fa fa-upload"></i> IMPOR</strong></button>
                              <button type="button" id="btn-batal-impor-bua" class="btn btn-warning waves-effect waves-light" onclick="batalImporBUA()"><strong><i class="fa fa-times"></i> BATAL</strong></button>
                            <center>
                          </form>
                        </div> 
                    </div>
                                        
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo "DATA ".$menu ?></h3>
                        </div>
                        <div class="panel-body">
                        <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                              <h3 class="panel-title">FILTERING</h3>
                          </div>
                      <div class="panel-body">
                          <div class="row">
                              <div class="col-md-4">
                                  <label>Proyek</label>
                                  <div class="form-group">
                                      <select class="select2-proyek required" style="width: 100%;" id="proyek-wilayah">
                                        <option value=""></option>
                                      </select>
                                  </div>
                              </div>
                              
                              <div class="col-md-4">
                                <label>Pengguna</label>
                                  <div class="form-group">
                                      <select class="select2-pengguna required" style="width: 100%;" id="proyek-pengguna">
                                        <option value=""></option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="tabel-ahs" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center" width="3%"></th>
                                                <th style="text-align: center" width="3%">No.</th>
                                                <th style="text-align: center" width="15%">Nama Proyek</th>
                                                <th style="text-align: center" width="20%">Nama Pekerjaan</th>
                                                <th style="text-align: center" width="15%">Satuan Pekerjaan</th>
                                                <th style="text-align: center" width="10%">Tahun</th>
                                                <th style="text-align: center" width="13%">Sumber</th>
                                                <th>ID Proyek</th>
                                                <th>ID Pekerjaan</th>
                                                <th>ID Pengguna</th>
                                                <th style="text-align: center" width="5%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Silahkan Masukkan Data Bahan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="form-group">
                              <label for="recipient-name" class="form-control-label">Nama Bahan:</label>
                              <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="form-control-label">Satuan:</label>
                              <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="form-control-label">Spesifikasi:</label>
                              <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="form-control-label">Merk:</label>
                              <input type="text" class="form-control" id="recipient-name">
                            </div>          
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </div>
                </div>

            </div> <!-- End Row -->

        </div> <!-- container -->
                   
    </div> <!-- content -->

    <?php $this->load->view('layout/footer') ?>

</div>

<script type="text/javascript">
  function reloadData(){ tabel.ajax.reload(); }

  function tampilTambahAHS(){
    $('#panel-tambah-ahs').show();
    $('#btn-tambah').hide();
  }

  function batalTambahAHS(){
    $('#panel-tambah-ahs').hide();
    $('#btn-tambah').show();
  }

  function tampilImporAHS(){
    $('#panel-impor-ahs').show();
    $('#btn-impor').hide();
  }
  
  function tampilImporBUA(){
    $('#panel-impor-bua').show();
    $('#btn-impor-bua').hide();
  }

  function batalImporAHS(){
    $('#panel-impor-ahs').hide();
    $('#btn-impor').show();
  }
  
  function batalImporBUA(){
    $('#panel-impor-bua').hide();
    $('#btn-impor-bua').show();
  }
  
  String.prototype.toProperCase = function () {
    return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
  };

  function getInfoKategori(kategori,id_kategori,index) {
    $.ajax({
        type : 'get',
        url : "<?php echo base_url() ?>api/getRincian"+kategori.toProperCase()+"/"+id_kategori,
        dataType: "JSON",
        success : function(data){
          if (data != null) {
            $('#id_'+kategori+index).val(data.id_kategori);
            $('#nama_'+kategori+index).val(data.nama_kategori);
            $('#satuan_'+kategori+index).val(data.satuan);
            $('#sumber_'+kategori+index).val(data.sumber);
          } else {
            $('#id_'+kategori+index).val("");
            $('#nama_'+kategori+index).val($('#temp_'+kategori+index).val());
            $('#satuan_'+kategori+index).val("");
            $('#sumber_'+kategori+index).val("2");
          }
        }
    });
  }
  
  function hapusRincian(kategori,index) {
      $('#rincian_'+kategori+index).remove();
  }
  
  var i = 0;
  function tambahRincian(ktg) {
    var kategori;
    if (ktg == 'A') kategori = "bahan";
    else if (ktg == 'B') kategori = "upah";
    else kategori = "alat";

    i++;
    $('#data-'+kategori).append("<tr id='rincian_"+kategori+i+"'>"+
        "<td>"+
          "<input type='hidden' id='kategori_"+kategori+i+"' name='kategori_"+kategori+"[]' value='"+ktg+"'>"+
          "<input type='hidden' id='sumber_"+kategori+i+"' name='sumber_"+kategori+"[]'>"+
          "<input type='text' id='id_"+kategori+i+"' name='id_"+kategori+"[]' class='form-control'>"+
        "</td>"+
        "<td><select class='select2-"+kategori+"' id='temp_"+kategori+i+"' style='width: 100%' onchange='getInfoKategori(\""+kategori+"\",$(this).val(),"+i+")'"+
                "<option value=''></option>"+
             "</select>"+
             "<input type='hidden' id='nama_"+kategori+i+"' name='nama_"+kategori+"[]'>"+
        "</td>"+
        "<td style='text-align: center'><input type='text' id='satuan_"+kategori+i+"' name='satuan_"+kategori+"[]' class='form-control'></td>"+
        "<td><input type='text' id='koefisien_"+kategori+i+"' name='koefisien_"+kategori+"[]' class='form-control'></td>"+
        "<td style='text-align: center'>"+
          "<button class='btn btn-danger btn-icon waves-effect waves-light' id='btn-hapus-"+kategori+i+"' onclick='hapusRincian(\""+kategori+"\","+i+")'><i class='fa fa-trash'></i></button>"+
        "</td>"+
      "</tr>");

    $(".select2-"+kategori).select2({
        theme: "bootstrap",
        placeholder: "Pilih "+kategori.toProperCase()+" atau Ketik "+kategori.toProperCase()+" Baru",
        allowClear: true,
        tags: true,
        "language": {
          "noResults": function() {
             return "<center><img src='<?php echo base_url() ?>assets/not-found.svg' width='30' /><br><strong>Tidak ada hasil ditemukan</strong></center>";
          },
          searching: function () {
             return "<center><img src='<?php echo base_url() ?>assets/searching.gif' width='30' /><br>Mencari hasil...</center>";
          },
          loadingMore: function () {
             return "<center><img src='<?php echo base_url() ?>assets/ajax-loader.svg' width='30'/></center>";
          }
        },
        escapeMarkup: function (markup) {
             return markup;
        },
        ajax: {
          url: "<?php echo base_url() ?>api/getList"+kategori.toProperCase()+"/",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              wilayah: '34.04',
              q: params.term,
              page_limit: 10,
              page: params.page
            };
          },
          processResults: function (data, params) {
            params.page = params.page || 1;

            return {
              results: data.results,
              pagination: {
                more: (params.page * 10) < data.total_count
              }
            };
          },
          cache: true
        }
    });
    
    $('[id^=koefisien]').inputmask('decimal',
        { 'alias': 'numeric',
          'groupSeparator': '.',
          'autoGroup': true,
          'digits': 4,
          'radixPoint': ",",
          'digitsOptional': false,
          'allowMinus': false,
          'placeholder': '0',
          'rightAlign': true,
          'autoUnmask': true,
          onUnMask: function (maskedValue, unmaskedValue, opts) {
            if (unmaskedValue === "" && opts.nullable === true) {
              return unmaskedValue;
            }
            var processValue = maskedValue.replace(opts.prefix, "");
            processValue = processValue.replace(opts.suffix, "");
            processValue = processValue.replace(new RegExp(Inputmask.escapeRegex(opts.groupSeparator), "g"), "");
            if (opts.radixPoint !== "" && processValue.indexOf(opts.radixPoint) !== -1) 
                 processValue = processValue.replace(Inputmask.escapeRegex.call(this, opts.radixPoint), ".");
            
            return processValue;
          }
        }
      );
  }

  var simpan_ahs = 0;
  function simpanAHS() {
    simpan_ahs++;
    if (simpan_ahs == 1) {
      $.ajax({
          url : "<?php echo base_url('api/simpanAHS') ?>",
          type: "POST",
          data: $('#frm-ahs').serialize(),
          dataType: "JSON",
          success: function(data){
            tampilNotifikasi(data.Info, 'success');
            $("#frm-ahs")[0].reset();
            reloadData();
            simpan_ahs = 0;
          }
      });
    }
  }

  function getRingkasanAHS(){
    // $.ajax({
    //     url : "<?php echo base_url('api/getRingkasanSumberAHS') ?>",
    //     type: "POST",
    //     dataType: "JSON",
    //     success: function(data){
    //       $('#jum_pupr').html(data.PUPR);
    //       $('#jum_sni').html(data.SNI);
    //       $('#jum_estimatorid').html(data.ESTIMATORID);
    //       $('#jum_semua').html(parseInt(data.PUPR) + parseInt(data.SNI) + parseInt(data.ESTIMATORID));
    //     }
    // });

         $.ajax({
             url : "<?php echo base_url('api/getRingkasanSumberAHS') ?>",
             type: "POST",
             dataType: "JSON",
             success: function(data){
              $('#jum_pupr').html(data.PUPR);
              $('#jum_sni').html(data.SNI);
              $('#jum_estimatorid').html(data.ESTIMATORID);
              $('#jum_empiris').html(data.EMPIRIS);
              $('#jum_ahs').html(parseInt(data.PUPR) + parseInt(data.SNI) + parseInt(data.ESTIMATORID) + parseInt(data.EMPIRIS));
           
             }
         });
  }
  
  function format (data) {
    var rincian_ahs = '';
    rincian_ahs = '<table class="table table-striped table-bordered" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<thead>'+
            '<th width="30%">Nama Kategori</th>'+
            '<th width="10%">Koefisien</th>'+
            '<th width="10%">Harga Dasar</th>'+
        '</thead>'+
        '<tbody>';
            $.each(data, function(i, val){
                rincian_ahs += '<tr>'+
                    '<td>'+val.nama_kategori+'</td>'+
                    '<td>'+val.koefisien+'</td>'+
                    '<td>'+val.harga_dasar+'</td>'+
                '</tr>';
            });
    rincian_ahs += '</tbody></table>';
    
    return rincian_ahs;
  }

  var tabel;
  $(document).ready(function() {
      var thn_sekarang = new Date().getFullYear();
      $('[id*=spinner-tahun]').spinner({value: thn_sekarang, min: thn_sekarang-3, max: thn_sekarang+1});
      $('#menu_estimasi').click();
      $('#menu_ahs').prop('class','active');
      getRingkasanAHS();

      function formatData (data) {
          if (!data.id) { return data.text; }
          if (data.kategori != "2") {
            return "<b>"+data.text+"</b>";
          } else {
            return "<span style='padding-left:20px'>"+data.text+"</span>";
          }
      }
    
      $(".select2-proyek").select2({
          theme: "bootstrap",
          placeholder: "Pilih proyek",
          allowClear: true,
          "language": {
            "noResults": function() {
               return "<center><img src='<?php echo base_url() ?>assets/not-found.svg' width='30' /><br><strong>Tidak ada hasil ditemukan</strong></center>";
            },
            searching: function () {
               return "<center><img src='<?php echo base_url() ?>assets/searching.gif' width='30' /><br>Mencari hasil...</center>";
            },
            loadingMore: function () {
               return "<center><img src='<?php echo base_url() ?>assets/ajax-loader.svg' width='30'/></center>";
            }
          },
          escapeMarkup: function (markup) {
               return markup;
          },
          ajax: {
            url: "<?php echo base_url('api/getListProyek') ?>",
            dataType: 'json',
            delay: 250,
            data: function (params) {
              return {
                q: params.term,
                page_limit: 10,
                page: params.page
              };
            },
            processResults: function (data, params) {
              params.page = params.page || 1;
    
              return {
                results: data.results,
                pagination: {
                  more: (params.page * 10) < data.total_count
                }
              };
            },
            cache: true
          },
          templateResult: formatData
      });
      
      $(".select2-pengguna").select2({
          theme: "bootstrap",
          placeholder: "Pilih Pengguna",
          allowClear: true,
          tags: true,
          "language": {
            "noResults": function() {
               return "<center><img src='<?php echo base_url() ?>assets/not-found.svg' width='30' /><br><strong>Tidak ada hasil ditemukan</strong></center>";
            },
            searching: function () {
               return "<center><img src='<?php echo base_url() ?>assets/searching.gif' width='30' /><br>Mencari hasil...</center>";
            },
            loadingMore: function () {
               return "<center><img src='<?php echo base_url() ?>assets/ajax-loader.svg' width='30'/></center>";
            }
          },
          escapeMarkup: function (markup) {
               return markup;
          },
          ajax: {
            url: "<?php echo $this->config->item('url_server') ?>api/getListPengguna/",
            dataType: 'json',
            delay: 250,
            data: function (params) {
              return {
                q: params.term,
                page_limit: 10,
                page: params.page
              };
            },
            processResults: function (data, params) {
              params.page = params.page || 1;
    
              return {
                results: data.results,
                pagination: {
                  more: (params.page * 10) < data.total_count
                }
              };
            },
            cache: true
          }
      });

      $(".select2-satuan").select2({
          theme: "bootstrap",
          placeholder: "Pilih Satuan",
          allowClear: true,
          tags: true,
          "language": {
            "noResults": function() {
               return "<center><img src='<?php echo base_url() ?>assets/not-found.svg' width='30' /><br><strong>Tidak ada hasil ditemukan</strong></center>";
            },
            searching: function () {
               return "<center><img src='<?php echo base_url() ?>assets/searching.gif' width='30' /><br>Mencari hasil...</center>";
            },
            loadingMore: function () {
               return "<center><img src='<?php echo base_url() ?>assets/ajax-loader.svg' width='30'/></center>";
            }
          },
          escapeMarkup: function (markup) {
               return markup;
          },
          ajax: {
            url: "<?php echo $this->config->item('url_server') ?>api/getListSatuan/",
            dataType: 'json',
            delay: 250,
            data: function (params) {
              return {
                q: params.term,
                page_limit: 10,
                page: params.page
              };
            },
            processResults: function (data, params) {
              params.page = params.page || 1;
    
              return {
                results: data.results,
                pagination: {
                  more: (params.page * 10) < data.total_count
                }
              };
            },
            cache: true
          }
      });
      
      $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings){
        return {
          "iStart": oSettings._iDisplayStart,
          "iEnd": oSettings.fnDisplayEnd(),
          "iLength": oSettings._iDisplayLength,
          "iTotal": oSettings.fnRecordsTotal(),
          "iFilteredTotal": oSettings.fnRecordsDisplay(),
          "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
          "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
      };
        
      tabel = $("#tabel-ahs").DataTable({
        "language": {
          "info": "Menampilkan _START_ sampai _END_ dari jumlah data",
          "sInfoEmpty": "",
          "sInfoFiltered": "(terfilter dari _MAX_ data)",
          "emptyTable": "<center><img src='<?php echo base_url() ?>assets/not-found.svg' width='100' /><br><strong>Tidak ada hasil ditemukan</strong></center>",
          "sLengthMenu": "Data per Halaman: _MENU_",
            "sLoadingRecords": "<img src='<?php echo base_url() ?>assets/ajax-loader.svg' /><br>Silakan tunggu, data sedang di-load...",
            "sProcessing": "<img src='<?php echo base_url() ?>assets/ajax-loader.svg' />",
            "sSearch": "Cari Data:",
            "sSearchPlaceholder": "Masukkan kata kunci...",
            "sZeroRecords": "<center><img src='<?php echo base_url() ?>assets/not-found.svg' width='100' /><br><strong>Tidak ada hasil ditemukan</strong></center>",
          "paginate": {
            "first": "Pertama",
            "last": "Terakhir",
            "previous": "Sebelumnya",
            "next": "Berikutnya"
          }
        },
        processing: true,
        serverSide: true,
        ajax: {
          "url": "<?php echo base_url('api/getTabelAHS') ?>",
          "type": "POST",
          data: function (data) {
            data.namaproyek = $('#proyek-wilayah').val();
            data.pengguna = $('#proyek-pengguna').val();
          }
        },
        "columnDefs": [
          {
            "targets": [ 7, 8, 9 ],
            "visible": false,
            "searchable": false
          }
        ],
        order: [2, 'asc'],
        "bInfo": false,
        rowCallback: function (row, data, iDisplayIndex) {
          var info = this.fnPagingInfo();
          var page = info.iPage;
          var length = info.iLength;
          var index = page * length + (iDisplayIndex + 1);
          $('td:eq(0)', row).addClass("details-control");
          $('td:eq(1)', row).html(index);
          $('td:eq(1),td:eq(4),td:eq(5)', row).prop('align','center');
        },
        scrollY: 700,
        scrollCollapse: true
      });
      
      $('#tabel-ahs tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = tabel.row(tr);
        var data = row.data();
        var id_proyek = data[7];
        var id_pekerjaan = data[8];
 
        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            $.ajax({
                url : "<?php echo base_url('api/getRincianAHS/') ?>"+id_proyek+"/"+id_pekerjaan,
                type: "POST",
                dataType: "JSON",
                success: function(data){
                   row.child(format(data)).show();
                   tr.addClass('shown');
                }
            });
        }
      });

      $('#proyek-wilayah,#proyek-pengguna').on('change', function() {
          reloadData();
          getRingkasanStatus($(this).val());
      });
      
      // getRingkasanStatus($('#wilayah').val());
      
      tambahRincian('A');
      tambahRincian('B');
      tambahRincian('C');
  } );
</script>