<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }

        .galleryPreviewsContainer {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        a {
            margin: 5px;
            width: 300px;
            height: 150px;
            border: 1px solid gray;
        }

        p{
            padding-left: 15px;
            font-size: 10px;
        }
        .galleryImgContainer{
            margin: 5px;
            border-radius: 5px;
            padding-bottom: 5px;
        }

        .galleryImgContainer:hover{
            -webkit-box-shadow: 0px 0px 20px 10px rgba(204,198,204,1);
            -moz-box-shadow: 0px 0px 20px 10px rgba(204,198,204,1);
            box-shadow: 0px 0px 20px 10px rgba(204,198,204,1);

        }

        .galleryMinImg {
            width: 300px;
            height: 150px;
            border-radius: 5px;
            /*border: 1px solid gray;*/
        }

        footer {
            position: absolute;
            background: #009641;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 30px;
            text-align: center;
            padding-top: 10px;
            border-top: 1px solid gray;
        }

        .galleryWrapper__screen {
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #222;
            opacity: 0.8;
            position: fixed;
            top: 0;
            z-index: 100;
            display: block;
            text-align: center;
        }

        .galleryWrapper__image {
            max-height: 80%;
            max-width: 80%;
            z-index: 101;
            position: absolute;
            margin: auto;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
        }

        .galleryWrapper__close {
            z-index: 101;
            position: absolute;
            top: 5%;
            right: 5%;
            width: 4%;
        }

        .galleryWrapper__prev {
            z-index: 101;
            position: absolute;
            left: 0;
            top: 45%;
            width: 5%;
            background: #9f9f9f;
            border-radius: 5px;
        }

        .galleryWrapper__next {
            z-index: 101;
            position: absolute;
            right: 0;
            top: 45%;
            width: 5%;
            background: #9f9f9f;
            border-radius: 5px;
        }

        .viewsIcon__container {
            position: absolute;
            top: 5%;
            left: 5%;
            z-index: 101;
        }

        .viewsIcon__container>p{
            font-size: 44px;
            background: white;
            padding: 5px 10px;
            border-radius: 5px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="galleryPreviewsContainer">
<?php

        $link = mysqli_connect('localhost', 'root', '', 'mygallery');
        /*if (!$link) {
            echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
            echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        echo "Соединение с MySQL установлено!" . PHP_EOL;
        echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL . "<br>";*/

        $sql = "SELECT id, name, link, views FROM images ;";
        $res = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            echo <<<php
            <div class='galleryImgContainer'>
            <img data-id="{$row['id']}" src="{$row['link']}" 
            class="galleryMinImg" alt="{$row['name']}"
            data-full_image_url="{$row['link']}" data-views="{$row['views']}">
            <p><i class="fas fa-eye"></i> {$row['views']}</p>
            </div>
php;
}
?>
    </div>
    <footer>
        <form enctype="multipart/form-data" method="post">
            <input type="hidden" name="token" value="<?php echo(rand(10000,99999));?>" />
            <input name="picture" type="file" />
            <input type="submit" value="Загрузить" required/>
            <?php
                $logDir= "logs";
                $logName= "log";
                $logFormat= ".txt";

                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    if ($_POST['token'] !== $_SESSION['lastToken'])
                    {
                        $date = date("Y_m_d_H_i_s");
                        $newFileName = $imgDir . $_FILES['picture']['name'];
                        $tmpFileName = $_FILES['picture']['tmp_name'];

                        if (file_exists($logDir."/".$logName.$logFormat)) {
                            if (sizeof(file($logDir."/".$logName.$logFormat)) >= 10 ){
                                rename($logDir."/".$logName.$logFormat,$logDir."/".$logName.$date.$logFormat);
                                $file = fopen($logDir."/".$logName.$logFormat,"w+");
                            }else{
                                $file = fopen($logDir."/".$logName.$logFormat,"a+");
                            }
                        } else{
                            $file = fopen($logDir."/".$logName.$logFormat,"w+");
                        }

                        if (!file_exists($newFileName)){
                            if (!@copy($tmpFileName, $newFileName)) {
                                echo "Что-то пошло не так";
                                fwrite($file,"{$date} Load failed \n");
                            } else {
                                echo "Загрузка удачна";
                                fwrite($file,"{$date} File successfully uploaded - {$newFileName} \n");
                            }
                        }else{
                            fwrite($file,"{$date} Something gone wrong \n");
                        }
                        fclose($file);
                        $_SESSION['lastToken'] = $_POST['token'];
                    }
                }
            ?>
        </form>
    </footer>
    <script>
        "use strict";

        /**
         * @property {Object} settings Объект с настройками галереи.
         * @property {string} settings.previewSelector Селектор обертки для миниатюр галереи.
         * @property {string} settings.openedImageWrapperClass Класс для обертки открытой картинки.
         * @property {string} settings.openedImageClass Класс открытой картинки.
         * @property {string} settings.openedImageScreenClass Класс для ширмы открытой картинки.
         * @property {string} settings.openedImageCloseBtnClass Класс для картинки кнопки закрыть.
         * @property {string} settings.openedImageCloseBtnSrc Путь до картинки кнопки открыть.
         */
        const gallery = {
            settings: {
                previewSelector: '.mySuperGallery',
                openedImagePrevButtonClass: 'galleryWrapper__prev',
                openedImagePrevButtonSrc: 'images/gallery/arrow-left.png',
                openedImageNextButtonClass: 'galleryWrapper__next',
                openedImageNextButtonSrc: 'images/gallery/arrow-right.png',
                openedImageWrapperClass: 'galleryWrapper',
                openedImageClass: 'galleryWrapper__image',
                openedImageScreenClass: 'galleryWrapper__screen',
                openedImageCloseBtnClass: 'galleryWrapper__close',
                openedImageCloseBtnSrc: 'images/gallery/close.png',
                openedImageErr404: 'images/gallery/404.jpg',
                viewsIconClass: 'viewsIcon__container',
            },
            views: '',

            activeBigImage: {},

            /**
             * Инициализирует галерею, ставит обработчик события.
             * @param {Object} userSettings Объект настроек для галереи.
             */
            init(userSettings = {}) {
                // Записываем настройки, которые передал пользователь в наши настройки.
                Object.assign(this.settings, userSettings);

                // Находим элемент, где будут превью картинок и ставим обработчик на этот элемент,
                // при клике на этот элемент вызовем функцию containerClickHandler в нашем объекте
                // gallery и передадим туда событие MouseEvent, которое случилось.
                document
                    .querySelector(this.settings.previewSelector)
                    .addEventListener('click', event => this.containerClickHandler(event));
            },

            /**
             * Обработчик события клика для открытия картинки.
             * @param {MouseEvent} event Событие клики мышью.
             * @param {HTMLElement} event.target Целевой объект, куда был произведен клик.
             */
            containerClickHandler(event) {
                // Если целевой тег не был картинкой, то ничего не делаем, просто завершаем функцию.
                if (event.target.tagName !== 'IMG') {
                    return;
                }
                // Открываем картинку с полученным из целевого тега (data-full_image_url аттрибут).
                if (this.imageExist(event.target.dataset.full_image_url)) {
                    this.views = event.target.dataset.views;
                    this.openImage(event.target.dataset.full_image_url);
                } else {
                    this.openImage(this.settings.openedImageErr404);
                }
                this.activeBigImage = event.target;
            },

            /**
             * Обработчик события клика для перехода к предыдущему изображению
             */
            prevImageClickHandler() {
                if (this.activeBigImage.previousElementSibling != null) {
                    if (this.imageExist(this.activeBigImage.previousElementSibling.dataset.full_image_url)) {
                        this.views = this.activeBigImage.nextElementSibling.dataset.views;
                        this.openImage(this.activeBigImage.previousElementSibling.dataset.full_image_url);
                    } else {
                        this.openImage(this.settings.openedImageErr404);
                    }
                    this.activeBigImage = this.activeBigImage.previousElementSibling;
                }
            },

            /**
             * Обработчик события клика для перехода к следующему изображению
             */
            nextImageClickHandler() {
                if (this.activeBigImage.nextElementSibling != null) {
                    if (this.imageExist(this.activeBigImage.nextElementSibling.dataset.full_image_url)) {
                        this.views = this.activeBigImage.nextElementSibling.dataset.views;
                        this.openImage(this.activeBigImage.nextElementSibling.dataset.full_image_url);
                    } else {
                        this.openImage(this.settings.openedImageErr404);
                    }
                    this.activeBigImage = this.activeBigImage.nextElementSibling;
                }
            },

            /**
             * Открывает картинку.
             * @param {string} src Ссылка на картинку, которую надо открыть.
             */
            openImage(src) {
                // Получаем контейнер для открытой картинки, в нем находим тег img и ставим ему нужный src.
                this.getScreenContainer().querySelector(`.${this.settings.openedImageClass}`).src = src;
            },

            /**
             * Проверка наличия открываемого фала
             * @return {boolean} true - если файл существует, false - если файла не существует
             */
            imageExist(urlToFile) {
                let xhr = new XMLHttpRequest();
                xhr.open('HEAD', urlToFile, false);
                xhr.send();
                return xhr.status != "404";
            },

            /**
             * Возвращает контейнер для открытой картинки, либо создает такой контейнер, если его еще нет.
             * @returns {Element}
             */
            getScreenContainer() {
                // Получаем контейнер для открытой картинки.
                const galleryWrapperElement = document.querySelector(`.${this.settings.openedImageWrapperClass}`);
                // Если контейнер для открытой картинки существует - возвращаем его.
                if (galleryWrapperElement) {
                    return galleryWrapperElement;
                }

                // Возвращаем полученный из метода createScreenContainer контейнер.
                return this.createScreenContainer();
            },

            /**
             * Создает контейнер для открытой картинки.
             * @returns {HTMLElement}
             */
            createScreenContainer() {
                // Создаем сам контейнер-обертку и ставим ему класс.
                const galleryWrapperElement = document.createElement('div');
                galleryWrapperElement.classList.add(this.settings.openedImageWrapperClass);

                // Создаем контейнер занавеса, ставим ему класс и добавляем в контейнер-обертку.
                const galleryScreenElement = document.createElement('div');
                galleryScreenElement.classList.add(this.settings.openedImageScreenClass);
                galleryWrapperElement.appendChild(galleryScreenElement);

                // Создаем картинку для кнопки закрыть, ставим класс, src и добавляем ее в контейнер-обертку.
                const closeImageElement = new Image();
                closeImageElement.classList.add(this.settings.openedImageCloseBtnClass);
                closeImageElement.src = this.settings.openedImageCloseBtnSrc;
                closeImageElement.addEventListener('click', () => this.close());
                galleryWrapperElement.appendChild(closeImageElement);

                // Создаем картинку, которую хотим открыть, ставим класс и добавляем ее в контейнер-обертку.
                const image = new Image();
                image.classList.add(this.settings.openedImageClass);
                galleryWrapperElement.appendChild(image);

                //
                const imgViews = document.createElement('div');
                imgViews.classList.add(this.settings.viewsIconClass);
                imgViews.innerHTML = `<p><i class=\"fas fa-eye\"></i> ${this.views}</p>`;
                galleryWrapperElement.appendChild(imgViews);

                // Добавляем контейнер-обертку в тег body.
                document.body.appendChild(galleryWrapperElement);

                // Возвращаем добавленный в body элемент, наш контейнер-обертку.
                return galleryWrapperElement;
            },

            /**
             * Закрывает (удаляет) контейнер для открытой картинки.
             */
            close() {
                document.querySelector(`.${this.settings.openedImageWrapperClass}`).remove();
            }
        };

        // Инициализируем нашу галерею при загрузке страницы.
        window.onload = () => gallery.init({previewSelector: '.galleryPreviewsContainer'});

    </script>
</body>
</html>