<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php echo $this->session->flashdata('success'); ?>
                <div class="header">
                    <h4 class="title text-center">Daftar Pengajuan Ujian Proposal</h4>
                </div>
                <div class="content">
                    <table class="table table-bordered table-hover" id="manageMemberTable">
                      <thead>
                        <th class="text-center no-sort">No.</th>
                        <th class="text-center">Nama Mahasiswa</th>
                        <th class="text-center" width="46%">Judul</th>
                        <th class="text-center" width="10%">Status</th>
                        <?php if ($this->session->userdata('logged_in')) { ?>
                            <th class="text-center" width="20%">Action</th>
                        <?php } ?>
                      </thead>
                        <tbody>
                            <?php 
                            $rowCount = 1;
                                foreach ($data['query1'] as $value) { ?>
                                <tr>
                                <td class="text-center"><p><?php echo $rowCount; ?></p></td>
                                <td><?php echo $value->namamhs; ?></td>
                                <td><?php echo $value->judul; ?></td>
                                <td><?php echo $value->statskripsi; ?></td>
                                <td class="td-actions text-center">
                                    <a type="button" rel="tooltip" href="<?php echo base_url('adm-bimbingan/detail/'.$value->idskripsi);?>" title="Revisi" class="btn btn-info btn-fill">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a type="button" rel="tooltip" href="<?php echo base_url('adm-bimbingan/proposal/'.$value->idskripsi);?>" title="Daftarkan Ke Ujian Proposal" class="btn btn-warning btn-fill">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <?php if ($value->stat>=5): ?>
                                    <a type="button" rel="tooltip" href="<?php echo base_url('adm-bimbingan/skripsi/'.$value->idskripsi);?>" title="Daftarkan Ke Ujian Skripsi" class="btn btn-danger btn-fill">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <?php endif ?>
                                   
                                </td>
                            </tr>
                           <?php $rowCount++; } ?>
                        </tbody>
                    </table>
              </div>
          </div>
      </div>
    </div>

    <?php if ($data['query2']!=NULL): ?>
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php echo $this->session->flashdata('success'); ?>
                <div class="header">
                    <h4 class="title text-center">Daftar Bimbingan Skripsi Mahasiswa</h4>
                    <p class="category text-center">sebagai Penguji 1</p>
                </div>
                <div class="content">
                    <table class="table table-bordered table-hover" id="manageMemberTable">
                      <thead>
                        <th class="text-center no-sort">No.</th>
                        <th class="text-center">Nama Mahasiswa</th>
                        <th class="text-center" width="46%">Judul</th>
                        <th class="text-center" width="46%">Status</th>
                        <?php if ($this->session->userdata('logged_in')) { ?>
                            <th class="text-center" width="10%">Action</th>
                        <?php } ?>
                      </thead>
                        <tbody>
                            <?php 
                            $rowCount = 1;
                                foreach ($data['query2'] as $value) { ?>
                                <tr>
                                <td class="text-center"><p><?php echo $rowCount; ?></p></td>
                                <td><?php echo $value->namamhs; ?></td>
                                <td><?php echo $value->judul; ?></td>
                                <td><?php echo $value->statskripsi; ?></td>
                                <td class="td-actions text-center">
                                    <a type="button" rel="tooltip" href="<?php echo base_url('adm-bimbingan/detail/'.$value->idskripsi);?>" title="Revisi" class="btn btn-info btn-fill">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                           <?php $rowCount++; } ?>
                        </tbody>
                    </table>
              </div>
          </div>
      </div>
    </div>
    <?php endif ?>

</div>
</div>