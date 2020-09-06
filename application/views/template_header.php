<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i
                class="icon_menu"></i></div>
    </div>
    <div class="top-nav notification-row">
        <ul class="nav pull-right top-menu">
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        
                    <span class="username"><?php echo $this->session->login[0]->nombreusuario;?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <div class="log-arrow-up"></div>
                    <li>
                        <a href="<?php echo base_url('login/logout') ?>"><i class="icon_key_alt"></i> Log Out</a>
                    </li>
        
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
    </div>

    <!--logo start-->
    <a href="" class="logo">+ <span class="lite">Protegemos</span></a>
    <!--logo end-->



    <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->

        <!-- notificatoin dropdown end-->
    </div>
</header>

<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <?php
            $menu = $this->session->login;
             $temps =[];   
            foreach($menu as $it){?>
                <?php if(($it->parent_id ==-1)){?>                
                <li class="">
                    <a href ="<?php echo base_url($it->url) ?>">    
                        <i class="<?php echo $it->icon;?>"></i>
                        <span>
                            <?php echo $it->descripcion;?>
                        </span>
                    </a>
                </li>
                <?php }else {
                    

                    $parent = $it->parent_id;
                  
                    
                    if(!in_array($parent, $temps)){ ?>                       
                    
                        <li id="<?php echo "it-".$parent; ?>" class="sub-menu">
                            <a href ="javascript:;">    
                                <i class="<?php echo $it->icon;?>"></i>
                                <span>
                                    <?php 
                                        for($i=0;$i<count($menu);$i++){
                                            if($menu[$i]->menu_id == $parent){
                                                echo $menu[$i]->descripcion;
                                            }
                                        }
                                    ?>
                                    
                                </span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                        
                        <?php 
                            $temp= $it->parent_id;
                            $temps[] = $temp;
                                                    
                            $menuTemp = $menu;                        
                            for($i=0;$i<count($menu);$i++){
                                echo "<ul class='sub' style='display: block;'>";
                                if($menu[$i]->parent_id == $temp){
                                    if($temp != $menu[$i]->menu_id){
                                        echo "<li><a class='' href='".base_url($menu[$i]->url)."'>".$menu[$i]->descripcion."</a></li>";
                                    }
                                    
                                }
                                echo"</ul>";
                            }
                            
                            
                        ?>
                        </li>
                        <?php  } ?>
                    
                <?php } ?>        
            <?php }?>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>



