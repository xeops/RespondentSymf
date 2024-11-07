***

# Вопросы к собеседованию

## Redis

### 1. FIFO (практика) 
Необходимо реализовать методы `addTask | getNextTask` у класса [TaskManager](src/Service/Redis/TaskManager.php)

Пример вызова

```php
$taskManager->addTask('doSmth');

$task = $taskManager->getNextTask();
```

### 2. Rate limit (практика)

Необходимо реализовать в контроллере [LimitedController::index](src/Controller/LimitedController.php)
   лимитирование вызова api `/api/limited`

Лимит распространяется на ВСЕ вызовы едино и не должен превышать более 100 обращений в сутки

### 3. Cache (практика)

Имеется [сервис кеширования](src/Service/User/UserInfoCache.php) имен пользователей.
Данный сервис позволяет записать имя в кеш по uid пользователя и так же его получить.
В неопределенный момент времени нам необходимо очистить кеш полностью. 
> Прим. кеш имен хранится в одной базе редиса с другими данными. База объемом больше 100ГБ

## База данных

В проекте есть 2 таблицы

- Products

| id | name   | code | description |
|----|--------|------|-------------|
| 1  | Apple  | 023  | Golden      |
| 2  | Apple  | 024  | Red wings   |
| 3  | Orange | 301  | Turkey      |

- Orders

| id | date       | customer_email | supplier_email |
|----|------------|----------------|----------------|
| 1  | 2024-01-01 | supplier1@me   | metroCC@org    |
| 2  | 2024-02-02 | supplier2@me   | ashan@org      |
| 3  | 2024-03-03 | supplier3@me   | lenta@org      |

### 1. Table chain (теория) 
Создать связь между таблицами, чтобы апи заказов могло вернуть следующий ответ

```json
{
	"orders": [
		{
			"id": 1,
			"date": "2024-01-01",
			"customer_email": "supplier1@me",
			"supplier_email": "metroCC@org",
			"products": [
				{
					"id": 1,
					"name": "Apple",
					"code": "023",
					"description": "Golden",
					"count": 2
				}
			]
		}
	]
}
```

### 2. Уникальность (теория)

    - Как базой данных гарантировать уникальность поля code для Product
    - Как базой данных гарантировать невозможность сделать покупателем заказ на одну и туже дату


### 3. Поиск (теория)
Создать поисковый индекс для запроса

```sql
select *
from orders
where customer_email = 'supplier1@me'
  and supplier_email = 'metroCC@org'
  
--  CREATE INDEX index_name ON table_name (column_name);
```

### 4. Чтение из индекса (теория)
Для запроса

```sql
select customer_email from orders where id = 1
```

сделать так, чтобы customer_email не читался путем сканирования таблицы.

### 5. Lost update (теория)
Предположим у нас есть таблица WareHouse

| id | area (зона) | productId | amount | 
|----|-------------|-----------|--------|
| 1  | Холодильное | 1         | 10     |
| 2  | Горячий цех | 2         | 30     |

В систему приходит 2 параллельных API запроса, 
которые генерируют следующую последовательность запросов

```sql
-- API-1. /api/warehouse/1/add-amount/30
SELECT * FROM warehouse WHERE id = 1;
-- API-2. /api/warehouse/1/add-amount/40
SELECT * FROM warehouse WHERE id = 1;
-- API-1. /api/warehouse/1/add-amount/30
UPDATE warehouse set amount = 40 where id = 1;
-- API-2. /api/warehouse/1/add-amount/40
UPDATE warehouse set amount = 50 where id = 1;
```
По итогу мы имеем

| id | area (зона) | productId | amount |
|----|-------------|-----------|--------|
| 1  | Холодильное | 1         | 50     |
| 2  | Горячий цех | 2         | 30     |

В чем ошибся разработчик данного апи и как это исправить?



## Symfony

### 1. Draw (практика) 
Имеется команда [app:shape:draw](src/Command/Shape/ShapeDrawCommand.php).
Необходимо реализовать код данной команды следующим образом

- необходимо отрисовать все фигуры
- классы фигур находятся в /src/Service/Shape
- классы имеют общий [интерфейс](src/Service/Shape/ShapeInterface.php)

Ограничения
- код должен быть переиспользуемым в других сервисах, командах, контроллерах
- нельзя использовать [Reflection](https://www.php.net/manual/en/book.reflection.php)
- нельзя использовать [Finder](https://symfony.com/doc/current/components/finder.html)



## PHP

### 1. yield (практика)
Имеется нерабочий код, исправьте ошибку
```php
class ProductCollection
{
    protected array $products = [...];
    
    public function getProducts() : array
    {
        foreach ($this->products as $productId => $product)
        {
             yield $productId => $product;  
        }
    }
}
```
### 2. finally (теория)
Какую последовательность чисел выведет следующий код?

```php
$products = SplFixedArray::fromArray([]);

try
{
    echo 1;
    $product = $products['032'];
}
catch (\RuntimeException $exception)
{
	echo 2;
}
catch (\Exception $exception)
{
	echo 3;
}
catch (\Throwable $exception)
{
	echo 4;
}
finally
{
	echo 5;
}
```
### 3. Clone (практика)
Имеется код
```php
class Calendar
{
    protected \DateTime $date;
   
    public function __construct(\DateTime $date) 
    {
        $this->date = $date;
    }
    
    public  function getDate(): DateTime
    {
        return $this->date;
    }
}

// temporary.php
$calendar = new Calendar(new DateTime('2024-01-01'));
$newCalendar = clone $calendar;

echo $newCalendar->getDate()->modify('+1 year')->format('Y');
echo $calendar->getDate()->format('Y');
```
Вопрос. Какие 2 года выведет скрипт `temporary.php` ?

Как сделать последовательность 2025 2024?

### 4. Parser (теория)

Имеется API -> https://excample.org/api/v1/get-product/{id}.
Данное апи возвращает 1 продукт по id 5 секунд ровно (время всегда фиксированное)

Задача: необходимо получить 100 продуктов за 30 секунд.
// Можем использовать Guzzle