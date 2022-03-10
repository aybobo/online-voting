

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
						<h2 class="hk-pg-title font-weight-600 mb-10">Vote</h2>
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
				<div class="row justify-content-center">
					<div class="col-md-4 col-md-offset-4">
						<div class="text-center">
				        <?php if($msg = $this->session->flashdata('msg')) {
				                echo '<div class="text-danger">' . $msg . '</div>';  } ?>
				            <?php if($msg = $this->session->flashdata('success')) {
				                echo '<div class="text-success">' . $msg . '</div>';  } ?>
				      	</div>
					</div>
				</div>

                <!-- Row -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Vote</div>
                            <div class="card-body">
                            	<?php echo form_open('staffvote/submitvote', 
                        			['class' => 'form_horizontal']); ?>
                                
                                    <!-- on call -->

                                    <div class="form-group">
                                        <label for="call" class="cols-sm-2 control-label">On call award - this award is for that staff that is always on call
                                        </label><small><?php echo form_error('call', '<div class="text-danger">', '</div>'); ?></small>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                	<span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                </div>
                                                    <select class="form-control custom-select" name="call" id="call">
                                                    <option value="" selected>Select Staff</option>
                                                    <?php 
                                                    foreach($staff as $row)
                                                        //$var = $row->name . ', ' . $row->unit;
                                                        { 
                                                          echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- pa pa pa-->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="papapa" class="cols-sm-2 control-label">Papapa award - that individual that always want stuff done instantly
                                            </label><small><?php echo form_error('papapa', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="papapa" id="papapa">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- early momo  -->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="earlymomo" class="cols-sm-2 control-label">Early momo award - this award is for that individual that comes to work very early
                                            </label><small><?php echo form_error('earlymomo', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="earlymomo" id="earlymomo">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- vibe carrier -->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="vibe" class="cols-sm-2 control-label">Vibe carrier award - for that individual that always has a positive energy
                                            </label><small><?php echo form_error('vibe', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="vibe" id="vibe">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- work pass  -->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="work_pass" class="cols-sm-2 control-label">Na you work pass award - this award is for that staff that is always busy
                                            </label><small><?php echo form_error('work_pass', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="work_pass" id="work_pass">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- insta  -->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="instablog" class="cols-sm-2 control-label">Instablog award - this award is for that individual that is always up-to-date with current information
                                            </label><small><?php echo form_error('instablog', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="instablog" id="instablog">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- closeup -->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="closeup" class="cols-sm-2 control-label">Close up award - for the staff that smiles a lot
                                            </label><small><?php echo form_error('closeup', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="closeup" id="closeup">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- comedian -->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="comedian" class="cols-sm-2 control-label">Comedian award - for the staff that cracks people up a lot
                                            </label><small><?php echo form_error('comedian', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="comedian" id="comedian">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- trouble -->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="trouble" class="cols-sm-2 control-label">Trouble maker award - for the staff that looks for trouble a lot
                                            </label><small><?php echo form_error('trouble', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="trouble" id="trouble">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- besties -->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="besties" class="cols-sm-2 control-label">Besties award - for the staff that is friends with everyone
                                            </label><small><?php echo form_error('besties', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="besties" id="besties">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- wife -->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="wife" class="cols-sm-2 control-label">Our wife award - for the female staff that associates with male staff the most
                                            </label><small><?php echo form_error('wife', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="wife" id="wife">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- baby of the house -->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="baby" class="cols-sm-2 control-label">Baby of the house award - for the staff that everyone pets
                                            </label><small><?php echo form_error('baby', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="baby" id="baby">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Chop chop -->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="chop" class="cols-sm-2 control-label">Chop chop award - for the staff that is always eating
                                            </label><small><?php echo form_error('chop', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="chop" id="chop">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- baba for the girls -->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="baba" class="cols-sm-2 control-label">Baba for the girls award - for the staff that likes female staff a lot
                                            </label><small><?php echo form_error('baba', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="baba" id="baba">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- donkey -->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="donkey" class="cols-sm-2 control-label">Camel award - for that staff that drinks a lot of water from the dispenser
                                            </label><small><?php echo form_error('donkey', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="donkey" id="donkey">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- jaye award-->

                                    <div class="form-group">
                                        <div class="pad-vote">
                                            <label for="jaye" class="cols-sm-2 control-label">Jaye jaye award - this award is for the staff that party a lot
                                            </label><small><?php echo form_error('jaye', '<div class="text-danger">', '</div>'); ?></small>
                                            <div class="cols-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                                                    </div>
                                                        <select class="form-control custom-select" name="jaye" id="jaye">
                                                        <option value="" selected>Select Staff</option>
                                                        <?php 
                                                        foreach($staff as $row)
                                                            //$var = $row->name . ', ' . $row->unit;
                                                            { 
                                                              echo '<option value="'.$row->id.'">'. $row->name. ', ' .$row->unit. '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- -->

                                    <div class="form-group ">
                                        <!--<button type="button" class="btn btn-success btn-lg btn-block">Add User</button>-->

                                     <?php echo form_submit(['name' => 'submit', 
                                                            'value' => 'Submit Vote',
                                                            'class' => 'btn btn-success btn-block']); ?>
                                    </div>
                                    <!--<div class="login-register">
                                        <a href="index.php">Login</a>
                                    </div>-->
                                <?php echo form_close(); ?>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /Row -->


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
    

