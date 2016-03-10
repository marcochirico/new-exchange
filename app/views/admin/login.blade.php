@include('admin.shared.header')

<div class="row">
    <div class="col-sm-4 col-mm-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
        <h3 class="login-title">Admin Login</h3>
        <?php
//        echo Hash::make('mutado01');
        $output = array();
        if (Session::has('login_form_error')) {
            echo '<div class="alert alert-danger">';
            echo '<ul>';
            foreach (Session::get('login_form_error')->all('<li>:message</li>') as $message) {
                echo $message;
            }
            echo '</ul>';
            echo '</div>';
        } else if (Session::has('login_auth_error')) {
            echo '<div class="alert alert-danger">' . Session::get('login_auth_error') . '</div>';
        }
        ?>
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="email" name="email" class="form-control" id="" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="password" name="password" class="form-control" id="" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-default">Sign In</button>
                </div>
            </div>
        </form>
    </div>
</div>

@include('admin.shared.footer')