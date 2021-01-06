<main class="page-container">

    <div class="container center">
    
        <div class="row">

            <div class="col l4 m2 s1"></div>
            <div class="col l4 m8 s10">

                <h4 class="page-title">Login to Invoicing</h4>
                <p class="red-text"><?php echo $error; ?></p>

                <div class="card">

                    <div class="card-content">

                        <form action="<?php echo site_url('user-login-exe'); ?>" method="post">
                        
                            <div class="input-field">

                                <label for="user-email">Email</label>
                                <input autocomplete="false" type="email" name="user-email" id="user-email" required>
                            
                            </div>
                            <div class="input-field">

                                <label for="user-password">Password</label>
                                <input autocomplete="false" type="password" name="user-password" id="user-password" required>

                            </div>

                            <button type="submit" class="btn">Login</button>
                        
                        </form>
                    
                    </div>

                </div>

                <div class="center">
                    <h4>OR</h4>
                    <a href="http://www.gochiskool.in" class="btn">Go Back to Website</a>
                </div>

            
            </div>
            <div class="col l4 m2 s1"></div>
        
        </div>

    </div>

</main>