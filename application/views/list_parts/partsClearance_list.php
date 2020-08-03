<div class='box-header'>
    <h3 class='box-title'><?php echo anchor('partsClearance/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
    <?php echo anchor(site_url('partsClearance/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?>
    </h3>
</div><!-- /.box-header -->
<div class='box-body'>

<table class="table table-bordered table-striped" id="mytable">
	<thead>
		<tr>
			<th>No</th>
			<th>CLASS TON</th>
			<th>MODEL</th>
				<th>New Model</th>
				<th>CATEGORY</th>
				<th>PARTS NO</th>
				<!-- <th>INTERCHANGE</th> -->
				<th>PARTS NAME</th>
				<th>Clasification</th>
				<!-- <th>Check Update Model</th> -->
				<th>PIC</th>
				<!-- <th>Reason</th>
				<th>Model1</th>
				<th>Page Name1</th>
				<th>Model2</th>
				<th>Page Name2</th>
				<th>Model3</th>
				<th>Page Name3</th>
				<th>Model4</th>
				<th>Page Name4</th>
				<th>Model5</th>
				<th>Page Name5</th>
				<th>Model6</th>
				<th>Page Name6</th>
				<th>Model7</th>
				<th>Page Name7</th>
				<th>Model8</th>
				<th>Page Name8</th>
				<th>Model9</th>
				<th>QTY STOCK</th>
				<th>FOTO 1</th>
				<th>FOTO 2</th>
				<th>FOTO 3</th>
				<th>FOTO 4</th>
				<th>REMARK</th>
				<th>LOCATION</th>
				<th>Normal Price</th>
				<th>Special Price</th> -->
				<th>Action</th>
            </tr>
			</thead>
			<tbody>
			<?php foreach ($partsclearance_data as $p)
            {
            ?>
                <tr>
					<td width="80px"><?php echo ++$start ?></td>
					<td><?php echo $p->CLASS_TON ?></td>
					<td><?php echo $p->MODEL ?></td>
					<td><?php echo $p->New_Model ?></td>
					<td><?php echo $p->CATEGORY ?></td>
					<td><?php echo $p->PARTS_NO ?></td>
					<!-- <td><?php //echo $p->INTERCHANGE ?></td> -->
					<td><?php echo $p->PARTS_NAME ?></td>
					<td><?php echo $p->Clasification ?></td>
					<!-- <td><?php //echo $p->Check_Update_Model ?></td> -->
					<td><?php echo $p->PIC ?></td>
					<!-- <td><?php //echo $p->Reason ?></td>
					<td><?php// echo $p->Model1 ?></td>
					<td><?php// echo $p->Page_name1 ?></td>
					<td><?php //echo $p->Model2 ?></td>
					<td><?php// echo $p->Page_name2 ?></td>
					<td><?php// echo $p->Model3 ?></td>
					<td><?php// echo $p->Page_name3 ?></td>
					<td><?php //echo $p->Model4 ?></td>
					<td><?php //echo $p->Page_name4 ?></td>
					<td><?php //echo $p->Model5 ?></td>
					<td><?php //echo $p->Page_name5 ?></td>
					<td><?php //echo $p->Model6 ?></td>
					<td><?php //echo $p->Page_name6 ?></td>
					<td><?php //echo $p->Model7 ?></td>
					<td><?php //echo $p->Page_name7 ?></td>
					<td><?php //echo $p->Model8 ?></td>
					<td><?php //echo $p->Page_name8 ?></td>
					<td><?php //echo $p->Model9 ?></td>
					<td><?php //echo $p->QTY_STOCK ?></td>
					<td><?php //echo $p->FOTO_1 ?></td>
					<td><?php //echo $p->FOTO_2 ?></td>
					<td><?php //echo $p->FOTO_3 ?></td>
					<td><?php //echo $p->FOTO_4 ?></td>
					<td><?php //echo $p->REMARK ?></td>
					<td><?php //echo $p->LOCATION ?></td>
					<td><?php //echo $p->Normal_Price ?></td>
					<td><?php //echo $p->Special_Price ?></td> -->
					<td style="text-align:center" width="200px">
						<?php 
						echo anchor(site_url('partsclearance/read/'.$p->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-primary btn-sm')); 
						echo ' &nbsp; '; 
						echo anchor(site_url('partsclearance/update/'.$p->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
						echo ' &nbsp; '; 
						echo anchor(site_url('partsclearance/delete/'.$p->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
						
						?>
					</td>
				</tr>
            <?php
            }
            ?>
			</tbody>
</table>
</div><!-- /.box -->
		