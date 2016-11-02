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
<div style="margin-bottom:20px;border:2px dashed #000;padding: 7px 5px;background-color: #eaeaea;font-size: 12px;">Lampiran Trainer</div>
<table id="get_list_peserta_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
    <th width="20">No.</th>                                       
    <th>Nama</th>
</tr>
</thead>
<tbody>
<?php if($load_trainer->num_rows() > 0){ ?>
<?php 
$no =1;
foreach($load_trainer->result() as $data){ ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $data->nama_pemateri; ?></td>
    </tr> 
<?php $no++; } ?>
<?php }else{ ?>
     <tr>
        <td colspan="5">tidak ada data peserta / semua karyawan</td>
    </tr> 
<?php } ?>   
</tbody>
</table>