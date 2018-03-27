<div class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title text-center">BIMBINGAN SKRIPSI</h4>
            </div>
            <div class="content">
                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="form-group">
                        <label>judul</label>
                        <input type="text" class="form-control" readonly value="Rancang Bangun Sistem Skripsi Mahasiswa Di Universitas Muhammadiyah Sidoarjo">
                    </div>
                  </div>
                  <div class="col-md-10 col-md-offset-1">
                    <div class="form-group">
                        <label>Abstrak</label>
                            <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike" readonly>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</textarea>
                    </div>
                  </div>
                  <div class="col-md-10 col-md-offset-1">
                    <div class="form-group">
                        <label for="jeniskel">Dosen Pembimbing</label>
                        <input type="text" class="form-control" placeholder="" value="Drs. Syahputra Dinata / Web Development" readonly>

                         <!-- <select class="form-control" id="jeniskel">
                          <option>-</option>
                          <option>Laki-laki</option>
                          <option>Perempuan</option>
                        </select> -->
                    </div>
                  </div>

           <div class="col-md-10 col-md-offset-1 ">
            <div class="card card-plain">
                <embed src="<?php echo base_url(); ?>src/proposal_skripsi.pdf" width="100%" height="500" alt="pdf">
                <div class="content table-responsive table-full-width">
                    <table class="table">
                        <thead>
                            <th>Nama Mahasiswa</th>
                            <th>Catatan</th>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Abu Rizal Hakim</td>
                            <td>
                                  <textarea rows="9" class="form-control" placeholder="Here can be your description" value="Mike" readonly>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</textarea>
                            </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>

     <div class="col-md-10 col-md-offset-1">
        <button class="btn btn-warning btn-fill revisi" name="aksi" href="#" role="button">Revisi</button>
        <a class="btn btn-success btn-fill tombolrev" name="aksi" href="#" role="button">Selesai</a>
    </div>
</div>
</div>
</div>
   <div class="revisi">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title text-center">Formulir Revisi</h4>
                </div>
                <div class="content">
                  <input type="file" class="dropify" data-height="300" data-allowed-file-extensions="pdf" />
                    <div class="form-group">
                        <label style="padding-top: 3rem;">Catatan</label>
                            <textarea rows="5" class="form-control" placeholder="Isi catatan disini"></textarea>
                            <br>
                             <br>
                                <a class="btn btn-warning btn-fill pull-right" href="/skripsi/adm-pengajuan" role="button">Revisi</a>
                              <br>
                    </div>
                </div>

            </div>
        </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(".revisi").hide();
    $(".tombolrev").click(function(){
        $(".revisi").show();
    });
});
</script>