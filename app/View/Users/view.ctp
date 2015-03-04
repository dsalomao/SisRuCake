<?php
$this->Html->addCrumb('Usuários', '/users');
$this->Html->addCrumb($user['User']['username']);
?>
<!-- PAGE CONTENT BEGINS -->

<div>
    <div id="user-profile-1" class="user-profile row">
        <div class="col-xs-12 col-sm-3 center">
            <div>
                <!-- #section:pages/profile.picture -->
                <span class="profile-picture">
                    <?php echo $this->Html->image('users/'.$user['User']['image_url'], array('class' => 'img-responsive profile-picture')); ?>
                </span>

                <!-- /section:pages/profile.picture -->
                <div class="space-4"></div>

                <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                    <div class="inline position-relative">
                        <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                            <i class="ace-icon fa fa-circle light-green"></i>
                            &nbsp;
                            <span class="white"><?php echo $user['User']['first_name']; ?>&nbsp;<?php echo $user['User']['last_name']; ?></span>
                        </a>

                        <ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
                            <li class="dropdown-header"> Change Status </li>

                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-circle green"></i>&nbsp;
                                    <span class="green">Available</span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-circle red"></i>&nbsp;
                                    <span class="red">Busy</span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-circle grey"></i>&nbsp;
                                    <span class="grey">Invisible</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="space-6"></div>

            <!-- #section:pages/profile.contact -->
            <div class="profile-contact-info">
                <div class="profile-contact-links align-left">
                </div>

                <div class="space-6"></div>

                <div class="profile-social-links align-center">
                    <a href="#" class="tooltip-info" title="" data-original-title="Visit my Facebook">
                        <i class="middle ace-icon fa fa-facebook-square fa-2x blue"></i>
                    </a>

                    <a href="#" class="tooltip-info" title="" data-original-title="Visit my Twitter">
                        <i class="middle ace-icon fa fa-twitter-square fa-2x light-blue"></i>
                    </a>

                    <a href="#" class="tooltip-error" title="" data-original-title="Visit my Pinterest">
                        <i class="middle ace-icon fa fa-pinterest-square fa-2x red"></i>
                    </a>
                </div>
            </div>

            <!-- /section:pages/profile.contact -->
            <div class="hr hr12 dotted"></div>

            <!-- #section:custom/extra.grid -->
            <div class="clearfix">

            </div>

            <!-- /section:custom/extra.grid -->
            <div class="hr hr16 dotted"></div>
        </div>

        <div class="col-xs-12 col-sm-9">
            <div class="center">
                <span class="btn btn-app btn-sm btn-light no-hover">

                </span>

                <span class="btn btn-app btn-sm btn-yellow no-hover">
                </span>

                <span class="btn btn-app btn-sm btn-pink no-hover">
                </span>

                <span class="btn btn-app btn-sm btn-grey no-hover">
                </span>

                <span class="btn btn-app btn-sm btn-success no-hover">
                </span>

                <span class="btn btn-app btn-sm btn-primary no-hover">
                </span>
            </div>

            <div class="space-12"></div>

            <!-- #section:pages/profile.info -->
            <div class="profile-user-info profile-user-info-striped">
                <div class="profile-info-row">
                    <div class="profile-info-name"> Username </div>

                    <div class="profile-info-value">
                        <span class="editable" id="username"><?php echo $user['User']['username']; ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Unidade UNESP </div>

                    <div class="profile-info-value">
                        <i class="fa fa-map-marker light-orange bigger-110"></i>
                        <span class="editable" id="country"><?php echo $user['Restaurant']['name']; ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Papel </div>

                    <div class="profile-info-value">
                        <span class="editable" id="age"><?php echo $user['User']['role']; ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Status </div>

                    <div class="profile-info-value">
                        <span class="label label-sm <?php echo $class = ($user['User']['status'] == 1) ? 'label-success':'label-danger';?>" id="user_status"><?php echo $status = ($user['User']['status'] == 1) ? 'Ativo': 'Desativado';?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Email </div>

                    <div class="profile-info-value">
                        <span class="editable" id="email"><?php echo $user['User']['email']; ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> About Me </div>

                    <div class="profile-info-value">
                        <span class="editable" id="about">Editable as WYSIWYG</span>
                    </div>
                </div>
            </div>

            <!-- /section:pages/profile.info -->
            <div class="space-20"></div>



                <div class="hr hr2 hr-double"></div>

                <div class="space-6"></div>

                <div class="center">
                    <button type="button" class="btn btn-sm btn-primary btn-white btn-round">
                        <i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
                        <span class="bigger-110">View more activities</span>

                        <i class="icon-on-right ace-icon fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>