

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
						<h2 class="hk-pg-title font-weight-600 mb-10">Nominees</h2>
						<!--<p>Questions about onboarding lead data? <a href="#">Learn more.</a></p>-->
					</div>
					<!--<div class="d-flex w-500p">
						<select class="form-control custom-select custom-select-sm mr-15">
							<option selected="">Latest Products</option>
							<option value="1">CRM</option>
							<option value="2">Projects</option>
							<option value="3">Statistics</option>
						</select>
						<select class="form-control custom-select custom-select-sm mr-15">
							<option selected="">USA</option>
							<option value="1">USA</option>
							<option value="2">India</option>
							<option value="3">Australia</option>
						</select>
						<select class="form-control custom-select custom-select-sm">
							<option selected="">December</option>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="1">April</option>
							<option value="2">May</option>
							<option value="3">June</option>
							<option value="1">July</option>
							<option value="2">August</option>
							<option value="3">September</option>
							<option value="1">October</option>
							<option value="2">November</option>
							<option value="3">December</option>
						</select>
					</div>-->
                </div>
                <!-- /Title -->
<!-- here ----->

                <?php $i = 0; ?>
                	<div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <div class="overflow">
                                            <table class="table table-hover table-bordered mb-0" width="60%">
                                                <thead class="thead-success">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Award Name</th>
                                                        <th>Top Nominees</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Baba for the girls</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($baba as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td>
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Baby of the house</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($baby as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Besties</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($besties as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Chop chop</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($chop as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Close up</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($closeup as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Comedian</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($comedian as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Camel</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($donkey as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Early Momo</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($earlymomo as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Instablog</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($instablog as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Jaye Jaye</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($jaye as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>On call</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($call as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Papapa</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($papapa as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Trouble Maker</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($trouble as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Vibe Carrier</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($vibe as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Wife</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($wife as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>

                                                        <tr>
                                                          <td><?php echo ++$i; ?></td>
                                                          <td>Na me work pass</td>
                                                          <td>
                                                              <?php 
                                                              $ids = [];
                                                              $num = 0;
                                                              foreach ($workpass as $row) {
                                                                  if ($num < 5) {
                                                                    if (in_array($row->user_id, $ids))
                                                                    {
                                                                      continue;
                                                                    }
                                                                    else {
                                                                      $ids[$num] = $row->user_id;
                                                                      $num++;
                                                                      echo $row->name . ' = ' . $row->count . '<br>';
                                                                    }
                                                                  }
                                                                  else {
                                                                    break;
                                                                  }
                                                              } ?>
                                                          </td> 
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
               
            </div>

            <!-- /Container -->
			
            <!-- Footer -->
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <!--<p>&copy; <?=date ('Y')?> <a href="https://opendoorlimited.com/" class="text-dark" target="_blank">Open Door System International Limited</a></p>-->
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!--<p>Developed By<a href="mailto:insightconceptltd@gmail.com" class="text-dark" target="_blank">Insight Concept Nig. Ltd.</a></p>-->
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="<?=base_url()?>vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/js/parsley.min.js"></script>

