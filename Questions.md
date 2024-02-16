***
# Вопросы к собеседованию

## Redis
1. FIFO 
2. rate limit
3. MGET \ pipe
4. ttl
3. Есть 2 команды
   + `\App\Command\Redis\Cache\GenerateRedisFixture`  генерирует 
   подобие кеша. 
   + `\App\Command\Redis\Cache\ClearRedisFixture` - команда для очистки кеша
    
    Необходимо написать функционал очистки кеша. Редактирование команды 
    `\App\Command\Redis\Cache\GenerateRedisFixture` разрешено

## База данных
1. Библиотека. Есть 2 сущности (`\App\Entity\Book`, `\App\Entity\User`).
Необходимо реализовать связь между двумя таблицами на примере реальной библиотеки
2. left join
3. cronss join
4. Составной первычный ключ
5. Покрвающий индекс
6. having


## Symfony
1. В команде `\App\Command\Shape\ShapeListCommand` вывести все классы
интерфейса `ShapeInterface`
2. EventDispatcher
3. Написать аннотацию для метода контроллера POST /api/user/1/addto/wishlist {book: 1}
## PHP
1. yield
2. try catch finnaly
3. Возврат по ссылке
4. copy on write
5. traits
6. Реализовать метод `draw` интерфейса `ShapeInterface` в любом классе
реализации
7. Исправить команду `\App\Command\Php\DrawWeekCommand` которая выдает в 
последнем выводе неправильную дату.
8. SOLID
