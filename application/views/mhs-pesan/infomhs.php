<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php echo $this->session->flashdata('success'); ?>
                <div class="header">
                    <h4 class="title text-center">Daftar Mahasiswa Skripsi</h4>
                </div>
                <div class="content">
                    <table class="table table-bordered table-hover" id="manageMemberTable">
                      <thead>
                        <th class="text-center no-sort">No.</th>
                        <th class="text-center">Pengirim</th>
                        <th class="text-center" width="30%">Subjek</th>
                        <th class="text-center" width="15%">status</th>
                        <th class="text-center" width="15%">Tanggal</th>
                        <?php if ($this->session->userdata('logged_in')) { ?>
                            <th class="text-center" width="10%">Action</th>
                        <?php } ?>
                      </thead>
                        <tbody>
                            <?php 
                            $rowCount = 1;
                                foreach ($data as $value) { ?>
                                <tr>
                                <td class="text-center"><p><?php echo $rowCount; ?></p></td>
                                <td><?php echo $value->namamhs; ?></td>
                                <td><?php echo $value->subject; ?></td>
                                <td><?php 
                                    if ($value->statpesan==1) {
                                        echo 'Sudah dibaca';
                                    } else {
                                        echo 'Belum dibaca';
                                    }
                                 ?></td>
                                 <td><?php echo date('d F Y',strtotime($value->created_at)); ?></td>

                                <td class="td-actions text-center">
                                    <a type="button" rel="tooltip" href="<?php echo base_url('pesan/detail/'.$value->idpesan);?>" title="Detail Pesan" class="btn btn-info btn-fill">
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
</div>
</div>