<!doctype html>
<html>
    <head>
        <title>MS Word</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>List Parts Clearance</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
				<th>CLASS TON</th>
				<th>MODEL</th>
				<th>New Model</th>
				<th>CATEGORY</th>
				<th>PARTS NO</th>
				<th>INTERCHANGE</th>
				<th>PARTS NAME</th>
				<th>Clasification</th>
				<th>Check Update Model</th>
				<th>PIC</th>
				<th>Reason</th>
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
				<th>Special Price</th>
			</tr>
			<?php
            foreach ($partsclearance_data as $partsclearance)
            {
                ?>
                <tr>
					<td><?php echo ++$start ?></td>
					<td><?php echo $partsclearance->CLASS_TON ?></td>
					<td><?php echo $partsclearance->MODEL ?></td>
					<td><?php echo $partsclearance->New_Model ?></td>
					<td><?php echo $partsclearance->CATEGORY ?></td>
					<td><?php echo $partsclearance->PARTS_NO ?></td>
					<td><?php echo $partsclearance->INTERCHANGE ?></td>
					<td><?php echo $partsclearance->PARTS_NAME ?></td>
					<td><?php echo $partsclearance->Clasification ?></td>
					<td><?php echo $partsclearance->Check_Update_Model ?></td>
					<td><?php echo $partsclearance->PIC ?></td>
					<td><?php echo $partsclearance->Reason ?></td>
					<td><?php echo $partsclearance->Model1 ?></td>
					<td><?php echo $partsclearance->Page_name1 ?></td>
					<td><?php echo $partsclearance->Model2 ?></td>
					<td><?php echo $partsclearance->Page_name2 ?></td>
					<td><?php echo $partsclearance->Model3 ?></td>
					<td><?php echo $partsclearance->Page_name3 ?></td>
					<td><?php echo $partsclearance->Model4 ?></td>
					<td><?php echo $partsclearance->Page_name4 ?></td>
					<td><?php echo $partsclearance->Model5 ?></td>
					<td><?php echo $partsclearance->Page_name5 ?></td>
					<td><?php echo $partsclearance->Model6 ?></td>
					<td><?php echo $partsclearance->Page_name6 ?></td>
					<td><?php echo $partsclearance->Model7 ?></td>
					<td><?php echo $partsclearance->Page_name7 ?></td>
					<td><?php echo $partsclearance->Model8 ?></td>
					<td><?php echo $partsclearance->Page_name8 ?></td>
					<td><?php echo $partsclearance->Model9 ?></td>
					<td><?php echo $partsclearance->QTY_STOCK ?></td>
					<td><?php echo $partsclearance->FOTO_1 ?></td>
					<td><?php echo $partsclearance->FOTO_2 ?></td>
					<td><?php echo $partsclearance->FOTO_3 ?></td>
					<td><?php echo $partsclearance->FOTO_4 ?></td>
					<td><?php echo $partsclearance->REMARK ?></td>
					<td><?php echo $partsclearance->LOCATION ?></td>
					<td><?php echo $partsclearance->Normal_Price ?></td>
					<td><?php echo $partsclearance->Special_Price ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>