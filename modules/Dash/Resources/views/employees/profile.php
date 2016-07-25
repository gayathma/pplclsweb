<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<h4 class="page-title">Human Resources</h4>
		<ol class="breadcrumb">
			<li>
				<a href="/dash">Dashboard</a>
			</li>
			<li>
				<a href="/dash/human-resources">Human Resources</a>
			</li>
			<li class="active">
				Profile
			</li>
		</ol>
	</div>
</div>
<!-- Page-Title -->

<div class="row">
	<div class="col-sm-5 col-md-4 col-lg-3">
		<div class="profile-detail card-box">
			<div>
				<?php if($employee->gender->gender == 'F'):?>
					<img class="img-circle" src="/images/employees/girl.png" alt="profile-image">
				<?php else:?>
					<img class="img-circle" src="/images/employees/boy.png" alt="profile-image">
				<?php endif;?>

				<ul class="list-inline status-list m-t-20">
					<li>
						<h3 class="text-success m-b-10"><?php echo ($employee->salutation)? $employee->salutation->title.'. ': ' ';?><?php echo $employee->getNameAttribute();?></h3>
						<p class="text-muted"><?php echo $employee->role->name;?></p>
					</li>
				</ul>
				<div class=" m-b-12"><i class="icon-badge" style="font-size: 20px;"></i><span class="badge badge-xs badge-warning" style="position: absolute;top: 255px;left: 162px;"><?php echo $employee->grade?></span></div>

				<hr>

				<div class="text-left">

					<p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15"><?php echo $employee->email;?></span></p>

					<p class="text-muted font-13"><strong>Age :</strong> <span class="m-l-15"><?php echo $employee->age;?></span></p>

					<p class="text-muted font-13"><strong>Education :</strong> <span class="m-l-15"><?php echo ($employee->qualification)? $employee->qualification->qualification: '-';?></span></p>
				</div>
			</div>

		</div>

		<div class="card-box">
			<h4 class="m-t-0 m-b-20 header-title"><b>Curent Team Members <span class="text-muted">(<?php echo ($employee->team)? count($employee->team->emplyeeits): '0' ;?>)</span></b></h4>

			<div class="friend-list">
				<?php if(!is_null($employee->team)): ?>
					<?php if(count($employee->team->emplyeeits) > 0):?>
						<?php foreach ($employee->team->emplyeeits as $member):?>
							<a href="/dash/profile/<?php echo $member->id;?>">
								<?php if($member->gender->gender == 'F'):?>
									<img class="img-circle thumb-md" src="/images/employees/girl.png" alt="team-member" title="<?php echo ($member->salutation)? $member->salutation->title.'. ': ' ';?><?php echo $member->getNameAttribute();?>">
								<?php else:?>
									<img class="img-circle thumb-md" src="/images/employees/boy.png" alt="team-member" title="<?php echo ($member->salutation)? $member->salutation->title.'. ': ' ';?><?php echo $member->getNameAttribute();?>">
								<?php endif;?>
							</a>
						<?php endforeach; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="col-md-9">
        <div class="card-box">
            <h4 class="m-t-0 header-title m-b-30"><b>Skill Set</b></h4>
            <?php foreach ($employee->employeeittechnologies as $technology):?>
	            <div class="row m-b-10">
		            <div class="col-md-3">
		            	<strong> <?php echo $technology->technology->name;?></strong>
		            </div>
		            <div class="col-md-6">
			            <div class="progress progress-md">
			            	<?php  $grade = $technology->grade * 10; ?>
			            	<div class="progress-bar progress-bar-custom progress-bar-striped progress-animated wow animated" role="progressbar" aria-valuenow="<?php echo $grade;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $grade;?>%;">
			            		<span class="sr-only"><?php echo $grade;?>% Complete</span>
			            		<?php echo $grade;?>% 
			            	</div>
			            </div>
			        </div>
			    </div>
			 <?php endforeach; ?>
        </div>
         <div class="card-box">
		    <section id="cd-timeline" class="cd-container">
		        <div class="cd-timeline-block">
		            <div class="cd-timeline-img cd-success">
		                <i class="fa fa-tag"></i>
		            </div> <!-- cd-timeline-img -->

		            <div class="cd-timeline-content">
		                <h3>Timeline Event One</h3>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum
		                    provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis
		                    unde? Iste voluptatibus minus veritatis qui ut.</p>
		                <span class="cd-date">May 23</span>
		            </div> <!-- cd-timeline-content -->
		        </div> <!-- cd-timeline-block -->

		        <div class="cd-timeline-block">
		            <div class="cd-timeline-img cd-danger">
		                <i class="fa fa-thumbs-up"></i>
		            </div> <!-- cd-timeline-img -->

		            <div class="cd-timeline-content">
		                <h3>Timeline Event Two</h3>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum
		                    provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis
		                    unde?</p>
		                <button type="button"
		                        class="btn btn-primary btn-rounded waves-effect waves-light m-t-15">See more
		                    detail
		                </button>

		                <span class="cd-date">May 30</span>
		            </div> <!-- cd-timeline-content -->
		        </div> <!-- cd-timeline-block -->

		        <div class="cd-timeline-block">
		            <div class="cd-timeline-img cd-info">
		                <i class="fa fa-star"></i>
		            </div> <!-- cd-timeline-img -->

		            <div class="cd-timeline-content">
		                <h3>Timeline Event Three</h3>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati,
		                    quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda
		                    delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum
		                    quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam
		                    provident pariatur temporibus quia eos repellat ... <a href="#">Read more</a>
		                </p>
		                <span class="cd-date">Jun 05</span>
		            </div> <!-- cd-timeline-content -->
		        </div> <!-- cd-timeline-block -->

		        <div class="cd-timeline-block">
		            <div class="cd-timeline-img cd-pink">
		                <i class="fa fa-image"></i>
		            </div> <!-- cd-timeline-img -->

		            <div class="cd-timeline-content">
		                <h3>Timeline Event Four</h3>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum
		                    provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis
		                    unde? Iste voluptatibus minus veritatis qui ut.</p>
		                <img src="assets/images/small/img1.jpg" alt="">
		                <span class="cd-date">Jun 14</span>
		            </div> <!-- cd-timeline-content -->
		        </div> <!-- cd-timeline-block -->

		        <div class="cd-timeline-block">
		            <div class="cd-timeline-img cd-warning">
		                <i class="fa fa-pencil-square-o"></i>
		            </div> <!-- cd-timeline-img -->

		            <div class="cd-timeline-content">
		                <h3>Timeline Event Five</h3>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum
		                    provident rerum.</p>
		                <button type="button"
		                        class="btn btn-primary btn-rounded waves-effect waves-light m-t-15">See more
		                    detail
		                </button>
		                <span class="cd-date">Jun 18</span>
		            </div> <!-- cd-timeline-content -->
		        </div> <!-- cd-timeline-block -->

		        <div class="cd-timeline-block">
		            <div class="cd-timeline-img cd-primary">
		                <i class="fa fa-paperclip"></i>
		            </div> <!-- cd-timeline-img -->

		            <div class="cd-timeline-content">
		                <h3>Timeline Event End</h3>
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati,
		                    quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda
		                    delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum
		                    quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam
		                    provident pariatur temporibus quia eos repellat consequuntur perferendis enim
		                    amet quae quasi repudiandae sed quod veniam dolore possimus rem voluptatum
		                    eveniet eligendi quis fugiat aliquam sunt similique aut adipisci.</p>
		                <span class="cd-date">Jun 30</span>
		            </div> <!-- cd-timeline-content -->
		        </div> <!-- cd-timeline-block -->
		    </section> <!-- cd-timeline -->
		</div>
	</div>
</div>
<script type="text/javascript">
//menu active
$('#human_resources_menu').addClass('active');

</script>
