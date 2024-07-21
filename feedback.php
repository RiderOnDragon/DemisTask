<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require_once("page-element/head.php"); ?>
    <link rel="stylesheet" href="/css/feedback/feedback.css?<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/css/feedback/feedback.css') ?> ">
    <title>Главная</title>
</head>
<body>
    <div class="container">
        <div class="content flex__window-center">
            <div class="form-block">
                <div class="form__title width-1-1">Обратная связь</div>
                <div class="errors width-1-1"></div>
                <form class="feedback-form" method="post" enctype="multipart/form-data">
                    <div class="form__inputs">
                        <div class="inputs-block width-1-2">
                            <label>
                                <input type="text" name="FIO" id="FIO" required>
                                <span class="animate__input__text">ФИО*</span>
                            </label>
                            <label>
                                <input type="text" name="Address" id="address">
                                <span class="animate__input__text">Адрес</span>
                            </label>
                        </div>
                        <div class="inputs-block width-1-2">
                            <label>
                                <input type="tel" name="Phone" id="phone" required>
                                <span class="animate__input__text">Телефон*</span>
                            </label>
                            <label>
                                <input type="email" name="Email" id="email">
                                <span class="animate__input__text">Электронная почта</span>
                            </label>
                        </div>
                    </div>
                    <div class="button-block width-1-3">
                        <button type="submit" >Отправить</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="content flex__whidth-center">
            <div class="result-table">
                <table></table>
            </div>
        </div>
    </div>

    <footer>
        <?php require_once("page-element/footer.php"); ?> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
        <script src="/js/feedback.js?<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/js/feedback.js') ?>"></script>
    </footer>
</body>
</html>