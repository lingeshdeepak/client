
<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/js/script.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo site_url()?>assets/DataTables/js/jquery.dataTables.min.js"></script>
<!-- <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->

<script>

$(document).ready(function(){
	$('#country').change(function(){ 
        var c_id=$(this).val();
            $.ajax({
                url : "<?php echo site_url('client/get_state');?>",
                method : "POST",
                data : {c_id: c_id},
                async : true,
                dataType : 'json',
                success: function(data){
                        
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].s_id+'>'+data[i].state+'</option>';
                    }
                    html += '<option disabled selected>--Select State--</option>';
                    $('#state').html(html);
                }
        });
        return false;
    }); 

	$('#state').change(function(){ 
        var s_id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('client/get_city');?>",
                    method : "POST",
                    data : {s_id: s_id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].city_id+'>'+data[i].city+'</option>';
				}
				html += '<option disabled selected>--Select City--</option>';
                        $('#city').html(html);
				
                    }
        });
        return false;
    }); 
 
});
</script>
      </body>
</html>
