<?php
$this->load->helper('HTML');
echo link_tag('css/style2.css');
echo link_tag('images/favicon.ico','shortcut icon','image/x-icon');
?></head>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>

<div id="page1">
    <div id="wrapper">
        <?php $this->load->view('admin_views/header'); ?><hr />
        <script type="text/javascript">
		window.is_launch = <?php echo $is_launch;?>;
		
		function promo50(ID,num,id_cabang,track){
			$("#metal_1").attr("disabled","disabled");
			$("#metal_2").attr("disabled","disabled");
			$("#metal_3").attr("disabled","disabled");
			$("#metal_4").attr("disabled","disabled");
			$("#metal_5").attr("disabled","disabled");
			$("#metal_6").attr("disabled","disabled");
			if(track == "metal_1") {$("#track1").val(1);}
			if(track == "metal_2") {$("#track2").val(1);}
			if(track == "metal_3") {$("#track3").val(1);}
			if(track == "metal_4") {$("#track4").val(1);}
			if(track == "metal_5") {$("#track5").val(1);}
			if(track == "metal_6") {$("#track6").val(1);}
			if(ID.checked){
				$("#result1").empty();
				$("#result1").append(
                        	"<input type='text' id='harga_barang' name='harga_barang' value='' size='5' readonly='readonly'/><input type='hidden' id='id_barang' name='id_barang' value='' size='15' /><input type='hidden' id='pv' name='pv' value='' size='15' readonly='readonly'/><input type='hidden' id='id_harga' name='id_harga' value='' size='15' />"
                   		);
				var temp,test;
				$(function(){								   
					$(".metal").live('click',function(e){
						$.ajax({
							url: "<?php echo base_url(); ?>penjualan/lookupNamaBarang_2",
							type: 'POST',
							dataType: 'json',
							data: {
								id_barang: num
							},
							success:function(data){
								$('.id1').val(data.value);
								if ($("#smart").attr('checked') == true)
								{
									$('#harga_barang').val(data.value1 * 0.6);
								} else {
									$('#harga_barang').val(data.value1 / 2);
								}
								$('#id_barang').val(data.id);
								$('#id_harga').val(data.value7);
							}
						});		
					});										
				});
						
			}
		}
            //for unit
            $(document).ready( function() {
				/////line ikhlas //////////////						
				$("#form_tujukin").hide();
				/////////////////end///////////////
                $("#intid_unit").autocomplete({
                    minLength: 2,
                    source:
                        function(req, add){
                        $.ajax({
                            url: "<?php echo base_url(); ?>penjualan/lookupUnit",
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
		    focus:
			function(event,ui) {
			$(this).val($(this).val());
		    },
                    select:
                        function(event, ui) {
			$("#strnama_dealer").val("");
			$("#result001").empty();
			$("#result").empty();
                        $("#result").append(
                        "<input type='hidden' id='id_unit' name='id_unit' value='" + ui.item.id + "' size='10' />"
                    );
                    },
                });


                $("#strnama_dealer").autocomplete({
                    minLength: 2,
                    source:
                        function(req, add){
                        $.ajax({
                            url: "<?php echo base_url(); ?>penjualan/lookupUpline",
                            dataType: 'json',
                            type: 'POST',
                            data: {
                                term: req.term,
                                state: $('#id_unit').val(),

                            },
                            success:
                                function(data){
                                if(data.response =="true"){
                                    add(data.message);
                                }
                            },
                        });
                    },
		    focus:
			function(event,ui) {
			$(this).val($(this).val());
		    },
                    select:
                        function(event, ui) {
			$("#track1").val(0);
			$("#track2").val(0);
			$("#track3").val(0);
			$("#track4").val(0);
			$("#track5").val(0);
			$("#track6").val(0);
			$("#metal_1").attr("disabled","disabled");
			$("#metal_2").attr("disabled","disabled");
			$("#metal_3").attr("disabled","disabled");
			$("#metal_4").attr("disabled","disabled");
			$("#metal_5").attr("disabled","disabled");
			$("#metal_6").attr("disabled","disabled");
                        $("#result001").empty();
                        $("#result001").append(
                        	"<input type='text' align='top' id='strkode_dealer' name='strkode_dealer' value='" + ui.item.id + "' readonly/><br><td><input type='text' id='strkode_upline' name='strkode_upline' value='" + ui.item.value2 + "' size='30' readonly/><input type='hidden' size='2' id='pengejaranChall' value='"+ui.item.challhut+"' readonly></td>"
			);			
			if(ui.item.value4 == 0) {$("#metal_1").removeAttr("disabled");} else {$("#track1").val(1);}
			if(ui.item.value5 == 0) {$("#metal_2").removeAttr("disabled");} else {$("#track2").val(1);}
			if(ui.item.value6 == 0) {$("#metal_3").removeAttr("disabled");} else {$("#track3").val(1);}
			if(ui.item.value7 == 0) {$("#metal_4").removeAttr("disabled");} else {$("#track4").val(1);}
			if(ui.item.value8 == 0) {$("#metal_5").removeAttr("disabled");} else {$("#track5").val(1);}
			if(ui.item.value9 == 0) {$("#metal_6").removeAttr("disabled");} else {$("#track6").val(1);}
			
			var option_chall = 0;
			var option_challhut = 0;
			//source code
			if(ui.item.challhut == 1){
					console.log(ui.item.challhut+", "+ui.item.challen);
					/* $("#intid_penjualan_konfirm").html("<select name='intid_jpenjualan' id='intid_jpenjualan'><option value='2'>CHALL HUT</option></select>"); */
					option_challhut = 1;
				}
			if(ui.item.challen == 1){
					console.log(ui.item.challhut+", "+ui.item.challen);
					/* $("#intid_penjualan_konfirm").html("<select name='intid_jpenjualan' id='intid_jpenjualan'><option value='3'>CHALLENGE</option></select>"); */
					option_chall = 1;
				}
		
				loadview("1",option_challhut,option_chall);//load view
                    },
                });

                $("#strnama_upline").autocomplete({
                    minLength: 2,
                    source:
                        function(req, add){
                        $.ajax({
                            url: "<?php echo base_url(); ?>penjualan/lookupUpline",
                            dataType: 'json',
                            type: 'POST',
                            data: {
                                term: req.term,
                                state: $('#id_unit').val(),

                            },
                            success:
                                function(data){
                                if(data.response =="true"){
                                    add(data.message);
                                }
                            },
                        });
                    },
                });



                autoComp();

            });

            
function loadview(key, option1, option2){
	$.ajax({
				url:"<?php echo site_url()?>promo2030/reception_member",
				type:"GET",
				dataType:"json",
				data:"key="+key+"&option_chall="+option2+"&option_challhut="+option1,
				beforeSend:function(){
					$("#part").html("loading ....");
					},
				success:function(data){
							
					$.each(data, function(key, value){
						
						$("#part").html(value);
						});	
					}, error :function(e){
						$("#part").html("<div style='text-align:center;'>Not Connection.</div>");
						}
				});
	}
//////////////line ikhlas////////////////////////////////
function pilih_barang(){
	if($("#intid_jpenjualan").val() == 13){
		$("#chkBox20").attr("checked",false);
			$("#txtpromo20").val("");
			$("#txtpromo20").attr("disabled","disabled");
			$("#chkV20").attr("checked",false);
			$("#chkBox10").attr("checked",false);
			$("#txtpromo10").val("");
			$("#txtpromo10").attr("disabled","disabled");
			$("#chkV10").attr("checked",false);
			$("#chkBoxTrade").attr("checked",false);
			$("#komisitrade").val("0%");
			$("#komisitrade").attr("disabled","disabled");
			$("#chkBoxFreeHut").attr("checked",false);
			$("#txtfreehut").val("");
			$("#txtfreehut").attr("disabled","disabled");
			$("#chkBoxFree").attr("checked",false);
			$("#txtfree").val("");
			$("#txtfree").attr("disabled","disabled");
			$("#chkV").attr("checked",false);
			$("#chkV").attr("disabled","disabled");
			$("#chkBox20").attr("disabled","disabled");
			$("#chkBox10").attr("disabled","disabled");
			$("#chkBoxTrade").attr("disabled","disabled");
			$("#chkBoxFreeHut").attr("disabled","disabled");
			$("#chkBoxFree").attr("disabled","disabled");
		$("#form_tujukin").show();
		}else{
			$("#form_tujukin").hide();
			}
	}
////////////////////////////////////////////////////////

        </script>
    </div>
    <div id="page">
        <div id="page-bgtop">
            <div id="content">
                <div>	<h2 class="title">penjualan 30% ALL</h2>
                    <div class="entry">
                        <form action="<?php echo base_url()?>penjualan/nota" method="post" name="frmjual" id="frmjual">
						<input type="hidden" name="halaman"  value="30All">
                            <div id="error"><?php echo validation_errors(); ?></div>
                            <table width="685" border="0" id="data" align="center">
                                <tr>
                                    <td>
                                <tr>
                                    <td width="107">&nbsp;</td>
                                    <td width="316">&nbsp;</td>
                                    <td width="35">&nbsp;</td>
                                    
                                    <td >&nbsp;<?php echo $cabang; ?>
                                    <input type="hidden" name="intid_cabang" size="30" readonly="readonly" value="<?php echo $id_cabang; ?>" id="id_cabang"">         </td>
                                    <td>&nbsp;,</td>
                                    <td>&nbsp;<?php echo date("d-m-Y");?></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;Unit</td>
                                    <td>&nbsp;:</td>
                                    <td><input type="text" name="textfield4" id="intid_unit"  size="25"/></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td width="82">&nbsp;Nama</td>
                                    <td width="7">&nbsp;:</td>
                                    <td width="213"><input type="text" name="strnama_dealer" id="strnama_dealer" size="25"/></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;No Kartu<br /><br />&nbsp;Upline :</td>
                                    <td>&nbsp;:</td>
                                    <td valign="top">&nbsp;<div id="result"></div><div id="result001"></div></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td>&nbsp;No. Nota</td>
                                    <td>&nbsp;<input type="text" id="nomor_nota" name="intno_nota" size="20" value="<?php echo $max_id?>" readonly ></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
							<div id="part">
							</div>
                        </td>
                            </tr>
                            </table>
                        </form>
                    </div>
                </div></div>
        </div>
        <!-- end #content -->
        <?php $this->load->view('admin_views/sidebar_penjualan'); ?><!-- end #sidebar -->
        <div style="clear: both;">&nbsp;</div>
    </div>
</div>
<!-- end #page -->
<div id="footer-bgcontent">
    <?php $this->load->view('admin_views/footer'); ?></div>


