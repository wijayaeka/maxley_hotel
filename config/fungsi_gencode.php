<?php 
function StyleId() { 
					$create = strtoupper(md5(uniqid(rand(),true))); 
					$style = 
						substr($create,0,8);
					return $style;
				}
				// End of function

				$gen_code = StyleId();
?>