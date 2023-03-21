<script type="text/javascript">
  var save_method; //for save method string
  var table;

  $(document).ready(function() {

    $('.single-select').select2({
      theme: 'bootstrap4',
      width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
      placeholder: $(this).data('placeholder'),
      allowClear: Boolean($(this).data('allow-clear')),
    });

    $('.single-select-form').select2({
      dropdownParent: $('#modal_form_tambah'),
      theme: 'bootstrap4',
      width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
      placeholder: $(this).data('placeholder'),
      allowClear: Boolean($(this).data('allow-clear')),
    });


    table = $('#table').DataTable({
      processing: true,
      serverSide: false,
      filter: false,
      autoWidth: true,
      paginate: true,
      info: true,
      ajax: {
        url: "<?php echo site_url('pendaftaran/ajax_list') ?>",
        type: "POST",
        data: function(data) {
          data.nama = $('#filter_nama').val();
          data.alamat = $('#filter_alamat').val();
          data.tempat_lhr = $('#filter_tempat_lhr').val();
          data.tanggal_lhr = $('#filter_tanggal_lhr').val();
          data.email = $('#filter_email').val();
          data.no_tlp = $('#filter_no_tlp').val();
          data.jenis_kelamin = $('#filter_jk').val();
        }
      },

      language: {
        sProcessing: 'Loading...',
        sLengthMenu: 'Tampilkan _MENU_ entri',
        sZeroRecords: 'Tidak ditemukan data yang sesuai',
        sInfo: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ entri',
        sInfoEmpty: 'Menampilkan 0 sampai 0 dari 0 entri',
        sInfoFiltered: '(disaring dari _MAX_ entri keseluruhan)',
        sInfoPostFix: '',
        sSearch: 'Cari:',
        sUrl: '',
        oPaginate: {
          sFirst: '<<',
          sPrevious: '<',
          sNext: '>',
          sLast: '>>'
        }
      },

      order: [],
      columns: [{
          'data': 'no',
          'orderable': true
        },
        {
          'data': 'nama',
          'orderable': true
        },
        {
          'data': 'tempat_lhr',
          'orderable': true
        },
        {
          'data': 'tanggal_lhr_indo',
          'orderable': true,
        },
        {
          'data': 'nama_jk',
          'orderable': true,
        },
        {
          'data': 'alamat',
          'orderable': true,
        },
        {
          'data': 'email',
          'orderable': true,
        },
        {
          'data': 'no_tlp',
          'orderable': true,
        },
        {
          'data': 'foto',
          'orderable': true,
        },
        {
          'data': 'aksi',
          'orderable': false,
          'className': 'text-center'
        }
      ]
    });

    $("#filter_nama").keyup(function(event) {
      if (event.keyCode == 13) {
        reload_table();
      }
    });
    $("#filter_alamat").keyup(function(event) {
      if (event.keyCode == 13) {
        reload_table();
      }
    });
    $("#filter_tempat_lhr").keyup(function(event) {
      if (event.keyCode == 13) {
        reload_table();
      }
    });
    $("#filter_tanggal_lhr").keyup(function(event) {
      if (event.keyCode == 13) {
        reload_table();
      }
    });
    $("#filter_email").keyup(function(event) {
      if (event.keyCode == 13) {
        reload_table();
      }
    });
    $("#filter_no_tlp").keyup(function(event) {
      if (event.keyCode == 13) {
        reload_table();
      }
    });
    $("#filter_jk").change(function() {
      reload_table();
    });
  });

  function add() {
    save_method = 'add';
    $('#form')[0].reset();
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').empty();
    load_jk();
    $('#form_foto_banner').empty();
    $('#form_foto_banner').append(html_form_upload());
    $('#modal_form_tambah').modal('show');
    $('.modal-title-tambah').text('Tambah Pendaftar');
  }

  function edit(id_pendaftar) {
    save_method = 'edit';
    $('#form')[0].reset();
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').empty();
    load_jk();

    $.ajax({
      url: "<?php echo site_url('pendaftaran/ajax_edit/') ?>/" + id_pendaftar,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        if (data.status) {
          $('[name="id_pendaftar"]').val(data.data.id_pendaftar);
          $('[name="nama"]').val(data.data.nama);
          $('[name="alamat"]').val(data.data.alamat);
          $('[name="tempat_lhr"]').val(data.data.tempat_lhr);
          $('[name="tanggal_lhr"]').val(data.data.tanggal_lhr);
          $('[name="jenis_kelamin"]').val(data.data.jenis_kelamin).change();
          $('[name="email"]').val(data.data.email);
          $('[name="no_tlp"]').val(data.data.no_tlp);
          $('[name="nama_foto_banner_get"]').val(data.data.path_foto);
          $('#form_foto_banner').empty();
          $('#form_foto_banner').append(html_form_upload());
          if (!data.data.path_foto) {
            $("#preview_banner_0").hide();
          } else {
            $("#preview_banner_0").show();
          }
          $('#preview_banner_0').html('<img src="assets/img/upload/' + data.data.path_foto + '" width="100%">');
          $('#modal_form_tambah').modal('show');
          $('.modal-title-tambah').text('Ubah Data Pendaftar');
        } else {
          alert('Data tidak ditemukan !');
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error get data from ajax');
      }
    });
  }

  function reload_table() {
    table.ajax.reload(null, false);
  }

  function reload_page() {
    window.location.reload();
  }

  function del(id) {
    Swal.fire({
      title: 'Konfirmasi Hapus',
      text: "Apakah anda yakin ingin menghapus data ini ?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Tidak',
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?php echo site_url('pendaftaran/ajax_delete') ?>/" + id,
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            Swal.fire({
              type: 'success',
              title: 'Sukses',
              text: 'Berhasil menghapus data',
            });
            reload_table();
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert('Error deleting data');
          }
        });
      } else {
        return false;
      }
    })
  }

  function save() {
    Swal.fire({
      title: 'Konfirmasi Simpan',
      text: "Apakah anda yakin menyimpan data ini ?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Tidak',
    }).then((result) => {
      if (result.value) {
        $('#btnSave').text('Proses..'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').empty();
        var url;

        if (save_method == 'add') {
          url = "<?php echo site_url('pendaftaran/ajax_insert') ?>";
        } else if (save_method == 'edit') {
          url = "<?php echo site_url('pendaftaran/ajax_update') ?>";
        }

        $.ajax({
          url: url,
          type: "POST",
          data: $('#form').serialize(),
          dataType: "JSON",
          success: function(data) {
            if (data.status) {
              $('#modal_form_tambah').modal('hide');
              Swal.fire({
                type: 'success',
                title: 'Sukses',
                text: 'Berhasil menyimpan data',
              });
              reload_table();
            } else {
              if (data.error_class) {
                $('[name="nama"]').addClass(data.error_class['nama']);
                $('[name="nama"]').next().html(data.error_string['nama']);

                $('[name="tempat_lhr"]').addClass(data.error_class['tempat_lhr']);
                $('[name="tempat_lhr"]').next().html(data.error_string['tempat_lhr']);

                $('[name="tanggal_lhr"]').addClass(data.error_class['tanggal_lhr']);
                $('[name="tanggal_lhr"]').next().html(data.error_string['tanggal_lhr']);

                $('[name="tempat_lhr"]').addClass(data.error_class['tempat_lhr']);
                $('[name="tempat_lhr"]').next().html(data.error_string['tempat_lhr']);

                $('[name="nama_jk"]').addClass(data.error_class['nama_jk']);
                $('[name="nama_jk"]').next().html(data.error_string['nama_jk']);

                $('[name="alamat"]').addClass(data.error_class['alamat']);
                $('[name="alamat"]').next().html(data.error_string['alamat']);

                $('[name="email"]').addClass(data.error_class['email']);
                $('[name="email"]').next().html(data.error_string['email']);

                $('[name="no_tlp"]').addClass(data.error_class['no_tlp']);
                $('[name="no_tlp"]').next().html(data.error_string['no_tlp']);

                $('[name="nama_foto_banner_get"]').addClass(data.error_class['nama_foto_banner_get']);
                $('[name="nama_foto_banner_get"]').next().html(data.error_string['nama_foto_banner_get']);

              }
            }

            $('#btnSave').text('Simpan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            $('#btnSave').text('Simpan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable

          }
        });
      }

    })
    // ajax adding data to database
  }

  function html_form_upload() {
    var html = `<div class="row" style="margin-top:10px;" id="banner_0">
                <div class="col-md-12">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="foto_banner_0" name="foto_banner" onchange="uploadFile('banner',0)" accept=".jpg, .jpeg, .png">
                      <label class="custom-file-label" for="imgInp"></label>
                      <input class="form-control" type="hidden" name="nama_foto_banner" id="nama_foto_banner_0">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  
                  <span>
                    <div class="progress_banner_0" style="display:none">
                      <div id="progressBar_banner_0" class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                          <span class="sr-only">0%</span>
                      </div>
                    </div>
                  </span>
                </div>
                <div class="col-md-12" id="preview_banner_0" style="margin-top:10px;margin-bottom:10px;">
                  
                </div>
              </div>
              <input type="hidden" name="nama_foto_banner_old" id="nama_foto_banner_old">`;
    return html;
  }

  function uploadFile(type, param) {
    //validasi ukuran file
    if ($('#foto_' + type + '_' + param).prop('files')[0].size > 6000000) { // MAX 6MB
      Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'File yang anda pilih terlalu besar !'
      });
      $('#foto_' + type + '_' + param).val(null);
    } else {
      //proses upload file ke server
      var file = $('#foto_' + type + '_' + param).prop('files')[0];
      var dataForm = new FormData();
      dataForm.append('file', file);
      dataForm.append('type', type);
      $('.progress_' + type + '_' + param).show();
      $.ajax({
        xhr: function() {
          var xhr = new window.XMLHttpRequest();
          xhr.upload.addEventListener('progress', function(e) {
            if (e.lengthComputable) {
              // console.log('Bytes Loaded : ' + e.loaded);
              // console.log('Total Size : ' + e.total);
              // console.log('Persen : ' + (e.loaded / e.total));
              var percent = Math.round((e.loaded / e.total) * 100);
              $('#progressBar_' + type + '_' + param).attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
            }
          });
          return xhr;
        },

        url: "<?php echo site_url('pendaftaran/upload_foto'); ?>",
        type: "POST",
        data: dataForm,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
          if (data.status === false) {
            $("#preview_banner_0").hide();
            $('#nama_foto_' + type + '_' + param).val(null);
            $('#foto_' + type + '_' + param).val(null);
            $('#preview_' + type + '_' + param).html('');
            Swal.fire({
              type: 'error',
              title: 'Oops...',
              text: '' + data.error_string + ''
            });
          } else {
            // if (save_method == 'add') {
            //   del_temp_file(type, '#nama_foto_' + type + '_' + param);
            // }

            $('#nama_foto_' + type + '_' + param).val(data.file);
            $('#nama_foto_banner_get').val(data.file);
            $("#preview_banner_0").show();

            //preview lampiran
            $("#preview_" + type + "_" + param).html('<img src="<?php echo base_url(); ?>assets/img/upload/' + data.file + '" width="100%">');
            Swal.fire({
              type: 'success',
              title: 'Sukses',
              text: 'Berhasil Mengunggah File !',
              showConfirmButton: false,
              timer: 1500
            });
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Terjadi kesalahan !'
          });
        }
      });
    }
  }

  function load_jk() {
    $.ajax({
      url: "<?php echo base_url('pendaftaran/ajax_data') ?>",
      type: "POST",
      async: false,
      data: {
        type: 'jenis_kelamin',
      },
      dataType: "json",
      success: function(data) {
        var html = `<option value="">--Pilih--</option>`;
        if (data.status) {
          $.each(data.data, function(i, d) {
            html += `<option value="` + d.id_jk + `">` + d.nama_jk + `</option>`;
          });
        }
        $('[name="jenis_kelamin"]').html(html);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error get data from ajax');
      }
    });
  }

  function set_jk() {
    var nama_jk = $("#jenis_kelamin option:selected").text();
    $('#nama_jk').val(nama_jk);
  }
</script>

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
      </ol>
    </nav>
  </div>
</div>
<!--end breadcrumb-->

<div class="card shadow-sm radius-10 border-0 mb-3">
  <div class="card-body">
    <div>
      <h5 class="card-title">Data Pendaftar</h5>
    </div>

    <div class="row">
      <div class="col-md-12">
        <button type="button" onclick="add()" title="Tambah Pengguna" class="btn btn-sm btn-primary"><i class="bi bi-patch-plus"></i> Tambah Pendaftar</button>
        <div class="table-responsive" style="margin-top:20px;">
          <table id="table" class="table table-bordered table-striped" width="100%">
            <thead>
              <tr>
                <td class="text-center"><i class="bi bi-funnel" style="font-size: 20px;"></i></td>
                <td><input style="width:100%;" class="form-control" type="text" id="filter_nama" name="filter_nama"></td>
                <td><input style="width:100%;" class="form-control" type="text" id="filter_tempat_lhr" name="filter_tempat_lhr"></td>
                <td><input style="width:100%;" class="form-control" type="date" id="filter_tanggal_lhr" name="filter_tanggal_lhr"></td>
                <td>
                  <select class="form-control single-select" name="filter_jk" id="filter_jk">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="1">Laki-Laki</option>
                    <option value="2">Perempuan</option>
                  </select>
                </td>
                <td><input style="width:100%;" class="form-control" type="text" id="filter_alamat" name="filter_alamat"></td>
                <td><input style="width:100%;" class="form-control" type="text" id="filter_email" name="filter_email"></td>
                <td><input style="width:100%;" class="form-control" type="text" id="filter_no_tlp" name="filter_no_tlp"></td>
                <td></td>
                <td class="text-center">
                  <button type="button" onclick="reload_table()" data-toggle="tooltip" title="Refresh" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                      <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                    </svg></button>
                </td>
              </tr>
              <tr class="info">
                <th><b>No</b></th>
                <th><b>Nama</b></th>
                <th><b>Tempat Lahir</b></th>
                <th><b>Tanggal Lahir</b></th>
                <th><b>Jenis Kelamin</b></th>
                <th><b>Alamat</b></th>
                <th><b>Email</b></th>
                <th><b>No Telp</b></th>
                <th><b>Foto</b></th>
                <th><b>AKSI</b></th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_form_tambah" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title-tambah"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" id="form" class="form-horizontal">
          <div class="form-body">
            <div class="row">
              <input type="hidden" value="" name="id_pendaftar" id="id_pendaftar">

              <div class="col-md-6">
                <div class="form-group">
                  <div class="col-md-12 mb-3">
                    <label>Nama :</label>
                    <?php echo form_input(array(
                      'name' => 'nama',
                      'id' => 'nama',
                      'class' => 'form-control input-sm',
                      'placeholder' => 'Nama Pendaftar',
                      'type' => 'text',
                    ));
                    ?>
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="col-md-12 mb-3">
                    <label>Tempat Lahir :</label>
                    <?php echo form_input(array(
                      'name' => 'tempat_lhr',
                      'id' => 'tempat_lhr',
                      'class' => 'form-control input-sm',
                      'placeholder' => 'Tempat Lahir',
                      'type' => 'text',
                    ));
                    ?>
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="col-md-12 mb-3">
                    <label>Tanggal Lahir :</label>
                    <?php echo form_input(array(
                      'name' => 'tanggal_lhr',
                      'id' => 'tanggal_lhr',
                      'class' => 'form-control input-sm',
                      'placeholder' => 'Tanggal Lahir',
                      'type' => 'date',
                    ));
                    ?>
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="col-md-12 mb-3">
                    <label>Jenis Kelamin :</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control jenis_kelamin single-select-form" aria-required="true" aria-invalid="false" onchange="set_jk()">
                      <option value="">--Pilih--</option>
                    </select>
                    <?php echo form_input(array(
                      'name' => 'nama_jk',
                      'id' => 'nama_jk',
                      'class' => 'form-control input-sm',
                      'placeholder' => 'Jenis Kelamin',
                      'type' => 'hidden',
                    ));
                    ?>
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="col-md-12 mb-3">
                    <label>Alamat :</label>
                    <?php echo form_input(array(
                      'name' => 'alamat',
                      'id' => 'alamat',
                      'class' => 'form-control input-sm',
                      'placeholder' => 'Alamat',
                      'type' => 'text',
                    ));
                    ?>
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="col-md-12 mb-3">
                    <label>Email :</label>
                    <?php echo form_input(array(
                      'name' => 'email',
                      'id' => 'email',
                      'class' => 'form-control input-sm',
                      'placeholder' => 'No Telp',
                      'type' => 'email',
                    ));
                    ?>
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="col-md-12 mb-3">
                    <label>No Telp :</label>
                    <?php echo form_input(array(
                      'name' => 'no_tlp',
                      'id' => 'no_tlp',
                      'class' => 'form-control input-sm',
                      'placeholder' => 'No Telp',
                      'type' => 'number',
                    ));
                    ?>
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="col-md-12 mb-3">
                    <div class="row">
                      <label>Foto :</label>
                      <div class="col-md-12" id="form_foto_banner">
                      </div>
                      <input class="form-control" type="hidden" value="" name="nama_foto_banner_get" id="nama_foto_banner_get" placeholder="nama file" readonly>
                      <span class="help-block"></span>
                    </div>
                    <div class="row">
                      <div class="col-md-12"><span>Maksimal ukuran file 5 MB | Format jpg,jpeg,png</span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Simpan</button>
      </div>
    </div>
  </div>
</div>