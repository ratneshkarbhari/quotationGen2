<main class="page-content" id="add-new-item">
    <div class="container">

        <h1 class="page-title">Change Password</h1>
        <p class="red-text"><?php echo $error; ?></p>
        <p class="green-text darken-3"><?php echo $success; ?></p>

        <form action="<?php echo site_url('change-password-exe'); ?>" method="post" enctype="multipart/form-data">

            <div class="input-field">

                <label for="currentPwd">Current Password</label>
                <input type="text" name="currentPwd" id="currentPwd">

            </div>
            <p id="pwdDontMatchError" class="red-text"></p>
            <div class="input-field">

                <label for="newPwdOne">Enter New Password</label>
                <input type="text" class="pwd-match-candidate" name="newPwdOne" id="newPwdOne">

            </div>
            <div class="input-field">

                <label for="newPwdTwo">Re Enter New Password</label>
                <input type="text" class="pwd-match-candidate" name="newPwdTwo" id="newPwdTwo">

            </div>
        
            <button type="submit" class="btn black">Change Password</button>

        </form>
    
    </div>
</main>

<script>
    $("input.pwd-match-candidate").change(function(){
        if($("input#newPwdOne").val()!=$("input#newPwdOne").val()){
            $("p#pwdDontMatchError").html('New Passswords Dont match');
        }else{
            $("p#pwdDontMatchError").html('');
        }
    });
</script>