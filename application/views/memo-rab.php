<style>
	.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
    font-size: 12px;
}
thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
}
tbody {
    display: table-row-group;
    vertical-align: middle;
    border-color: inherit;
}
.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}
tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
.table-bordered thead th, .table-bordered thead td {
    border-bottom-width: 2px;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 1px solid #000;
}
.table-bordered th, .table-bordered td {
    border: 0.5px solid #000;
}
.table th, .table td {
    padding: 0.75rem;
    line-height: 1.5;
    vertical-align: top;
    border-top: 0.5px solid #000;
}
th {
    text-align: left;
}
</style>
<div style="margin-bottom:20px;border:2px dashed #000;padding: 7px 5px;background-color: #eaeaea;font-size: 12px;">Lampiran RAB</div>
<table id="table-rab" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
    <th width="30">No</th>
    <th>Deskripsi</th>
    <th>Jumlah</th>
    <th>Unit</th>
    <th colspan="2">Frekwensi</th>
    <th>Unit Cost</th>
    <th>Total Cost</th>
</tr>
</thead>
<tbody>
   <?php if($load_parent->num_rows() > 0){ ?>
    <?php 
        $hs=1;
        foreach($load_parent->result() as $data){ 
            $id_parent=$data->katid;
            $load_child = $this->event_model->select_rab_event($id_parent,$id_event);
            $child_exist = 0; 
            if($load_child->num_rows() > 0)
            {
                $child_exist = 1;
            }
            ?> 
            <tr class="parent-class" style="background-color: #eaeaea;">
                <td colspan="7"><strong><?php echo ($child_exist==1 ? ' '.$data->deskripsi:$data->deskripsi); ?></strong></td>
                <td><strong><?php echo 'Rp. '.number_format($data->total,0,'.','.'); ?></strong></td>
            </tr>
           <?php 
                if($child_exist==1)
                {
                    $no=1;
                    foreach($load_child->result() as $c)
                    {
            ?>
                    <tr id="parent_<?php echo $hs; ?>">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $c->deskripsi; ?></td>
                        <td><?php echo $c->jumlah; ?></td>
                        <td width="30" ><?php echo $c->jumlah_unit; ?></td>
                        <td><?php echo $c->jumlah; ?></td>
                        <td width="30"><?php echo $c->frekwensi; ?></td>
                        <td><?php echo 'Rp. '.number_format($c->unit_cost,0,'.','.'); ?></td>
                        <td><?php echo 'Rp. '.number_format($c->total,0,'.','.'); ?></td>
                    </tr>
                    <?php
                            $no++;}
                        }
                    $hs++; } 
                    ?>
<?php } ?>
    <tr style="background-color: #eaeaea;">
        <td colspan="7"><strong>Uang Muka</strong></td>
        <td>
        <?php echo $uang_muka; ?>    
        </td>
    </tr>
    <tr>
        <td colspan="7"><strong>Grand Total</strong></td>
        <td><?php echo $jumlah_rab; ?> </td>
    </tr>
</tbody>
</table>