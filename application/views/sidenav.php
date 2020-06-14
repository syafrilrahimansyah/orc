<div class="menu-list">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="d-xl-none d-lg-none" href="<?php echo base_url()?>">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-column">
                <li class="nav-item" style="<?php echo (isset($navstyle[0]))?$navstyle[0]:'' ?>">
                    <a class="nav-link" href="<?php echo base_url()?>"><i class="fas fa-cube"></i>Browse</a>
                </li>
                
                <li class="nav-item" style="<?php echo (isset($navstyle[1]))?$navstyle[1]:'' ?>">
                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-desktop"></i>Monitor</a>
                    <div id="submenu-2" class="collapse submenu" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('main/monitor/activity')?>">Activity</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('main/monitor/process')?>">Process</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item" style="<?php echo (isset($navstyle[2]))?$navstyle[2]:'' ?>">
                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-columns"></i>Template Config</a>
                    <div id="submenu-4" class="collapse submenu" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('main/template_config/lookup')?>">Lookup</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('main/template_config/form_group')?>">Form Group</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('main/template_config/template')?>">Template</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item" style="<?php echo (isset($navstyle[3]))?$navstyle[3]:'' ?>">
                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-database"></i>SQL Output Config</a>
                    <div id="submenu-3" class="collapse submenu" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('main/sql_output_config/db_target')?>">DB Target</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('main/sql_output_config/table_key')?>">Table Key</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('main/sql_output_config/table_set')?>">Table Set</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item" style="<?php echo (isset($navstyle[4]))?$navstyle[4]:'' ?>">
                    <a class="nav-link" href="<?php echo base_url('main/setting')?>"><i class="fas fa-cog"></i>Setting</a>
                </li>
            </ul>
        </div>
    </nav>
</div>