<form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Kode Cabang <?php echo form_error('kode_cabang') ?></td>
            <td><input type="text" class="form-control" name="kode_cabang" id="kode_cabang" placeholder="Kode Cabang" value="<?php echo $kode_cabang; ?>" />
        </td>
	    <tr><td>Nama Cabang <?php echo form_error('nama_cabang') ?></td>
            <td><input type="text" class="form-control" name="nama_cabang" id="nama_cabang" placeholder="Nama Cabang" value="<?php echo $nama_cabang; ?>" />
        </td>
	    <tr><td>Territory <?php echo form_error('Territory') ?></td>
            <td><input type="text" class="form-control" name="Territory" id="Territory" placeholder="Territory" value="<?php echo $Territory; ?>" />
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('cabang') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table>
</form>

