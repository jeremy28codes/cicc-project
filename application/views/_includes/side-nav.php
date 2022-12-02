        <?php 
            $sidebar_modules = $this->M_system_web_module->get_all();
            $role_id = $this->session->userdata('role_id'); // If user role_id

            $current_module     =    isset($page_info['system_web_module']) && $page_info['system_web_module'] ? $page_info['system_web_module'] : '';
            $current_section     =    isset($page_info['system_web_section']) && $page_info['system_web_section'] ? $page_info['system_web_section'] : '';
        ?>
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                        </li>
                        <?php if(!empty($sidebar_modules)): ?>
                            <?php foreach($sidebar_modules as $key => $value): ?>
                                <?php
                                    $can_access_modules = $this->M_system_user_role_module_access->get_by_role_id($role_id);
                                    $can_access_sections = $this->M_system_user_role_section_access->get_by_role_id($role_id); // get details of section via link

                                    $sidebar_sections = $this->M_system_web_section->get_by_module_id($value->id); 
                                ?>
                                <?php if(!empty($sidebar_sections)): ?>
                                    <li class="sidebar-item <?= ($value->name == $current_module) ? " selected": "" ?>">
                                        <a class="sidebar-link has-arrow waves-effect waves-dark <?= ($value->name == $current_module) ? " active": "" ?>" href="<?= ($value->link!=="") ? base_url().$value->link : "javascript:void(0)" ?>" aria-expanded="false">
                                            <?php if($value->icon!=""): ?>
                                                <i class="<?= $value->icon ?>"></i>
                                            <?php else: ?>
                                                <i class="far fa-dot-circle"></i>
                                            <?php endif; ?>
                                            <span class="hide-menu"><?= $value->name ?> </span>
                                        </a>
                                        <ul aria-expanded="false" class="collapse  first-level <?= ($value->name == $current_module) ? " in": "" ?>">
                                            <?php foreach($sidebar_sections as $key => $value): ?>
                                                <li class="sidebar-item">
                                                    <a href="<?= ($value->link!=="") ? base_url().$value->link : "javascript:void(0)" ?>" class="sidebar-link <?= ($value->name == $current_section) ? " active": "" ?>">
                                                        <?php if($value->name == $current_section): ?>
                                                            <i class="fas fa-dot-circle"></i>
                                                        <?php else: ?>
                                                            <i class="far fa-dot-circle"></i>
                                                        <?php endif; ?>
                                                        <span class="hide-menu"> <?= $value->name ?> </span>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php else: ?>
                                    <li class="sidebar-item <?= ($value->name == $current_module) ? " selected": "" ?>">
                                        <a class="sidebar-link waves-effect waves-dark <?= ($value->name == $current_module) ? " active": "" ?>" href="<?= ($value->link!=="") ? base_url().$value->link : "javascript:void(0)" ?>" aria-expanded="false">
                                            <?php if($value->icon!=""): ?>
                                                <i class="<?= $value->icon ?>"></i>
                                            <?php else: ?>
                                                <i class="fas fa-dot-circle"></i>
                                            <?php endif; ?>
                                            <span class="hide-menu"><?= $value->name ?> </span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">