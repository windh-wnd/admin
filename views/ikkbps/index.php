<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
             <?php $this->load->view('layout/breadcrumb') ?>             
                <div class="row" id="pengguna-tabel">
                    <div class="col-md-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h3 class="panel-title">TABEL ARTIKEL</h3>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <br>
                                    <table id="tabel-bugs" height="200px" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th style="text-align: center" width="3%">No</th>
                                                <th style="text-align: center" width="10%">Wilayah</th>
                                                <th style="text-align: center" width="20%">IKK</th>
                                                <th style="text-align: center" width="20%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="show_data">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
   $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil barang.
         
        $('#tabel-bugs').dataTable();
          
        //fungsi tampil barang
        function tampil_data_barang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url('api/getTabelArtikel')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                        '<td>'+[i+1]+'</td>'+
                                '<td>'+data[i].wilayah+'</td>'+
                                '<td>'+data[i].ikk+'</td>'+
                               '<td><button>Tambah</button><button>Ubah</button><button>Hapus</button></td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
 
    });
   
</script>