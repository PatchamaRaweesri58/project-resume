<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="index.blade.php">
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">Dashtreme Admin</h5>
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
                <a href="index.html">
                    <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                    <h5 class="logo-text">Dashtreme Admin</h5>
                </a>
            </div>
            <ul class="sidebar-menu do-nicescrol">
                <li class="sidebar-header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{ route('datatables') }}">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('datatables.education') }}">
                        <i class="zmdi zmdi-format-list-bulleted"></i> <span>Education</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('datatables.skills') }}">
                        <i class="zmdi zmdi-grid"></i> <span>Skills</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('datatables.experience') }}">
                        <i class="zmdi zmdi-calendar-check"></i> <span>Experience</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('datatables.featured') }}">
                        <i class="zmdi zmdi-face"></i> <span>Featured</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('datatables.certificate') }}">
                        <i class="zmdi zmdi-account-circle"></i> <span>Certificate</span>
                    </a>
                </li>
                <li class="sidebar-header">LABELS</li>
                <li>
                    <a href="javaScript:void();">
                        <i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span>
                    </a>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span>
                    </a>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="zmdi zmdi-share text-info"></i> <span>Information</span>
                    </a>
                </li>
            </ul>
        </div>
        
    </ul>

</div>
<!--End sidebar-wrapper-->
