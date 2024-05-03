<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/OPOP-fill.css">
    <title>Заполнение руководителя ОПОП</title>
</head>
<body>
    
    <header>
        <div class="header-container">
			<div class="container-content">
                <a class="content-back link" href="admin.php">
                    <strong>Назад</strong>
                </a>
				<a class="content-exit" href="../back/sign_login/logout.php">
                    <!-- <span class="info-reg">Выход</span> -->
                    <strong>Выход</strong>
                </a>
			</div>
		</div>
    </header>

    <main>
        <div class="main-container">
            <form action="../back/crud/createInstitute.php" method="post" enctype="multipart/form-data">
                <div class="main-content">
                    <div class="practic">
                        <div>
                            <h2>Добавление института</h2>
                            <input type="text" name="name" placeholder="Введите название института">
                        </div>    
                    </div>
                </div>
                <button class="btn"" type="submit">Подтвердить</button>
            </form>
		</div>
    </main>
</body>
</html>