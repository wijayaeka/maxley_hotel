<?php 
$id_menu = $_GET['id'];
	$sql = mysql_query("select * from menu where id_menu = '$id_menu' ");
	$x = mysql_fetch_array($sql);
	echo"
	<div class='span8'>
	<div class='tabbable' id='tabs-b'>
			<ul class='nav nav-tabs'>
			<li  class='active'>
				<a href='#panel-b1' data-toggle='tab'>Edit Menu $x[title]</a>
			</li>
			<li>
				<a href='#panel-b2' data-toggle='tab'>Pilih Article</a>
			</li>
			</ul>
	<div class='tab-content'>
		<div class='tab-pane active' id='panel-b1'>
			<form method='post' action='$aksi?page=tree_menu&act=update_menu'   name='form_page'  >
				<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]' />
				<div class='workplace form'>
					<div class='row-fluid'>
					<div class='span11'>
					<div class='block-fluid'>                        
						<div class='head clearfix'>
							<div class='isw-bookmark'></div>
							<h1>UPDATE MENU 1</h1>
						</div>	
					<div class='row-form clearfix'>
						<p align='right'><a href='$aksi?page=tree_menu&gen=delete_main_menu&id=$id_menu' role='button' class='btn' ";?>onClick="return confirm('Hapus Menu ini?');"><?php echo"Delete</a></p>
						<div class='span3'>Nama Menu:</div>
						<div class='span5'>
						<div class='tabbable' id='tabs-a'>
											<ul class='nav nav-tabs'>
												<li  class='active'>
													<a href='#panel-a1' data-toggle='tab'>Bahasa Indonesia</a>
												</li>
												<li>
													<a href='#panel-a2' data-toggle='tab'>English</a>
												</li>
											</ul>
											<div class='tab-content'>
												<div class='tab-pane active' id='panel-a1'>
													<input type='text' id='menu_name' name='menu_name' value='$x[menu_name]' class='easyui-validatebox' required='true'/>
												</div>
												<div class='tab-pane ' id='panel-a2'>
													<input type='text' id='menu_name_english' name='menu_name_english' value='$x[menu_name_english]'/>
												</div>
											</div>
						</div>
						</div>
					</div>
					<div class='row-form clearfix'>
						<div class='span3'>Icon Menu:</div>
						<div class='span5'>&nbsp; &nbsp;
							<select name='icon'  id='s2_1'  style='width: 50%;'>
								<option value='$x[icon]'> $x[icon] </option>
								<option value='home'>home</option>
								<option value='bars'>bars</option>
								<option value='user'>user</option>
								<option value='university'>university</option>
								<option value='institution'>institution</option>
								<option value='envelope'>envelope</option>
								<option value='photo'>photo</option>
								<option value='suitcase'>suitcase</option>
								<option value='tags'>tags</option>
								<option value='lightbulb'>lightbulb</option>
								<option value='gears'>gears</option>
								<option value='gift'>gift</option>
								<option value='glass'>glass</option>
								<option value='plane'>plane</option>
								<option value='star'>star</option>
							</select>
						</div>
					</div>
					<div class='row-form clearfix'>
						<div class='span3'>Urutan:</div>
						<div class='span5'>&nbsp; &nbsp;
							<input type='text' name='urutan' value='$x[list_number]' id='urutan' style='width:40px;' />
						</div>
					</div>
					<div class='row-form clearfix'>
							<input type='submit'   class='btn' value='Update' />
							<input type='button' value= 'Cancel'  class='btn' onclick='history.back()'>
					</div> 
					</div>
					</div>
					</div>
				</div>
			</form>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Article Menu 1</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
			<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
				<thead>
                    <tr>
                                    <th width='3%'><input type='checkbox' name='checkbox'/></th>
                                    <th width='25%'>Article Menu 1</th>
                                    <th width='15%' style='text-align:center;'>AKSI</th>     
									<th width='1%'></th>
									<th width='1%'></th>
                    </tr>
                </thead>
                    <tbody>";
					$tp = mysql_query("select * from article WHERE menu_stats = 'mm' AND id_menu='$x[id_menu]' ");
					while($r= mysql_fetch_array($tp))
						{
						echo "<tr>
								<td><input type='checkbox' name='checkbox'/></td>
								<td style='padding-left:10px;'>".(implode(" ", array_slice(explode(" ", $r['title']), 0, 3))); echo"..</td>
								<td style='text-align:center;'>
									<a href='#' id=$r[id_article] class='delbutton btn'>
										Remove
									</a>
								</td>
								<td></td>
								<td></td>
							</tr>";		
						}
				echo"</tbody>
			</table>
				</div>
				</div>
			</div>
		</div>
		</div>
		<div class='tab-pane ' id='panel-b2'>
		<div class='workplace'>
           <form  method='post' id='select_album_video' action='modul/mod_treemenu/aksi_tree_menu.php?page=tree_menu&act=update_main_menu'>
				<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
				<div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Pilih Article</h1>                               
                    </div>
				<table table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable' >
				<thead>
					<tr><th style='text-align:center;'>No</th>
					<th style='text-align:center;'>Judul_Article</th>
					<th style='text-align:center;'>Pilih</th>
				</tr>
				</thead>
				<tbody>";
				$article = mysql_query("select * from article WHERE menu_stats ='' and status = 'Y' ");
				$no = 1;
				while($x = mysql_fetch_array($article))
					{
						echo "
							<tr><td style='text-align:center;'>$no</td>
							<td>$x[title]</td>
							<td style='text-align:center;'>
							<input type='checkbox' style='margin-left:3px;' value='$x[id_article]' name='id_article[]' $key /> 
							</td>
							</tr>";						
				$no++;
					}
		echo"<tbody></table>
		<input type='submit' name='ok' class='btn' value='Add'>
	</form>
	</div>
	</div>
	</div>
	</div>
</div>";
?>