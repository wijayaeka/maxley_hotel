		
        <script src="js/online/online.js"></script>
		  <div class="wBlock red clearfix" style="height: 60px;">    
                            <img id="red_light"  src="js/online/img/traffic_red.png" style="opacity:0; left: 20px; top:5px;">
							<img id="green_light" src="js/online/img/traffic_green.png" style="position: absolute; left: 20px; top:5px;">            
                        <div class="rSpace">
                             <span class='date' id="online_title" ></span>
							 <a href="#" id="tog" class="icon-th-list"  class='tipb' title='Menu' ></a>
                        </div>    		
						
         </div>                     
        <div id="connect" style="display:none; margin-top:-20px;">
			<div class="block news scrollBox">
			<input type="button" id="modal-upload" href="#modal-container-upload" role="button" class="btn" data-toggle="modal" name="upload" value="Sending Data To Server" />
			<div id="modal-container-upload"  class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h3 id="myModalLabel">
						Update Confirm
					</h3>
				</div>
				<div class="modal-body">
					<h3>
						Update Data To Server?
					</h3>
				</div>
				<div class="modal-footer">
					 <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> <button class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
		</div>
        <script>
            var greenLight = document.getElementById('green_light');
            var redLight = document.getElementById('red_light');

            window.onLineHandler = function(){
                greenLight.style.opacity = 1;
                redLight.style.opacity = 0;
                document.getElementById('online_title').innerHTML = 'YOU ARE ONLINE';
                document.getElementById('modal-upload').style.display = "block";
            };
            window.offLineHandler = function(){
                greenLight.style.opacity = 0;
                redLight.style.opacity = 1;
                document.getElementById('online_title').innerHTML = 'YOU ARE OFFLINE';
                document.getElementById('modal-upload').style.display = "none";
            };
        </script>
		<script>
		
		$(document).ready(function(){
		  $("#tog").click(function(){
			$("#connect").toggle('fast');
		  });
		});
		</script>