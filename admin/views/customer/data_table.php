<div><a href="javascript:void(0)" id="export-to-excel">Export to excel</a></div>
 <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="export-form">
						<input type="hidden" value='' id='hidden-type' name='ExportType'/>
					  </form>
                  <table id="" class="table table-striped table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Salary</th>
                  </tr>
                <tbody>
                  <?php foreach($data as $row):?>
				  <tr>
				  <td><?php echo $row ['Name']?></td>
				  <td><?php echo $row ['Status']?></td>
				  <td><?php echo $row ['Priority']?></td>
				  <td><?php echo $row ['Salary']?></td>
				  </tr>
				  <?php endforeach; ?>
                </tbody>
              </table>