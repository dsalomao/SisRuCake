<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>  
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>SisruCakeAce</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
                
        <?php   
                /* bootstrap & fontawesome */
                echo $this->Html->css('bootstrap');
                echo $this->Html->css('font-awesome');

                /* text fonts */
                echo $this->Html->css('ace-fonts');
                /* ace styles */
                echo $this->Html->css('ace');
        ?>
        
        <!--[if lte IE 9]>
                <?php echo $this->Html->css('ace-part2'); ?>
        <![endif]-->
        
        <?php
                /* Only if needed */
                echo $this->Html->css('ace-skins');
                echo $this->Html->css('ace-rtl');       
        ?>
        
        <!--[if lte IE 9]>
                <?php echo $this->Html->css('ace-ie'); ?>
        <![endif]-->
        
        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <?php echo $this->Html->script('ace/ace-extra'); ?>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lte IE 8]>
            <?php 
                echo $this->Html->script('libs/html5shiv'); 
                echo $this->Html->script('ace/respond');
            ?>
        <![endif]-->
        
        <?php echo $this->Html->script('libs/jquery'); ?>
        
        <?php
            /* page content specific plugin styles and scripts */
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>
        
        <script type="text/javascript">
                //If page has any inline scripts, it goes here
                jQuery(function($) {
                        console.log('hello!');
                });
        </script>
        
</head>

<body class="no-skin">
        <div id="navbar" class="navbar navbar-default navbar-collapse">
                <div id="navbar-container" class="navbar-container">
                        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
                                <span class="sr-only">Toggle sidebar</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                        </button>
                    
                        <div class="navbar-header pull-left">
                            <a href="#" class="navbar-brand">
                                    <small><i class="ace-icon fa fa-leaf"></i>SisruCakeAce</small>
                            </a>
                        </div><!-- /.navbar-header -->

                        <div class="navbar-buttons navbar-header pull-right navbar-collapse collapse">
                                <ul class="nav ace-nav">
                                <!-- user buttons such as messages, notifications and user menu -->
                                        <li class="light-blue user-min">
                                                <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                                        <?php echo $this->Html->image('busto.jpg', array('class' => 'nav-user-photo', 'alt' => 'Foto Daniel')); ?>
                                                        <span class="user-info">
                                                                <small>Bem vindo,</small> Daniel
                                                        </span>
                                                        <i class="ace-icon fa fa-caret-down"></i>
                                                </a>
                                            
                                                <ul class="user-menu dropdown-menu dropdown-menu-right dropdown-yellow dropdown-caret dropdown-close">
                                                        <li>
                                                                <?php
                                                                    echo $this->Html->link(
                                                                            $this->Html->tag(
                                                                                   'span',
                                                                                    ' Perfil do usuário',
                                                                                    array('class' => 'fa fa-user fa-fw')
                                                                            ), 
                                                                            array(
                                                                                    'controller' => 'users',
                                                                                    'action'    =>  'index',
                                                                                    'full_base' => true
                                                                            ),
                                                                            array(
                                                                                    'escape' => false 
                                                                            )
                                                                    );
                                                                ?>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                                <?php
                                                                    echo $this->Html->link(
                                                                            $this->Html->tag(
                                                                                   'span',
                                                                                    ' Opções',
                                                                                    array('class' => 'fa fa-gear fa-fw')
                                                                            ), 
                                                                            '',
                                                                            array(
                                                                                    'escape' => false 
                                                                            )
                                                                    );
                                                                ?>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                                <?php
                                                                    echo $this->Form->postLink(
                                                                            $this->Html->tag(
                                                                                    'span',
                                                                                    ' Sair',
                                                                                    array('class' => 'fa fa-sign-out fa-fw')
                                                                            ), 
                                                                            array(
                                                                                    'controller' => 'users',
                                                                                    'action' => 'logout',
                                                                                    'full_base' => true
                                                                            ),
                                                                            array(
                                                                                    'escape' => false 
                                                                            )
                                                                    );
                                                                ?>
                                                        </li>
                                                </ul>
                                        </li>
                                </ul>
                        </div><!-- /.navbar-buttons -->


                        <nav class="navbar-menu pull-left navbar-collapse collapse">
                          <!-- optional menu & form inside navbar -->
                        </nav><!-- /.navbar-menu -->

                </div><!-- /.navbar-container -->
        </div><!-- /.navbar -->
 
        <div class="main-container" id="main-container">
                <div id="sidebar" class="sidebar                  responsive">
                        <script type="text/javascript">
                                try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
                        </script>

                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                                        <button class="btn btn-success">
                                                <i class="ace-icon fa fa-signal"></i>
                                        </button>

                                        <button class="btn btn-info">
                                                <i class="ace-icon fa fa-pencil"></i>
                                        </button>

                                        <!-- #section:basics/sidebar.layout.shortcuts -->
                                        <button class="btn btn-warning">
                                                <i class="ace-icon fa fa-users"></i>
                                        </button>

                                        <button class="btn btn-danger">
                                                <i class="ace-icon fa fa-cogs"></i>
                                        </button>

                                        <!-- /section:basics/sidebar.layout.shortcuts -->
                                </div>

                                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                                        <span class="btn btn-success"></span>

                                        <span class="btn btn-info"></span>

                                        <span class="btn btn-warning"></span>

                                        <span class="btn btn-danger"></span>
                                </div>
                        </div><!-- /.sidebar-shortcuts -->

                        <ul class="nav nav-list">
                                <li class="">
                                        <a href="#" class="dropdown-toggle">
                                                <i class="menu-icon fa fa-tachometer"></i>
                                                <span class="menu-text"> Tarefas</span>

                                                <b class="arrow fa fa-angle-down"></b>
                                        </a>

                                        <b class="arrow"></b>

                                        <ul class="submenu">
                                                <li class="">
                                                        <?php
                                                        echo $this->Html->link(
                                                            $this->Html->tag(
                                                                'i',
                                                                '',
                                                                array('class' => 'menu-icon fa fa-caret-right')
                                                            ).'Receituário Padrão'.'<b class="arrow fa fa-angle-down"></b>',
                                                            '',
                                                            array(
                                                                'escape' => false,
                                                                'class' => 'dropdown-toggle'
                                                            )
                                                        );
                                                        ?>

                                                        <ul class="submenu">
                                                                <li class="">
                                                                    <?php
                                                                    echo $this->Html->link(
                                                                        $this->Html->tag(
                                                                            'i',
                                                                            '',
                                                                            array('class' => 'menu-icon fa fa-book')
                                                                        ).' Livro de receitas',
                                                                        array(
                                                                            'controller' => 'Recipes',
                                                                            'action' => 'index'
                                                                        ),
                                                                        array('escape' => false)
                                                                    );
                                                                    ?>

                                                                    <b class="arrow"></b>
                                                                </li>
                                                        </ul>
                                                </li>

                                                <li class="">
                                                    <?php
                                                    echo $this->Html->link(
                                                        $this->Html->tag(
                                                            'i',
                                                            '',
                                                            array('class' => 'menu-icon fa fa-caret-right')
                                                        ).'Planejamento de cardápio'.'<b class="arrow fa fa-angle-down"></b>',
                                                        '',
                                                        array(
                                                            'escape' => false,
                                                            'class' => 'dropdown-toggle'
                                                        )
                                                    );
                                                    ?>

                                                    <ul class="submenu">
                                                        <li class="">
                                                            <?php
                                                            echo $this->Html->link(
                                                                $this->Html->tag(
                                                                    'i',
                                                                    '',
                                                                    array('class' => 'menu-icon fa fa-book')
                                                                ).' Livro de cardápios',
                                                                array(
                                                                    'controller' => 'meals',
                                                                    'action' => 'index'
                                                                ),
                                                                array('escape' => false)
                                                            );
                                                            ?>

                                                            <b class="arrow"></b>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li class="">
                                                        <?php
                                                                echo $this->Html->link(
                                                                        $this->Html->tag(
                                                                                'i',
                                                                                '',
                                                                                array('class' => 'menu-icon fa fa-caret-right')
                                                                        ).'Logística & <br>Suprimentos'.'<b class="arrow fa fa-angle-down"></b>',
                                                                        '',
                                                                        array(
                                                                                'escape' => false,
                                                                                'class' => 'dropdown-toggle'
                                                                        )
                                                                );
                                                        ?>

                                                        <ul class="submenu">
                                                                <li class="">
                                                                    <?php
                                                                    echo $this->Html->link(
                                                                        $this->Html->tag(
                                                                            'i',
                                                                            '',
                                                                            array('class' => 'menu-icon fa fa-calendar')
                                                                        ).' Caderno de entrada',
                                                                        array(
                                                                            'controller' => 'suppliesProducts',
                                                                            'action' => 'index'
                                                                        ),
                                                                        array('escape' => false)
                                                                    );
                                                                    ?>

                                                                    <b class="arrow"></b>
                                                                </li>
                                                                <li class="">
                                                                        <?php
                                                                                echo $this->Html->link(
                                                                                        $this->Html->tag(
                                                                                                'i',
                                                                                                '',
                                                                                                array('class' => 'menu-icon fa fa-fighter-jet')
                                                                                        ).' Fornecedores',
                                                                                        array(
                                                                                                'controller' => 'suppliers',
                                                                                                'action' => 'index'
                                                                                        ),
                                                                                        array('escape' => false)
                                                                                );
                                                                        ?>

                                                                        <b class="arrow"></b>
                                                                </li>
                                                                <li class="">
                                                                        <?php
                                                                                echo $this->Html->link(
                                                                                        $this->Html->tag(
                                                                                                'i',
                                                                                                '',
                                                                                                array('class' => 'fa fa-glass')
                                                                                        ).' Produtos',
                                                                                        array(
                                                                                                'controller' => 'products',
                                                                                                'action' => 'index'
                                                                                        ),
                                                                                        array('escape' => false)
                                                                                );
                                                                        ?>

                                                                        <b class="arrow"></b>
                                                                </li>
                                                                <li class="">
                                                                        <?php
                                                                        echo $this->Html->link(
                                                                                $this->Html->tag(
                                                                                        'i',
                                                                                        '',
                                                                                        array('class' => 'glyphicon glyphicon-tint')
                                                                                ).' Unidades de medida',
                                                                                array(
                                                                                        'controller' => 'measureUnits',
                                                                                        'action' => 'index'
                                                                                ),
                                                                                array('escape' => false)
                                                                        );
                                                                        ?>

                                                                        <b class="arrow"></b>
                                                                </li>
                                                        </ul>
                                                </li>

                                                <li class="">
                                                        <a href="#">
                                                                <i class="menu-icon fa fa-caret-right"></i>
                                                                Custo
                                                        </a>

                                                        <b class="arrow"></b>
                                                </li>

                                                <li class="">
                                                        <a href="treeview.html">
                                                                <i class="menu-icon fa fa-caret-right"></i>
                                                                Avalia&atilde;o da produ&ccedil;&atilde;o
                                                        </a>

                                                        <b class="arrow"></b>
                                                </li>

                                                <li class="">
                                                        <a href="jquery-ui.html">
                                                                <i class="menu-icon fa fa-caret-right"></i>
                                                                Estat&iacute;stico
                                                        </a>

                                                        <b class="arrow"></b>
                                                </li>
                                        </ul>
                                </li>

                                <li class="">
                                        <a href="widgets.html">
                                                <i class="menu-icon fa fa-inbox"></i>
                                                <span class="menu-text"> Documentos</span>
                                        </a>

                                        <b class="arrow"></b>
                                </li>

                                <li class="">
                                        <a href="widgets.html">
                                                <i class="menu-icon fa fa-bookmark"></i>
                                                <span class="menu-text"> Ocorr&ecirc;ncias</span>
                                        </a>

                                        <b class="arrow"></b>
                                </li>

                                <li class="">
                                        <a href="widgets.html">
                                                <i class="menu-icon fa fa-cutlery"></i>
                                                <span class="menu-text"> Clientes</span>
                                        </a>

                                        <b class="arrow"></b>
                                </li>

                                <li class="">
                                        <a href="widgets.html">
                                                <i class="menu-icon fa fa-exclamation-circle"></i>
                                                <span class="menu-text"> Alertas</span>
                                        </a>

                                        <b class="arrow"></b>
                                </li>

                                <li class="">
                                        <a href="widgets.html">
                                                <i class="menu-icon fa fa-folder-open"></i>
                                                <span class="menu-text"> Relat&oacute;rios</span>
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                        </ul><!-- /.nav-list -->

                        <!-- #section:basics/sidebar.layout.minimize -->
                        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                                <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                        </div>

                        <!-- /section:basics/sidebar.layout.minimize -->
                        <script type="text/javascript">
                                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
                        </script>
                </div>

                <div class="main-content">
                        <!-- #section:basics/content.breadcrumbs -->
                        <div class="breadcrumbs" id="breadcrumbs">
                                <script type="text/javascript">
                                        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                                </script>

                                <ul class="breadcrumb">
                                        <li>
                                                <i class="ace-icon fa fa-home home-icon"></i>
                                                <a href="#">Home</a>
                                        </li>

                                        <li>
                                                <a href="#">Other Pages</a>
                                        </li>
                                        <li class="active">Blank Page</li>
                                </ul><!-- /.breadcrumb -->

                                <!-- #section:basics/content.searchbox -->
                                <div class="nav-search" id="nav-search">
                                        <form class="form-search">
                                                <span class="input-icon">
                                                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                                                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                                                </span>
                                        </form>
                                </div><!-- /.nav-search -->

                                <!-- /section:basics/content.searchbox -->
                        </div>

                        <div class="page-content">
                                <!-- #section:settings.box -->
                                <div class="ace-settings-container" id="ace-settings-container">
                                        <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                                                <i class="ace-icon fa fa-cog bigger-150"></i>
                                        </div>

                                        <div class="ace-settings-box clearfix" id="ace-settings-box">
                                                <div class="pull-left width-50">
                                                        <!-- #section:settings.skins -->
                                                        <div class="ace-settings-item">
                                                                <div class="pull-left">
                                                                        <select id="skin-colorpicker" class="hide">
                                                                                <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                                                                <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                                                                <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                                                                <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                                                        </select>
                                                                </div>
                                                                <span>&nbsp; Choose Skin</span>
                                                        </div>

                                                        <!-- /section:settings.skins -->

                                                        <!-- #section:settings.navbar -->
                                                        <div class="ace-settings-item">
                                                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                                                                <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                                                        </div>

                                                        <!-- /section:settings.navbar -->

                                                        <!-- #section:settings.sidebar -->
                                                        <div class="ace-settings-item">
                                                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                                                                <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                                                        </div>

                                                        <!-- /section:settings.sidebar -->

                                                        <!-- #section:settings.breadcrumbs -->
                                                        <div class="ace-settings-item">
                                                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                                                                <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                                                        </div>

                                                        <!-- /section:settings.breadcrumbs -->

                                                        <!-- #section:settings.rtl -->
                                                        <div class="ace-settings-item">
                                                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                                                                <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                                                        </div>

                                                        <!-- /section:settings.rtl -->

                                                        <!-- #section:settings.container -->
                                                        <div class="ace-settings-item">
                                                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                                                                <label class="lbl" for="ace-settings-add-container">
                                                                        Inside
                                                                        <b>.container</b>
                                                                </label>
                                                        </div>

                                                        <!-- /section:settings.container -->
                                                </div><!-- /.pull-left -->

                                                <div class="pull-left width-50">
                                                        <!-- #section:basics/sidebar.options -->
                                                        <div class="ace-settings-item">
                                                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
                                                                <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                                                        </div>

                                                        <div class="ace-settings-item">
                                                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
                                                                <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                                                        </div>

                                                        <div class="ace-settings-item">
                                                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
                                                                <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                                                        </div>

                                                        <!-- /section:basics/sidebar.options -->
                                                </div><!-- /.pull-left -->
                                        </div><!-- /.ace-settings-box -->
                                </div><!-- /.ace-settings-container -->

                                <!-- /section:settings.box -->
                                <div class="row">
                                        <div class="col-xs-12">
                                                <!-- PAGE CONTENT BEGINS -->
                                                    <?php echo $this->Session->flash(); ?>
            
                                                    <?php echo $this->fetch('content'); ?>
                                                <!-- PAGE CONTENT ENDS -->
                                        </div><!-- /.col -->
                                </div><!-- /.row -->
                                <?php echo $this->Js->writeBuffer(); // Write cached scripts ?>
                                <?php echo $this->element('sql_dump'); ?>
                        </div><!-- /.page-content -->
                </div><!-- /.main-content -->
	 
                <div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">SisruCakeAce</span>
							Application &copy; 2014-2015
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script type="text/javascript">
                window.jQuery || document.write("<script src='js/libs/jquery.js'>"+"<"+"/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
            <script type="text/javascript">
             window.jQuery || document.write("<script src='js/libs/jquery1x.js'>"+"<"+"/script>");
            </script>
        <![endif]-->
        <script type="text/javascript">
                if('ontouchstart' in document.documentElement) document.write("<script src='js/libs/jquery.mobile.custom.js'>"+"<"+"/script>");
        </script>
        <?php echo $this->Html->script('ace/bootstrap'); ?>

        <!-- page specific plugin scripts -->

        <!-- ace scripts -->
        <?php 
            echo $this->Html->script('ace/ace-elements');
            echo $this->Html->script('ace/ace');
        ?>
 </body>
</html>
</html>
