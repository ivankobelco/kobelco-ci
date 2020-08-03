
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'><?php echo anchor('tbl_list_parts_clearance/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('tbl_list_parts_clearance/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
					<th>No</th>
					<th>CLASS (TON)</th>
					<th>CATEGORY</th>
					<th>MODEL</th>
					<th>New Model</th>
					<th>PARTS NO</th>
					<!-- <th>INTERCHANGE</th> -->
					<th>PARTS NAME</th>
					<th>Clasification</th>
					<!-- <th>Check Update Model</th>
					<th>Action Plan</th>
					<th>PIC</th>
					<th>Reason</th>
					<th>LIST PRICE (RP)</th>
					<th>BASIC PRICE (RP)</th>
					<th>PARTS DISPOSAL</th>
					<th>Cost ($)</th>
					<th>Stock Available Per 15 April 2020</th>
					<th>Total Cost ($)</th>
					<th>Total Sales</th>
					<th>Model1</th>
					<th>Page Name-1</th>
					<th>Model2</th>
					<th>Page Name-2</th>
					<th>Model3</th>
					<th>Page Name-3</th>
					<th>Model4</th>
					<th>Page Name-4</th>
					<th>Model5</th>
					<th>Page Name-5</th>
					<th>Model6</th>
					<th>Page Name-6</th>
					<th>Model7</th>
					<th>Page Name-7</th>
					<th>Model8</th>
					<th>Page Name-8</th>
					<th>Model9</th>
					<th>Page Name-9</th> -->
					<!-- <th>BALIKPAPAN</th>
					<th>BANJARMASIN</th>
					<th>DEPO PKU</th>
					<th>JAKARTA</th>
					<th>JAMBI</th>
					<th>LAMPUNG</th>
					<th>MAKASSAR</th>
					<th>MANADO</th>
					<th>MEDAN</th>
					<th>NEX WH</th>
					<th>PADANG</th>
					<th>PALEMBANG</th>
					<th>PANGKALPINANG</th>
					<th>PART SALES</th>
					<th>PARTS CENTER</th>
					<th>PEKANBARU</th>
					<th>PONTIANAK</th>
					<th>PRODUCTION</th>
					<th>SAMARINDA</th>
					<th>SAMPIT</th>
					<th>SEMARANG</th>
					<th>SERVICE DEVE</th>
					<th>SORONG</th>
					<th>SURABAYA</th>
					<th>TARAKAN</th>
					<th>USED</th> -->
					<th>Total Stock</th>
					<th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($tbl_list_parts_clearance_data as $tbl_list_parts_clearance)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $tbl_list_parts_clearance->CLASS_TON ?></td>
		    <td><?php echo $tbl_list_parts_clearance->CATEGORY ?></td>
		    <td><?php echo $tbl_list_parts_clearance->MODEL ?></td>
		    <td><?php echo $tbl_list_parts_clearance->New_Model ?></td>
		    <td><?php echo $tbl_list_parts_clearance->PARTS_NO ?></td>
		    <!-- <td><?php //echo $tbl_list_parts_clearance->INTERCHANGE ?></td> -->
		    <td><?php echo $tbl_list_parts_clearance->PARTS_NAME ?></td>
		    <td><?php echo $tbl_list_parts_clearance->Clasification ?></td>
		    <td><?php echo $tbl_list_parts_clearance->Check_Update_Model ?></td>
		    <!-- <td><?php //echo $tbl_list_parts_clearance->Action_Plan ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->PIC ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Reason ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->LIST_PRICE_RP ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->BASIC_PRICE_RP ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->PARTS_DISPOSAL ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Cost_USD ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Stock_Available_per_15_April_2020 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Total_Cost_USD ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Total_Sales ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Model1 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Page_name-1 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Model2 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Page_name-2 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Model3 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Page_name-3 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Model4 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Page_name-4 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Model5 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Page_name-5 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Model6 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Page_name-6 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Model7 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Page_name-7 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Model8 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Page_name-8 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Model9 ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Page_name-9 ?></td> -->
		    <!-- <td><?php// echo $tbl_list_parts_clearance->BALIKPAPAN ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->BANJARMASIN ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->DEPO_PKU ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->JAKARTA ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->JAMBI ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->LAMPUNG ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->MAKASSAR ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->MANADO ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->MEDAN ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->NEX_WH ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->PADANG ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->PALEMBANG ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->PANGKALPINANG ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->PART_SALES ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->PARTS_CENTER ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->PEKANBARU ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->PONTIANAK ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->PRODUCTION ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->SAMARINDA ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->SAMPIT ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->SEMARANG ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->SERVICE_DEVE ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->SORONG ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->SURABAYA ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->TARAKAN ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->USED ?></td>
		    <td><?php //echo $tbl_list_parts_clearance->Total_Stock ?></td> -->
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('tbl_list_parts_clearance/read/'.$tbl_list_parts_clearance->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('tbl_list_parts_clearance/update/'.$tbl_list_parts_clearance->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('tbl_list_parts_clearance/delete/'.$tbl_list_parts_clearance->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->