<div class='box-header'>
  <h3 class='box-title'><?php echo anchor('cabang/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<!-- <?php //echo anchor(site_url('cabang/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?> -->
		<!-- <?php //echo anchor(site_url('cabang/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?> -->
		<?php echo anchor(site_url('cabang/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
</div><!-- /.box-header -->
  <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Kode Cabang</th>
                    <th>Nama Cabang</th>
                    <th>Territory</th>
                    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($cabang_data as $cabang)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $cabang->kode_cabang ?></td>
		    <td><?php echo $cabang->nama_cabang ?></td>
		    <td><?php echo $cabang->Territory ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('cabang/read/'.$cabang->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-primary btn-sm')); 
			echo '  '; 
			echo anchor(site_url('cabang/update/'.$cabang->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('cabang/delete/'.$cabang->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
  </table>
     
</div><!-- /.box-body -->
          