        

        </div>
        <!-- /#main-->

    </div>
    <!-- /#wrapper -->
	<!-- <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script> -->
	<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>	
	<script src="<?php echo base_url();?>assets/scripts/klorofil-common.js"></script>
    <script>
    	function selectFuncDepList() {

			var selectedValue = selectType.options[selectType.selectedIndex].value;
			if (selectedValue == 'PDF') {
				var header = document.getElementById('header');
			    var divToPrint = document.getElementById('datatables');
			    var htmlToPrint = '' +
			        '<style type="text/css">' + 'table th:nth-child(1), table td:nth-child(1),table th:nth-child(7), table td:nth-child(7){ display:none;}' +
			        'table th, table td {' +
			        'border:1px solid #000;' + 'text-align:center;' +
			        '}'+ '.po {background-color: red;}' + '</style>';
			    var htmlToPrint1='<style type="text/css">' + '.centerFontBig {text-align: center;font-size: 19px;}' + '</style>';
			    htmlToPrint1 += header.outerHTML;
			    htmlToPrint += divToPrint.outerHTML;
			    title = "<div style='text-align:center;font-size: 19px;font-weight:bold;'>University of Science and Technology of Southern Philippines<br>Overall Daily Hour Report</div>";
			    newWin = window.open("");
			    newWin.document.write(title);
			    newWin.document.write(htmlToPrint1);
			    newWin.document.write(htmlToPrint);
			    newWin.print();
			    newWin.close();
			}else {
				var all = $('option:selected').attr('data-al');
				window.location="<?php echo base_url(); ?>AdminController/exportDailyHrReport/"+all; 
			}
		}
    	$('#myTab a').click(function(e) {
		  e.preventDefault();
		  $(this).tab('show');
		});
		$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
		  var id = $(e.target).attr("href").substr(1);
		  window.location.hash = id;
		});
		var hash = window.location.hash;
		$('#myTab a[href="' + hash + '"]').tab('show');
    	$('#editModalDevice').on('show.bs.modal', function(e) {
			$(e.currentTarget).find('input[name="device_id"]').val($(e.relatedTarget).data('device-id'));
			$(e.currentTarget).find('input[name="rpi_mac_address"]').val($(e.relatedTarget).data('rpi-mac'));
		});
		$('#editSched').on('show.bs.modal', function(e) {
			$(e.currentTarget).find('input[name="depid"]').val($(e.relatedTarget).data('dep'));
			$(e.currentTarget).find('input[name="name"]').val($(e.relatedTarget).data('name'));
			$(e.currentTarget).find('input[name="section"]').val($(e.relatedTarget).data('section'));
			$(e.currentTarget).find('input[name="time_from"]').val($(e.relatedTarget).data('timefrom'));
			$(e.currentTarget).find('input[name="time_to"]').val($(e.relatedTarget).data('timeto'));
			$(e.currentTarget).find('input[name="day"]').val($(e.relatedTarget).data('day'));
			$(e.currentTarget).find('input[name="SY_from"]').val($(e.relatedTarget).data('syfrom'));
			$(e.currentTarget).find('input[name="SY_to"]').val($(e.relatedTarget).data('syto'));
			$(e.currentTarget).find('input[name="sched_id"]').val($(e.relatedTarget).data('schedid'));
			var room = $(e.relatedTarget).data('roomid');
			$('#roomSelect').val(room);
			var sem = $(e.relatedTarget).data('semester');
			$('#semSelect').val(sem);
		});
		$('#editModalRoom').on('show.bs.modal', function(e) {
			$(e.currentTarget).find('input[name="room_id"]').val($(e.relatedTarget).data('room-id'));
			$(e.currentTarget).find('input[name="room_no"]').val($(e.relatedTarget).data('room-no'));
			$(e.currentTarget).find('input[name="room_no2"]').val($(e.relatedTarget).data('room-no'));
			$(e.currentTarget).find('input[name="bldg_id2"]').val($(e.relatedTarget).data('bldg-id'));
			$(e.currentTarget).find('input[name="pin_no"]').val($(e.relatedTarget).data('pin-no'));
			var id = $(e.relatedTarget).data('device-id');
			$('#deviceSelect').val(id);
			var id = $(e.relatedTarget).data('bldg-id');
			$('#bldgSelect').val(id);
		});
		$('#editModalBuilding').on('show.bs.modal', function(e) {
			$(e.currentTarget).find('input[name="bldg_id"]').val($(e.relatedTarget).data('bldg-id'));
			$(e.currentTarget).find('input[name="bldg_no"]').val($(e.relatedTarget).data('bldg-no'));
			$(e.currentTarget).find('input[name="bldg_no2"]').val($(e.relatedTarget).data('bldg-no'));
			$(e.currentTarget).find('input[name="bldg_name"]').val($(e.relatedTarget).data('bldg-name'));
		});
	  	$('#editModalDep').on('show.bs.modal', function(e) {
			$(e.currentTarget).find('input[name="department_id"]').val($(e.relatedTarget).data('dep-id'));
			$(e.currentTarget).find('input[name="department_name"]').val($(e.relatedTarget).data('dep-name'));
		});
		$('#editModalPos').on('show.bs.modal', function(e) {
			$(e.currentTarget).find('input[name="position_id"]').val($(e.relatedTarget).data('pos-id'));
			$(e.currentTarget).find('input[name="position_type"]').val($(e.relatedTarget).data('pos-type'));
		});
		$('#editModalUser').on('show.bs.modal', function(e) {
			$(e.currentTarget).find('input[name="user_id"]').val($(e.relatedTarget).data('id-user'));
			$(e.currentTarget).find('input[name="user_no"]').val($(e.relatedTarget).data('user-no'));
			$(e.currentTarget).find('input[name="tags_id"]').val($(e.relatedTarget).data('tagsid'));
			$(e.currentTarget).find('input[name="position_type"]').val($(e.relatedTarget).data('pos-type'));
			$(e.currentTarget).find('input[name="fname"]').val($(e.relatedTarget).data('fname'));
			$(e.currentTarget).find('input[name="mname"]').val($(e.relatedTarget).data('mname'));
			$(e.currentTarget).find('input[name="lname"]').val($(e.relatedTarget).data('lname'));
			var depid = $(e.relatedTarget).data('dep-id');
			var posid = $(e.relatedTarget).data('pos-id');
			$('#depIDSelect').val(depid);
			$('#posIDSelect').val(posid);
		});
		$('#viewrequest,#viewreqapproved').on('show.bs.modal', function(e) {
			$(e.currentTarget).find('input[name="timelogs_id"]').val($(e.relatedTarget).data('timeid'));
			$(e.currentTarget).find('input[name="request_id"]').val($(e.relatedTarget).data('reqid'));
			$(e.currentTarget).find('input[name="user_id"]').val($(e.relatedTarget).data('userid'));
			$(e.currentTarget).find('input[name="name"]').val($(e.relatedTarget).data('name'));
			$(e.currentTarget).find('input[name="date_submitted"]').val($(e.relatedTarget).data('datesubmitted'));
			$(e.currentTarget).find('input[name="sched"]').val($(e.relatedTarget).data('sched'));
			$(e.currentTarget).find('input[name="sched_id"]').val($(e.relatedTarget).data('sid'));
			$(e.currentTarget).find('input[name="time_from"]').val($(e.relatedTarget).data('timefrom'));
			$(e.currentTarget).find('input[name="time_to"]').val($(e.relatedTarget).data('timeto'));
			$(e.currentTarget).find('input[name="dp"]').val($(e.relatedTarget).data('dp'));
			$(e.currentTarget).find('input[name="date"]').val($(e.relatedTarget).data('date'));
			$(e.currentTarget).find('input[name="status"]').val($(e.relatedTarget).data('status'));
			$(e.currentTarget).find('input[name="accepted_by"]').val($(e.relatedTarget).data('accepted'));
			var note = $(e.relatedTarget).data('note');
			var response = $(e.relatedTarget).data('response');
			$('#note').val(note);
			$('#note2').val(note);
			$('#response').val(response);
		});
       $('.reset_password').click(function(){  
            var id = $(this).attr("id");  
            if(confirm("Are you sure to reset this account's password?"))  
            {  
            	window.location="<?php echo base_url(); ?>AdminController/reset_password/"+id;  
            } else  {   return false;   }  
       });  
	   $('.deactivate_account').click(function(){  
	        var id = $(this).attr("id");  
	        if(confirm("Are you sure to deactivate this account?"))  
	        {  
	             window.location="<?php echo base_url(); ?>AdminController/deactivate_account/"+id;  
	        }  else  {   return false;  }  
	   });  
	   $('.activate_account').click(function(){  
	        var id = $(this).attr("id");  
	        if(confirm("Are you sure to activate this account?"))  
	        {  
	             window.location="<?php echo base_url(); ?>AdminController/activate_account/"+id;  
	        }  else {  return false;  }  
	   });  
	</script>

</body>

</html>
