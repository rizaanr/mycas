<section class="content-header">
      <h1>
        Data Antena
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Data Antena</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Antena</h3>
                    <div class="pull-right">
                </div>
                    <div class="col-md-12 table-responsive" style="margin-top: 20px;">
                        <table id="myTable" class="table table-striped table-bordered" cellspasing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:5%;">#</th>
                                    <th>Nama</th>
                                    <th>Type</th>
                                    <th>IP Address</th>
                                    <th>Freq</th>
                                    <th>CW</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($row->result() as $name => $data) {
                                ?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $data->name;?></td>
                                <td><?= $data->email;?></td>
                                <td><?= $data->birth;?></td>
                                <td><?= $data->telp ?></td>
                                <td><?= $data->password ?></td>
                                <td class="text-center" width="160px">
                                    <form action="<?=site_url('product/del')?>" method="post">
            
                                    <a href="<?=site_url('product/edit/'.$data->user_id)?>" class="btn btn-primary btn-xs">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>

                                        <input type="hidden" name="id" value="<?=$data->user_id?>">
                                        <button class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>