        </div>
        <!-- /#main-->
    </div>
    <!-- /#wrapper -->
	<!-- <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script> -->
	<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>	
	<script src="<?php echo base_url();?>assets/scripts/klorofil-common.js"></script>
    <script type="text/javascript">

		function selectFunc() {

			var selectedValue = selectType.options[selectType.selectedIndex].value;
			if (selectedValue == 'PDF') {
				var divToPrint = document.getElementById('datatables2');
			    var htmlToPrint = '' +
			        '<style type="text/css">' + '.yellow td { background-color: yellow; color: black;} .lightgreen td {background-color: lightgreen;color: black;}.red td {background-color: #ff3333;color: black;}' + 'table th:nth-child(1), table td:nth-child(1){ display:none;}' +
			        'table th, table td {' +
			        'border:1px solid #000;' +
			        'padding;0.5em;' +
			        '}' +'</style>';
			    htmlToPrint += divToPrint.outerHTML;
			    title = "<div style='text-align:center;font-size: 19px;font-weight:bold;'>University of Science and Technology of Southern Philippines<br>Reports Per Schedule</div>";
			    newWin = window.open("");
			    newWin.document.write(title);
			    newWin.document.write(htmlToPrint);
			    newWin.print();
			    newWin.close();
			}else {
				var all = $('option:selected').attr('data-al');
				var date = $('option:selected').attr('data-date');
				window.location="<?php echo base_url(); ?>AdminController/exportSchedByDep/"+all+"/"+date; 
			}
		}
	</script>
</body>

</html>
