<?php

require_once  '../back/helpers.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/register.css">
    <title>Форма регистрации</title>
</head>
<body>
    <main>
    
        <div class="register-form">
            <h1 class="form-title">Вход</h1>
            <?php if(hasErrorMessage('error')):?>
            <div class="errorMsg"><?php echo getErrorMsg('error')?></div>
            <?php endif; ?>
            <form action="../back/sign_login/login.php" method="post" enctype="multipart/form-data">
                <div class="form-fields">
                    <div class="form-field">
                        <input type="text" name="name" placeholder="Введите имя" value="<?php echo old('name')?>">
                        <?php if(hasValidationError('name')) {
                            validationErrorMsg('name'); 
                        }?>
                    </div>
                    <div class="form-field">
                        <input type="password" name="password" placeholder="Введите пароль"  value="<?php echo old('password')?>">
                        <?php if(hasValidationError('password')) {
                            validationErrorMsg('password'); 
                        }?>
                    </div>

                    
                </div>
                <div class="form-buttons">
                    <button class="button" type="submit">Войти</button>
                </div>
            </form>
                
            
            
        </div>
    </main>
</body>
</html>