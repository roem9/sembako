<!-- tambah pemasukan -->
<div class="modal fade" id="modalTransaksi" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTransaksiLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group" id="list-transaksi"></ul>
            </div>
            </div>
        </div>
    </div>
<!-- tambah pemasukan -->

<div class="container">
    <?php if( $this->session->flashdata('pesan') ) : ?>
        <div class="row">
            <div class="col-12 col-md-6">
                <?= $this->session->flashdata('pesan');?>
                </div>
        </div>
    <?php endif; ?>
    <!-- <div class="row"> -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-hover table-sm cus-font" id="dataTable" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0;
                    foreach ($penerima as $penerima) :?>
                        <tr>
                            <td><center><?=++$no?></center></td>
                            <?php if($penerima['status'] == "belum"):?>
                                <td><?= $penerima['nama']?></td>
                            <?php else :?>
                                <td><?= $penerima['nama']?><br><?= date("d-m-y H:i:s", strtotime($penerima['waktu']))?></td>
                            <?php endif;?>
                            <?php if($penerima['status'] == "belum"):?>
                                <td><center><a onclick="return confirm('Yakin akan merubah status penerima?')" href="<?= base_url()?>admin/edit_by_id/<?= $penerima['id']?>/sudah"><i class="fa fa-toggle-off text-secondary"></i></a></center></td>
                            <?php else :?>
                                <td><center><a onclick="return confirm('Yakin akan merubah status penerima?')" href="<?= base_url()?>admin/edit_by_id/<?= $penerima['id']?>/belum"><i class="fa fa-toggle-on text-success"></i></a></center></td>
                            <?php endif;?>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    <!-- </div> -->
</div>

<script>    
    $('#dataTable').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
</script>


