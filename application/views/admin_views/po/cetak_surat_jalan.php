<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Surat Jalan</title>
<?php $this->load->helper('HTML');
//echo link_tag('css/style2.css');
echo link_tag('images/favicon.ico','shortcut icon','image/x-icon');
?>

</head>

<body style="font-size:15px; font:Georgia, 'Times New Roman', Times, serif;">
<table width="1000" align="center" >
	<tr class="detail2">
   	  <td colspan="2" align="center">
        <table width="1200" align="center" border="0">
        <tr class="detail">
          <td width="1200" rowspan="6" valign="top"><img src="<?php echo base_url();?>images/logo.jpg" />&nbsp;</td>
          <td width="100" class="detail2"><?php echo date('d-m-Y')?></td>
     	  <td width="166"><a href="javascript:window.print()" onclick="location.href='<?php echo base_url();?>po';"><img src="<?php echo base_url();?>/images/print.jpg"/></a></td>
		  <td><a href="<?php echo base_url();?>po/print_excel_surat/<?php echo $id;?>" >EXCEL</a></td>
        </tr>
        <tr class="detail" >
            <td>Cabang</td>
			<td>: <?php echo $default[0]->strnama_cabang?></td>
            <td width="61">&nbsp;</td>
        </tr>
        <tr class="detail">
            <td> Week&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <td>: <?php echo $default[0]->intid_week?></td>
			<td>&nbsp;</td>
        </tr>
        <tr class="detail">
            <td>Via</td>
          <td colspan="2">: <?php echo $default[0]->via;?></td>
         <td>&nbsp;</td>
        </tr>
        <tr class="detail">
            <td >Tgl PO</td>
          <td colspan="2">: <?php echo $default[0]->tgl_order;?></td>
          <td>&nbsp;</td>
        </tr>
        <tr class="detail">
            <td >Tgl Kirim </td>
            <td colspan="2">: <?php echo $default[0]->tgl_kirim?></td>
          <td>&nbsp;</td>
        </tr>
        <tr >
            <td colspan="2" >&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr align="left" class="detail">
            <td colspan="2" class="detail2">
                NO SURAT JALAN: <?php echo $default[0]->no_sj?></td>
          <td>&nbsp;</td>
        </tr>
    </table>
    </td>
    <tr>
    	<td colspan="2" align="center">
        	<table border="1" align="left" class="detail">
			<tr class="detail2">
			  <th rowspan="2" width="350" align="center">NO SPKB/STTB</th>
              <th rowspan="2" width="950" align="center">NAMA BARANG</th>
              <th colspan="2">&nbsp;</th>
              <th rowspan="2" width="550">KET</th>
               </tr>
               <tr>
               
                <th width="54">PCS</th>
                <th>SET</th>
               </tr> 
                <tr>
                  <td align="center"><?php echo $default[0]->no_spkb; ?></td>
                	
                  <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <?php
				$i=1;
                $reg_pcs = 0;
				$reg_set = 0;
			
                foreach($default as  $d):
                   
                    ?>
                <tr>
                  <td align="center" class="detail"></td>
                   
                  <td align="left" class="detail"><?php echo $d->strnama?></td>
                  <td align="center" class="detail"><?php if ($d->intid_jsatuan==2)  echo $d->qty; else echo 0;?></td>
                  <td width="70" align="center" class="detail"><?php if ($d->intid_jsatuan==1) echo $d->qty; else echo 0;?></td>
                  <td width="70" align="center" class="detail"><?php echo $d->ket?></td>
              </tr>
                <?php 
				if ($d->intid_jsatuan==1)
				{
					$reg_set = $reg_set + $d->qty;
				} else{
					$reg_pcs = $reg_pcs + $d->qty;
				}
				endforeach;?>

                <tr>
                  <td>&nbsp;</td>
                	
                  <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                	<td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
               
                <tr class="detail2">
                	<td colspan="2" align="center">&nbsp;TOTAL PESANAN&nbsp;&nbsp;</td>
                    <td align="center"><?php echo $reg_pcs; ?></td>
                    <td align="center"><?php echo $reg_set; ?></td>
                     <td>&nbsp;</td>
                </tr> 
      </table>      </td>
    </tr>

    <tr class="detail">
	<td colspan="2" align="left">Barang pesanan yang tidak ada di Surat Jalan berarti kondisi barang kosong di kantor pusat.</td>
  	</tr>
    <tr class="detail">
	<td colspan="2" align="left">Barang yang telah dipesan tidak dapat dikembalikan.</td>
  	</tr>
    <tr class="detail">
	<td colspan="2" align="left">Klaim barang hanya kami terima 1 hari dari pengiriman barang, 1 hari dari penerimaan jarak jauh.</td>
  	</tr>
     <tr class="detail">
	<td colspan="2" align="left">Atas perhatian dan kerjasamanya kami ucapkan terima kasih</td>
  	</tr>
                <tr>
                	<td colspan="2" align="center">&nbsp;
              <table width="1000" align="center">
  				<tr class="detail">
                	<td width="229"  align="center">PENERIMA</td>
       			  <td width="229"  align="center">PEMERIKSA</td>
       			  <td width="229"  align="center">MENGETAHUI</td>
       			  <td width="229" colspan="4" align="center">ADM. GUDANG</td>
                </tr>
                <tr>
                	<td width="229" colspan="4" align="right">&nbsp;</td>
                    <td width="229" colspan="4" align="right">&nbsp;</td>
                  <td width="229" colspan="4" align="right">&nbsp;</td>
                </tr>
                <tr>
               		 <td width="229" colspan="4" align="right">&nbsp;</td>
                	 <td width="229" colspan="4" align="right">&nbsp;</td>
               	  <td width="229" colspan="4" align="right">&nbsp;</td>
                </tr>
                <tr>
                  <td width="230"  align="center">(....................)</td>
                  <td width="230"  align="center">(....................)</td>
                  <td width="230"  align="center">(....................)</td>
                  <td width="230" colspan="4" align="center">(....................)</td>
                </tr>
                  </table>                  </td>
                </tr>
    
</table>
</body>
</html>