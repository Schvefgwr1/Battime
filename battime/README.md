# BATTIME Backend API

## Описание проекта

**BATTIME** - это современная система для поиска и оценки заведений (кафе, рестораны, бары) с интерактивной картой и системой фильтрации. Проект предоставляет API для мобильного приложения с возможностью поиска заведений по различным критериям, просмотра информации о загруженности в реальном времени и взаимодействия с заведениями через систему лайков.

## Основные возможности

### 👥 Пользователи (Users)
- **Регистрация и авторизация** через SMS с кодом подтверждения
- **Профиль пользователя** с возможностью загрузки фото
- **Поиск заведений** на интерактивной карте
- **Система лайков** для понравившихся заведений
- **Фильтрация заведений** по множеству критериев

### 🏪 Заведения (Establishments)
- **Подробная информация** о заведении (название, адрес, координаты)
- **Уровень загруженности** в реальном времени
- **Фотогалерея меню** с возможностью просмотра
- **Контактная информация** (email, социальные сети)
- **Система фильтров** (музыка, дизайн, напитки, уровень шума)
- **Эмодзи-маркеры** на карте для визуализации

### 🛠️ Административная панель
- **Админы заведений**: управление информацией о своих заведениях
- **Суперадминистраторы**: полное управление системой с двухфакторной авторизацией
- **Создание и редактирование** заведений
- **Управление фильтрами** и категориями

### 🔍 Система фильтрации
- **Музыкальные жанры**: рок, поп, джаз, хип-хоп, техно и др.
- **Дизайн заведения**: современный, классический, лофт и др.
- **Напитки**: кофе, коктейли, крафтовое пиво и др.
- **Уровень шума**: тихий, умеренный, шумный
- **Поиск по радиусу** от текущего местоположения

## Технологический стек

### Backend
- **PHP 8.0+** - основной язык программирования
- **Laravel 9** - PHP фреймворк
- **Laravel Sanctum** - API аутентификация
- **MySQL** - база данных
- **Swagger/OpenAPI** - документация API

### Внешние сервисы
- **Twilio SDK** - отправка SMS
- **FTP/SFTP** - загрузка файлов
- **L5-Swagger** - генерация API документации


## API Документация

### Swagger UI
API документация доступна по адресу: `http://your-domain.com/api/documentation`

### Основные эндпоинты

#### Авторизация пользователей
- `POST /api/userauth` - Отправка SMS кода
- `POST /api/usercheck` - Проверка SMS кода и авторизация

#### Заведения
- `GET /api/establishment_emoji_point` - Получение точек заведений для карты
- `GET /api/establishment_card` - Детальная информация о заведении
- `POST /api/establishment_filters` - Фильтрация заведений
- `GET /api/get_filters` - Получение списка фильтров

#### Лайки
- `POST /api/establishments/{id}/like` - Лайк/дизлайк заведения
- `POST /api/establishments/liked` - Список понравившихся заведений

#### Профиль пользователя
- `GET /api/get_profile` - Получение профиля
- `POST /api/update_profile` - Обновление профиля

#### Администрирование
- `POST /api/superadmin/login` - Авторизация суперадмина
- `POST /api/superadmin/create_establishments` - Создание заведения
- `GET /api/superadmin/get_establishments` - Список всех заведений

## Структура базы данных

### Основные таблицы

#### `users` - Пользователи
- Хранит информацию о пользователях приложения
- Поля: id, name, email, phone, profile_image

#### `establishments` - Заведения
- Основная информация о заведениях
- Поля: id, name, address, latitude, longitude, workload_parameter, likes

#### `registered_establishments` - Зарегистрированные заведения
- Расширенная информация о заведениях
- Поля: description, menu_photos, contact_info

#### `filters` & `filters_category` - Фильтры
- Система фильтрации заведений
- Связь many-to-many с заведениями

#### `likes` - Лайки
- Связь пользователей с понравившимися заведениями

#### `admin_establishments` - Администраторы заведений
- Учетные записи администраторов заведений

#### `super_admins` - Суперадминистраторы
- Учетные записи суперадминистраторов системы

## Безопасность

### Аутентификация
- **Laravel Sanctum** для API токенов
- **SMS верификация** для пользователей
- **Двухфакторная авторизация** для суперадминов
- **Хеширование паролей** с использованием bcrypt

### Валидация
- Валидация всех входящих запросов
- Проверка типов файлов при загрузке
- Ограничения на размер файлов
- CORS настройки для безопасности