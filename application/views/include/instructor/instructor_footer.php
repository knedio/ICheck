       

        </div>
        <!-- /#main-->

    </div>
    <!-- /#wrapper -->
	<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery -->
	<script src="<?php echo base_url();?>assets/scripts/klorofil-common.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">

		$('.disabled').click(function(e){
		    e.preventDefault();
		})
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
		$('#addRequest').on('show.bs.modal', function(e) {
			$(e.currentTarget).find('input[name="timelogs_id"]').val($(e.relatedTarget).data('tlid'));
			$(e.currentTarget).find('input[name="date"]').val($(e.relatedTarget).data('date'));
		});
		$('#viewrequest,#viewreqapproved').on('show.bs.modal', function(e) {
			$(e.currentTarget).find('input[name="request_id"]').val($(e.relatedTarget).data('reqid'));
			$(e.currentTarget).find('input[name="user_id"]').val($(e.relatedTarget).data('userid'));
			$(e.currentTarget).find('input[name="name"]').val($(e.relatedTarget).data('name'));
			$(e.currentTarget).find('input[name="date_submitted"]').val($(e.relatedTarget).data('datesubmitted'));
			$(e.currentTarget).find('input[name="sched"]').val($(e.relatedTarget).data('sched'));
			$(e.currentTarget).find('input[name="date"]').val($(e.relatedTarget).data('date'));
			$(e.currentTarget).find('input[name="status"]').val($(e.relatedTarget).data('status'));
			$(e.currentTarget).find('input[name="accepted_by"]').val($(e.relatedTarget).data('accepted'));
			var response = $(e.relatedTarget).data('response');
			var note = $(e.relatedTarget).data('note');
			$('#note').val(note);
			$('#note2').val(note);
			$('#response').val(response);
		});
	</script>
</body>

</html>
