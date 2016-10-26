<nav class="navbar navbar-default navbar-fixed" role="navigation">
    <!--<div class="container">-->
        <div class="navbar-header">
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"></button>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">Real Time Rates</a></li>
                <li><a href="/how-to">How To</a></li>
                <li><a href="/our-services">Our Services</a></li>
                <li><a href="/payments">Payments</a></li>
                <li><a href="/legal">Legal</a></li>
<!--            </ul>
            <ul class="nav navbar-nav navbar-right">-->
                <?php if (Session::has('client_id')): ?>
                    <li class="dropdown">
                        <a href="/client/dashboard" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?php echo Model\Client::getNavbarName(Session::get('client_id')); ?> (Client)<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/client/dashboard">Dashboard</a></li>
                            <li><a href="/client/edit">Edit Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/client/logout">Logout</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (Session::has('contractor_id')): ?>
                    <li class="dropdown">
                        <a href="/contractor/dashboard" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?php echo Model\Contractor::getNavbarName(Session::get('contractor_id')); ?> (Contractor)<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/contractor/dashboard">Dashboard</a></li>
                            <li><a href="/contractor/edit">Edit Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/contractor/logout">Logout</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (!Session::has('client_id') && !Session::has('contractor_id')): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contractor (Sign In)<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/contractor/login">Login</a></li>
                            <li><a href="/contractor/register">Register</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Client (Sign In)<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/client/login">Login</a></li>
                            <li><a href="/client/register">Register</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    <!--</div>-->
</nav>
