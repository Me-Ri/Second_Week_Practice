**Команда**
=====================================
* Евдакимов Егор
* Плотников Михаил
* Братченко Александр
* Муслиев Аюб

**Используемые технологии**
=====================================
* `HTML`: Язык разметки, который используется для создания структуры веб-страницы и определения содержимого на ней.
* `CSS`: Каскадные таблицы стилей позволяют задавать внешний вид веб-страницы, включая оформление текста, цвета, расположение элементов и многое другое.
* `PHP` - 8.0.30: Серверный язык программирования, используется для создания динамических веб-страниц и взаимодействия с базами данных.
* `MySQL` - 8.0.30: Реляционная система управления базами данных, которая обеспечивает хранение данных, быстрый доступ к ним и мощные возможности для работы с базами данных.
* `Python` - 3.10.0: Универсальный язык программирования, используется для создания генерации документа по предварительному шаблону.

**Структура проекта**
=====================================
<pre>
├── MySQL/                                          
    └── second_week.sql                             # База данных для проекта
├── back/                                           # Папка с основными .php файлами для бэка (crud, регистрация/авторизация, подключения к БД и облегчения работы с сессиями)
    ├── crud/                                       # Папка с основными файлами обеспечивающими работу crud на разных страницах
        ├── PracticeUp.php                          # Обработчик для изменения данных о практике
        ├── addPracticeManager.php                  # Обработчик формы для создания руководителя практики
        ├── addStudent.php                          # Обработчик формы для добавления студента в группу
        ├── agreeRef.php                            # Обработчик для подтверждения справки для студента
        ├── cancelRef.php                           # Обработчик для отмены отправки справки для студента
        ├── createGroup.php                         # Обработчик для создания группы
        ├── createInstitute.php                     # Обработчик для создания института
        ├── createOPOP.php                          # Обработчик для создания руководителя ОПОП
        ├── createPractice.php                      # Обработчик для создания новой практики
        ├── deleteGroup.php                         # Обработчик для удаление группы
        ├── deleteInstitute.php                     # Обработчик для удаления Института
        ├── deleteOPOP.php                          # Обработчик для удаления руководителя ОПОП
        ├── deletePracticeManager.php               # Обработчик для удаления руководителя практики
        ├── deleteStudent.php                       # Оббработчик дял удаления студента из группы
        ├── fillRef.php                             # Обработчик для создания предварительного дневника практики для студента
        ├── groupUp.php                             # Обработчик для обновления данных о группе
        ├── requestRef.php                          # Обработчик для загрузки файла и изменения статуса заявления в БД
        ├── test.php                                # Обработчик для создания учетной записи администратора (не вызывается напрямую)
        ├── updateReq.php                           # Обработчик для передачи заявления с ОПОП -> руководитель практик и сменой состояния заявления в БД
        └── upRef.php                               # Обработчик для обновления данных студента которые заполняет руководитель практики
    ├── sign_login/                                 # Папка содержащая в себе основные файлы для регистрации/авторизации, редиректа и выход из системы
        ├── login.php                               # Обработчик авторизации на сайте
        ├── logout.php                              # Обработчик выхода из профиля
        ├── redirect.php                            # Скрипт являющийся частью механизма аутентификации и авторизации пользователей в системе
        └── register.php                            # Обработчик регистрации на сайте (не используется)
    ├── connect.php                                 # Файл для подключения к БД
    ├── helpers.php                                 # Файл позволяющий облегчить работу с сессиями
    └── issues.csv                                  # Таблица в формате .csv содержащая в себе задачи команды
├── front/                                          # Папка с основными .php файлами для фронта
    ├── assets/                                     # Папка содержащая стили и изображения
        ├── css/                                    # Основные стили для страниц
        └── img/                                    # Изображение для карточки студента
            └── photo-profile.jpg                   # Фото профиля на карточке студента
    ├── OPOP-fill.php                               # Страница для заполнения данных о практике
    ├── OPOP-refill.php                             # Страница для изменения данных о практике
    ├── admin.php                                   # Страница администратора где можно создать руководителя ОПОП и институт
    ├── createInstitute.php                         # Страница для создания института
    ├── create_OPOP.php                             # Страница для создания руководителя ОПОП
    ├── field-create.php                            # Страница для создания руководителя практики
    ├── group-create.php                            # Страница где можно создать группу, добавить в нее студента и удалить группу
    ├── group-fill.php                              # Страница для создания группы
    ├── groupRe.php                                 # Страница где можно изменить данные о группе
    ├── login.php                                   # Страница для авторизации
    ├── manager-create.php                          # Страница где можно создать и удалить руководителя
    ├── manager_OPOP.php                            # Страница где можно отправить руководителю практики заявление студента, создать и изменить практику, утвердить/отменить/проверить готовую справку перед отправкой студенту
    ├── manager_practice.php                        # Страница где руководитель практики может выбрать студента для заполнения данных о практике
    ├── reference_manager_practice.php              # Страница где руководитель практики заполняет данные о студенте на практике
    ├── reference_manager_practiceRe.php            # Страница где руководитель практики изменяет данные о студенте на практике
    ├── student-fill.php                            # Страница где можно добавить студента введя его данные
    └── student.php                                 # Страница с основной информацией стедента
└── python/                                         # Папка содержащая .php файлы для подготовки данных для создания документов и .py файлы для генерации, также 2 образца документов.
    ├── doc-1.py                                    # Файл для генерации отчета по практике для студента
    ├── doc-2.php                                   # Файл для подготовки данных для генератора
    ├── doc-2.py                                    # Файл для генерации отчета о прохождении практики
    ├── doc1.php                                    # Файл для подготовки данных для генератора
    ├── образец документа 2.docx                    # Образец документа для генерации отчета о прохождении практики
    └── образец документа.docx                      # Образец документа для генерации отчета по практике для студента
</pre>

**Установка и развертывание проекта**
=====================================
1. Установка Python.<br> Скачайте Python 3.10 c [официального сайта](https://www.python.org/downloads/release/python-3100/)
2. Установка нужных расширений на Python.<br> Откройте cmd и выполните следующие команды по очереди: <br>
```
python -m pip install --upgrade pip
pio install docx
pip install docxtpl
```
3. Установка локального сервера.<br> Скачайте и установите XAMPP с [официального сайта](https://www.apachefriends.org/ru/download.html).
4. Импортирование базы данных проекта.<br>
Используя phpMyAdmin содайте базу данных second_week и импортируйте в неё файл second_week.sql из папки MySQL.
5. Клонирование репозитория.<br> Клонируйте репозиторий в папку C:\xampp\htdocs: <br>
```
https://github.com/Me-Ri/Second_Week_Practice.git
```
7.  Запуск проекта.<br>
Запустите проект, используя панель XAMPP Control Panel и перейдя по адресу:<br>
```
http://localhost/Second_Week_Practice/front/login.php
```
