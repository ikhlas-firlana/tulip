<?php
$this->load->helper('HTML');
echo link_tag('css/style2.css');
echo link_tag('images/favicon.ico','shortcut icon','image/x-icon');
?></head>
<div id="page1">
    <div id="wrapper">
        <?php $this->load->view('admin_views/header');  ?><hr />
       <script type="text/javascript">
		    $(this).ready( function() {
    		$("#intid_cabang").autocomplete({
      			minLength: 2,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>po/lookupCabang",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
		          		success:    
		            	function(data){
		              		if(data.response =="true"){
		                 	add(data.message);
		              		}
		            	},
              		});
         		},
         	focus:function(event,ui){var q=$(this).val();$(this).val()=q;},select: 
         		function(event, ui) {
            		$("#result").append(
            			"<input type='hidden' id='id_cabang' name='id_cabang' value='" + ui.item.id + "' size='30' />"
            		);           		
         		},		
    		});
	    });
	
           
        </script>
    </div>
    <div id="page">
        <div id="page-bgtop">
            <div id="content">
              <div>	<h2 class="title">Surat Jalan Komplain</h2>
                    <div class="entry">
                      <form action="<?php echo base_url()?>po/sjdata_komplain" method="post" name="frmjual" id="frmjual">
                            <div id="error"><?php echo validation_errors(); ?></div>
						<table width="685" border="0" id="data" align="center">
                                 <tr>
                                  <td>Cabang</td>
                                  <td>&nbsp; <?php 
									if($this->session->userdata('privilege')== 1){
									  echo '<input type="text" name="intid_cabang" id="intid_cabang" size="20" />';
									  }else{
										echo "<input type='text' id='id_cabang' name='nama_cabang' value='".$cabang."'  disabled />
										<input type='hidden' id='id_cabang' name='id_cabang' value='".$id_cabang."' size='30' />";
								  		} ?>
								  <div id="result"></div></td>
                                  <td>Week</td>
                                  <td><select name="week">
                                  <option value="">-- Pilih --</option>
                                  <?php
                                        for($i=0;$i<count($intid_week);$i++)
                                        {
                                            echo "<option value='$intid_week[$i]'>$intid_week[$i]</option>";
                                        }
                                    ?>
                                </select><select name="tahun">
				<?php
					foreach($tahun->result() as $row){
					if($tahun->result() == date("Y")):
						echo "<option value='".$row->inttahun."' selected>".$row->inttahun."</option>";
					else:
						echo "<option value='".$row->inttahun."'>".$row->inttahun."</option>";
					endif;
					/* echo "<option value='".$row->inttahun."'>".$row->inttahun."</option>"; */
				  }
				?>                   
                </select></td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;<input type="submit"  style="background-color:#0099CC "id="search-submit" value="CARI"  onclick="cari()"/></td>
                              </tr>
                        </table>
                      </form>
   <?php if (!empty($default)){
	   echo '<fieldset>
   <table width="400" border="0"  align="center">
  	<tr>
    <td width="677">&nbsp;
            <table width="650" height="83" border="0" align="center" id="data" class="data">
            <tr  align="center"  class="table">
           	<th width="8%">No</th>
            <th width="19%">Cabang</th>
            <th width="12%">Week </th>
            <th width="11%">No SJ Lama</th>
            <th width="11%">No SJ Baru</th>
			<th width="22%">Tanggal</th>
            <th width="26%">Action</th>
			</tr>';
			$i=1;
			foreach($default as $m) { 
			
			echo "
			   <tr class='data' align='center'>
				<td >".$i++."</td>
				<td align='left'>&nbsp;".$m->strnama_cabang."</td>
				<td align='left'>&nbsp;".$m->week_sj."</td>
				<td align='center'>&nbsp;".$m->no_sj_lama."</td>
				<td align='center'>&nbsp;".$m->no_sj_baru."</td>
				<td align='left'>&nbsp;".$m->tgl_kirim."</td>
				<td align='center'>&nbsp;<a href='".base_url()."POCO/GET_SJ/?no_sj=".$m->no_sj_baru."&no_spkb=".$m->no_spkb."' target='_blank'>	
				View</a>";
			if($id_cabang == 1){
				echo " || <a href='".base_url()."POCO/EDIT_SJ/?no_sj=".$m->no_sj_baru."&no_spkb=".$m->no_spkb."' target='_blank'>EDIT</a>";	
			}
			echo "</td>
			  </tr>";
		  	}
			echo "</table></td>
				</tr>
			</table>
			</fieldset>";
			}
			else{
				 echo "<fieldset>
                No Result Found
            </fieldset>";
			}
			?>
						</div>
					</div>
				</div>
        </div>
        <!-- end #content -->
       
        <?php $this->load->view('admin_views/sidebar_gudang'); ?><!-- end #sidebar -->
        <div style="clear: both;">&nbsp;</div>
    </div>
</div>
<!-- end #page -->
<div id="footer-bgcontent">
    <?php $this->load->view('admin_views/footer'); ?></div>