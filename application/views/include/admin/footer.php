        
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
    	function changeFun4() {

			var selectedValue = selectBox.options[selectBox.selectedIndex].value;
			if (selectedValue == 'PDF') {
				alert(selectedValue);
			}else if(selectedValue == 'All123' || selectedValue == 'Present123' || selectedValue == 'Late123' || selectedValue == 'Absent123') {
				var id = $('option:selected').attr('data-all');
				alert(selectedValue);
				//window.location="<?php echo base_url(); ?>AdminController/exportHrPerSched/"+id+"/"+selectedValue; 
			}
		}
	</script>
</body>

</html>
