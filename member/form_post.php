<?php   session_start();

include("../config.inc.php");
$rdg_id=$_POST['rdg_id'];


$sqlSQLRT="select rdg.*,rt.rt_name from realty_data_general rdg
LEFT JOIN realty_type rt
ON rdg.rt_id=rt.rt_id
where rdg_id='$rdg_id'";
$resultRT=mysqli_query($conn,$sqlSQLRT);
$rsRT=mysqli_fetch_array($resultRT);


?>

<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>	
<div class="tab-v1">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#mainData" data-toggle="tab">ข้อมูลทั่วไป</a></li>
		<li><a href="#detailData" data-toggle="tab">รายละเอียดเพิ่มเติม</a></li>
		<li><a href="#imageVideo" data-toggle="tab">รูปภาพ/วีดีโอ</a></li>
		<li><a href="#summary" data-toggle="tab">สรุป</a></li>
	</ul>                
	<div class="tab-content">
		<!-- mainData  -->

											
		<div class="tab-pane fade in active" id="mainData">
					 <!-- start content mainData-->
					 <form role="form" id="formRealtyDataGe" name="formRealtyDataGe" class="form-horizontal" action="#">
						<div class="headline"><h4>
						<?php 
						if($rsRT['rdg_id']){
							?>
							แก้ไขข้อมูล<?=$rsRT['rt_name']?>(#<?=$rsRT['rdg_id']?>)
							<?php
						}else{
							?>
							ลงประกาศใหม่
							<?php
						}
						?>
						
						
						</h4></div>
							
							
										
							
							
							
							<div class="form-group " >
								<label class="col-lg-3 control-label"> สถานะประกาศ</label>
								
										<?php if($rsRT['rdg_status_post']=="N" || $rsRT['rdg_status_post']==""){
											
										?>
										
										<div class="checkbox">
										
											<label>
											<input type="radio" name="rdg_status_post" class="rdg_status_post" value="N" checked="checked"> ยังไม่ขายหรือเช่า
											</label>
											<label>
											<input type="radio"  name="rdg_status_post"   class="rdg_status_post" value="soldOut"> 	ขายแล้ว 
											</label>
											<label>
											<input type="radio" name="rdg_status_post" class="rdg_status_post" value="rented"> เช่าแล้ว
											</label>
											
										</div>
										<?php }else if($rsRT['rdg_status_post']=="soldOut"){
											?>
											<div class="checkbox">
												<label>
												<input type="radio" name="rdg_status_post" class="rdg_status_post" value="N" > ยังไม่ขายหรือเช่า
												</label>
												<label>
												<input type="radio"  name="rdg_status_post"   class="rdg_status_post" value="soldOut" checked="checked"> 	ขายแล้ว 
												</label>
												<label>
												<input type="radio" name="rdg_status_post" class="rdg_status_post" value="rented"> เช่าแล้ว
												</label>
												
											</div>
											<?php
										}else if($rsRT['rdg_status_post']=="rented"){
											?>
											<div class="checkbox">
												<label>
												<input type="radio" name="rdg_status_post" class="rdg_status_post" value="N" > ยังไม่ขายหรือเช่า
												</label>
												<label>
												<input type="radio"  name="rdg_status_post"   class="rdg_status_post" value="soldOut"> 	ขายแล้ว 
												</label>
												<label>
												<input type="radio" name="rdg_status_post" class="rdg_status_post" value="rented" checked="checked"> เช่าแล้ว
												</label>
												
											</div>
											<?php
										}?>
									
								
							</div>
							
							
							
							<div class="form-group" >
								<label class="col-lg-3 control-label"> ประกาศพิเศษ</label>
								
								<div id="realtySpecialArea">
									<div class="optonArea">
										<div class="checkbox">
										
										
										
											<label>
											<input type="radio" checked='checked' id='rdg_special_n' name="rdg_special" class="rdg_special"  value="N" checked="checked"> ประกาศฟรี 
											</label>
											
											<label>
											<input type="radio" name="rdg_special" id='rdg_special_y' class="rdg_special" value="Y"> ประกาศพิเศษ
											</label>
										
										</div>
									</div>
								</div>
							</div>
							
							<div class="alert alert-info fade in col-xs-offset-3">
			                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
			                    <strong>
			                   	ประกาศพิเศษหน้าแรก 
								</strong>
								ติดต่อผู้ดูแลระบบ(Admin)
								โทร: 080-992-6565
								Email: kosit.arom@gmail.com
								<!-- ทดลองใช้งานฟรี -->
			                </div>
			                
							
							
							<div class="form-group">
								<label for="rdg_title" class="col-lg-3 control-label">ประเภทรถ </label>
								<div class="col-lg-9">
									<div class="select" id="realtyTypeArea"> </div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label" > ประเภทเกียร์</label>
								<div id="realtyForArea"></div>
							</div>

							
																	
							<div class="form-group">
								<label class="col-lg-3 control-label" for="car_type_id">  ยี่ห้อรถ</label>
								<div class=" col-lg-5">
									<label class="select" id="carTypeArea">
										<select name="car_type_id" id="car_type_id">
												<option disabled="" selected="" value="0">-- กรุณาเลือกยี่ห้อรถ --</option>
										
										</select>

										<i></i>
									</label>
								</div>
							</div>



							<div class="form-group">
								<label class="col-lg-3 control-label" for="car_sub_type_id">  รุ่นรถ</label>
								<div class=" col-lg-5">
									<label class="select" id="carSubTypeArea">
										<select name="car_sub_type_id" id="car_sub_type_id">
											<option disabled="" selected="" value="0">-- กรุณาเลือกรุ่นรถ --</option>

										</select>

										<i></i>
									</label>
								</div>
							</div>

							

								
																
							
							
							
							<!--start form-group-->
							<!--
							 <div class="form-group">
								<label class="col-lg-3 control-label" for="realtyType">  เลือกประเภทอสังหาริมทรัพย์ </label>
								<div class=" col-lg-5">
									
									 <label class="select" id="realtyTypeArea"> -->
										<!-- 
																		<select name="realtyType" id="realtyType">
																		
																			<option disabled=""  value="0">---- รายการอสังหาริมทรัพย์ ----</option>
																				<option value="realty1">โครงการใหม่</option> 
																				<option selected="selected"  value="realty2">บ้าน</option> 
																				<option value="realty3">คอนโดมิเนียม	</option>
																				<option value="realty4">ทาว์นเฮ้าส์/ทาว์นโฮม	</option>
																				<option value="realty5">เกส์ตเฮ้าส์ </option>
																				<option value="realty6">โฮมออฟฟิศ </option>
																				<option value="realty7">โรงงาน/โกดัง</option>
																				<option value="realty8">ที่ดิน</option> 
																				<option value="realty9">อพาร์ทเม้นท์</option> 
																				<option value="realty10">เชิงพาณิชย์</option> 
																				<option value="realty11">หอพัก </option> 
																				<option value="realty12">โรงแรม </option> 
																				<option value="realty13">รีสอร์ท </option> 
																				<option value="realty14">อาคารสํานักงาน </option> 
																				<option value="realty15">อสังหาริมทรัพย์อื่นๆ </option> 
																				<option value="">---- รายการผู้รับเหมา  ----</option> 
																				<option value="contractor1">ผู้รับเหมาฐานราก </option> 
																				<option value="contractor2">ผู้รับเหมาตกแต่ง </option> 
																				<option value="contractor3">อพาร์ทเม้นท์</option> 
																				<option value="contractor4">รายการรับเหมาอื่นๆ </option> 
																				
																		</select>
 																		
																		<i></i>
																	</label>
																
																</div>
															</div>
															-->
							<!--end form-group-->
							
							

							

							<div class="form-group">
								<label class="col-lg-3 control-label" for="rdg_title"> หัวข้อประกาศ </label>
								<div class="col-lg-9">
									<input type="text" placeholder="หัวข้อประกาศ" id="rdg_title" name="rdg_title" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label" for="rdg_detail"> รายละเอียดประกาศ </label>
								<div class="col-lg-12">
								
								  <!--CKEditor-->
								    <textarea cols="" id="rdg_detail" name="rdg_detail" rows="2" ></textarea>
								    <script type="text/javascript">
								        //<![CDATA[
								            CKEDITOR.replace( 'rdg_detail',{
								            	enterMode: CKEDITOR.ENTER_BR,
								                shiftEnterMode: CKEDITOR.ENTER_BR,
								                height: '200px'
								     
								            } );
								        //]]>
								    </script>
								    <!--CKEditor-->
								
    							<!-- 
									<textarea placeholder="รายละเอียดประกาศ" rows="6" id="rdg_detail" name="rdg_detail" class="form-control"></textarea>
								 -->
								</div>
							</div>
							<div class="headline"><h4>แผนที่</h4></div>
							<div class="form-group">
							<label class="col-lg-3 control-label" > ปักหมุดแผนที่ </label>
								<div class="col-lg-9 " > 
								<button class="" id="btnCreateMarker">
								<i class="icon-pin"></i>
								คลิ๊กเพื่อปักหมุด
								</button>

								<button class=" id="btnClearMarker">
								<i class="icon-trash"></i>
								ลบหมุด
								</button>
								</div>
								<div class="col-lg-12">
									
									
										<div id="map-canvas"></div>
										<p id="demo"></p>
								</div>
							</div>

															

															
															<div class="showForRealty">
															<div class="headline"><h4>ข้อมูลด้านราคา</h4></div>

																	<div class="form-group rdg_price_area">
																		<label class="col-lg-3 control-label" for="rdg_price"> ราคาขาย </label>
																		<div class="col-lg-5">
																			<input type="text" placeholder="ราคา" id="rdg_price" name="rdg_price" class="form-control">
																		</div>
																	</div>
																	<div class="form-group rdg_price_rent_area">
																		<label class="col-lg-3 control-label" for="rdg_price_rent"> ราคาเช่า </label>
																		<div class="col-lg-5">
																			<input type="text" placeholder="ราคา" id="rdg_price_rent" name="rdg_price_rent" class="form-control">
																		</div>
																	</div>
																	<div class="form-group rdg_price_down_area">
																		<label class="col-lg-3 control-label" for="rdg_price_down"> ราคาขายดาวน์ </label>
																		<div class="col-lg-5">
																			<input type="text" placeholder="ราคา" id="rdg_price_down" name="rdg_price_down" class="form-control">
																		</div>
																	</div>
															</div>
															<!-- 
															<div class="headline"><h4>ข้อมูลด้านการเเดินทาง(ในเขตกรุงเทพและปริมณฑล)</h4></div>
																
																
																	<div class="form-group">
																		<label class="col-lg-3 control-label" for=""> สายรถไฟฟ้า BTS </label>
																		<div class="col-lg-5" id="travelByBTSArea">
																		
																		
																		
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="col-lg-3 control-label" for=""> สายรถไฟฟ้า MRT</label>
																		<div class="col-lg-5" id="travelByMRTArea">
																			
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="col-lg-3 control-label" for=""> สายรถไฟฟ้า ARL</label>
																		<div class="col-lg-5" id="travelByARLArea">
																			
																		</div>
																	</div>
																	
																	
																	<div class="form-group">
																		<label class="col-lg-3 control-label" for=""> เรือโดยสาร</label>
																		<div class="col-lg-5" id="travelByHARBORArea">
																			
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="col-lg-3 control-label" for="rdg_bus"> สายรถประจำทาง</label>
																		<div class="col-lg-3">
																				<input type="text" class="form-control" id="rdg_bus" name="rdg_bus" placeholder="สายรถประจำทางเช่น 80,113">
																		</div>
																	</div>
																	
																 -->
																
															

								
<hr>
							<div class="form-group">
								<div class="text-center" >
									<input type="hidden" name="paramAction" id="paramAction" value="realtyDataGeneralSave">
									<input type="hidden" name="rdg_status" id="rdg_status" value="<?=$rsRT['rdg_status']?>">
									
									<div id="paramEmbedRdgIdArea"></div>
									<div id="paramLatLong"></div>
									
									<button id="saveStep1" class="btn-u btn-u-green" type="button"><i class=' icon-check '></i>  บันทึกและดำเนินการถัดไป  </button>
								</div>
							</div>
					</form>
		<!-- End content mainData-->
		</div>
		<!-- End mainData -->
		 <!--Start detailData  -->
		<div class="tab-pane fade in " id="detailData">


				<div id="detailDataPost"></div>


			<br style="clear:both">

			
			<br style="clear:both">

		</div>
		<!-- End detailData -->

		<!-- imageVideo -->
		
		<div class="tab-pane fade" id="imageVideo">
		<div id="imageVideoArea"></div>
		
		


		</div>
		
		<!-- End imageVideo -->

		<!-- summary -->
		<div class="tab-pane fade" id="summary">
		<div id="summaryArea"></div>
				

		</div>
		<!-- End summary -->
		

	</div>
</div>
<!-- End Tabs-->