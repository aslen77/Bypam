                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.php?id_t=<?php echo $_SESSION['id_t'];?>&id_app=<?php echo $_SESSION['id_app'];?>">
							<i class="fa fa-hospital-o"></i><span>Accueil</span>
                            </a>
                        </li>					
<?php
if(compteurTable("menu","where id_application='".$_SESSION['id_app']."'")!=0)
{
$m=new Menu();
$i=0;
while($i<compteurTable("menu","where id_application='".$_SESSION['id_app']."'"))
{
$m->affiche($i,"where id_application='".$_SESSION['id_app']."' ORDER BY ordre ASC");
echo'<li>
       <a href="index.php?p='.$m->lien.'&id_t='.$_SESSION['id_t'].'&id_app='.$_SESSION['id_app'].'"><i class="fa fa-hospital-o"></i><span>'.$m->libelle.'</span>
       </a>
    </li>';
$i++;
}
}
else
{
?>				
					

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user-md"></i><span>Doctor</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="forms_basic.html">Add Doctor</a></li>
                                <li><a href="table.html">Doctor list</a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i><span>Patient</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="add-patient.html">Add patient</a></li>
                                <li><a href="pt-list.html">patient list</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-sitemap"></i><span>Department</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="add-department.html">Add Department</a></li>
                                <li><a href="dep-list.html">Department list</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-list-alt"></i> <span>Schedule</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="add-schedule.html">Add schedule</a></li>
                                <li><a href="sch-list.html">schedule list</a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-check-square-o"></i><span>Appionment</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="add-app.html">Add appoinemnt</a></li>
                                <li><a href="app-list.html">Appionment list</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-credit-card-alt"></i><span>payment</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="add-payment.html">Add payment</a></li>
                                <li><a href="pay-list.html">payment list</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                              <i class="fa fa-file-text"></i><span>Report</span>
                              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="patient-wise-report.html">Patient wise Report</a></li>
                            <li><a href="doctor-wise-report.html">Doctor wise Report</a></li>
                            <li><a href="total-report.html">Total Report</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="widgets.html">
                            <i class="fa fa-user-circle-o"></i><span>Human Resources</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="add-emp.html">Add Employee</a></li>
                            <li><a href="emp-list.html">employee list</a></li>
                            <li><a href="add-ns.html">Add Nurse</a></li>
                            <li><a href="ns-list.html">Nurse list</a></li>
                            <li><a href="add-ph.html">Add pharmacist</a></li>
                            <li><a href="ph-list.html">pharmacist list</a></li>
                            <li><a href="add-rep.html">Add Representative</a></li>
                            <li><a href="rep-list.html">Representative list</a></li>
                            
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-bed"></i><span>Bed Manager</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="add-bed.html">Add Bed</a></li>
                            <li><a href="bed-list.html">Bed list</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i><span>Notice</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="add-notice.html">Add Notice</a></li>
                            <li><a href="not-list.html">Notice list</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="mailbox.html">
                         <i class="fa fa-envelope"></i><span> Mail</span>
                     </a>
                 </li>
                 <li>
                    <a href="widgets.html">
                        <i class="fa fa-shopping-bag"></i><span> Widgets</span> 
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text"></i><span>pages</span>
                        <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="register.html">Sign up</a></li>
                        <li><a href="login.html">Sign in</a></li>
                        <li><a href="forget_password.html">Forget password</a></li>
                        <li><a href="lockscreen.html">Lockscreen</a></li>
                        <li><a href="404.html">404 Error</a></li>
                        <li><a href="505.html">505 Error</a></li>
                        <li><a href="blank.html">Blank Page</a></li>
                        <li><a href="profile.html">Profile page</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-alt fw"></i><span> User Interface</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="calender.html">Calender</a></li>
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="panels.html">Panels</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="tabs.html">Tabs & accordian</a></li>
                        <li><a href="icons_fontawesome.html">Icons</a></li>
                        <li><a href="notification.html">Notifications</a></li>
                        <li><a href="profile.html">Modals</a></li>
                        <li><a href="gridSystem.html">grid</a></li>
                        <li><a href="slider.html">slider</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="invoice.html">Invoice</a></li>
                        <li><a href="labels-badges-alerts.html">Badges</a></li>
                        <li><a href="progressbars.html">progress bar</a></li>
                        
                    </ul>
                </li>
                <li>
                    <a href="modals.html">
                        <i class="fa fa-window-maximize"></i><span> Modals</span> 
                    </a>
                </li>
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-columns"></i><span> Layout</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="layout_fixed.html">Fixed layout</a></li>
                        <li><a href="layout_boxed.html">Boxed layout</a></li>
                        <li><a href="layout_collapsed_sidebar.html">collapsed layout</a></li>
                    </ul>
                </li> 
<?php
}
?>				
            </ul>
        
