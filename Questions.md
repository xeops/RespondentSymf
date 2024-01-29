***
# Вопросы к собеседованию

## Redis
1. Используя Redis запретить выполнение команды `\App\Command\Redis\Lock\LockCommand`
в нескольких потоках (mutex)
2. Есть 2 команды
   + `\App\Command\Redis\Cache\GenerateRedisFixture`  генерирует 
   подобие кеша. 
   + `\App\Command\Redis\Cache\ClearRedisFixture` - команда для очистки кеша
    
    Необходимо написать функционал очистки кеша. Редактирование команды 
    `\App\Command\Redis\Cache\GenerateRedisFixture` разрешено

## База данных
1. Библиотека. Есть 2 сущности (`\App\Entity\Book`, `\App\Entity\User`).
Необходимо реализовать связь между двумя таблицами на примере реальной библиотеки
2. Добавьте индекс для запроса в методе `\App\Repository\BookRepository::findByAuthorInGenre`
3. Исправьте команду `\App\Command\DataBase\IsolationsCommand`, чтобы запуск
команды в двух потоках не видели сущности друг друга.

## PHP
1. В команде `\App\Command\Shape\ShapeListCommand` вывести все классы
интерфейса `ShapeInterface`
2. Реализовать метод `draw` интерфейса `ShapeInterface` в любом классе
реализации
3. Исправить команду `\App\Command\Php\DrawWeekCommand` которая выдает в 
последнем выводе неправильную дату.