# high frequency sql (advanced version) Leetcode

## 查詢




## 連接






## 聚合函數






## 排序和分組





## 高級查詢和連接





## 子查詢

### 1821. [寻找今年具有正收入的客户](https://leetcode.cn/problems/find-customers-with-positive-revenue-this-year/)

#### Question

表：`Customers`

```
+--------------+------+
| Column Name  | Type |
+--------------+------+
| customer_id  | int  |
| year         | int  |
| revenue      | int  |
+--------------+------+
(customer_id, year) 是该表的主键（具有唯一值的列的组合）。
这个表包含客户 ID 和不同年份的客户收入。
注意，这个收入可能是负数。
```

编写一个解决方案来报告 2021 年具有 **正收入** 的客户。

可以以 **任意顺序** 返回结果表。

结果格式如下示例所示。

**示例 1:**

<pre><strong>Input:</strong>
Customers
+-------------+------+---------+
| customer_id | year | revenue |
+-------------+------+---------+
| 1           | 2018 | 50      |
| 1           | 2021 | 30      |
| 1           | 2020 | 70      |
| 2           | 2021 | -50     |
| 3           | 2018 | 10      |
| 3           | 2016 | 50      |
| 4           | 2021 | 20      |
+-------------+------+---------+

<strong>Output:</strong>
+-------------+
| customer_id |
+-------------+
| 1           |
| 4           |
+-------------+
客户 1 在 2021 年的收入等于 30 。
客户 2 在 2021 年的收入等于 -50 。
客户 3 在 2021 年没有收入。
客户 4 在 2021 年的收入等于 20 。
因此，只有客户 1 和 4 在 2021 年有正收入。</pre>


#### Answer

```
SELECT
    customer_id
FROM
    Customers
WHERE
    year = '2021'
    AND revenue > 0
```


### 183. [从不订购的客户](https://leetcode.cn/problems/customers-who-never-order/)

#### Question

`Customers` 表：

```
+-------------+---------+
| Column Name | Type    |
+-------------+---------+
| id          | int     |
| name        | varchar |
+-------------+---------+
在 SQL 中，id 是该表的主键。
该表的每一行都表示客户的 ID 和名称。
```

`Orders` 表：

```
+-------------+------+
| Column Name | Type |
+-------------+------+
| id          | int  |
| customerId  | int  |
+-------------+------+
在 SQL 中，id 是该表的主键。
customerId 是 Customers 表中 ID 的外键( Pandas 中的连接键)。
该表的每一行都表示订单的 ID 和订购该订单的客户的 ID。
```

找出所有从不点任何东西的顾客。

以 **任意顺序** 返回结果表。

结果格式如下所示。

**示例 1：**

<pre><b>输入：</b>
Customers table:
+----+-------+
| id | name  |
+----+-------+
| 1  | Joe   |
| 2  | Henry |
| 3  | Sam   |
| 4  | Max   |
+----+-------+
Orders table:
+----+------------+
| id | customerId |
+----+------------+
| 1  | 3          |
| 2  | 1          |
+----+------------+
<b>输出：</b>
+-----------+
| Customers |
+-----------+
| Henry     |
| Max       |
+-----------+</pre>


#### Answer

```
SELECT
    name as 'Customers'
FROM
    Customers
WHERE
    id not in (SELECT customerId FROM Orders)
```


### 1873. [计算特殊奖金](https://leetcode.cn/problems/calculate-special-bonus/)

#### Question

表: `Employees`

```
+-------------+---------+
| 列名        | 类型     |
+-------------+---------+
| employee_id | int     |
| name        | varchar |
| salary      | int     |
+-------------+---------+
employee_id 是这个表的主键(具有唯一值的列)。
此表的每一行给出了雇员id ，名字和薪水。
```

编写解决方案，计算每个雇员的奖金。如果一个雇员的 id 是 **奇数** 并且他的名字不是以 `'M'`  **开头** ，那么他的奖金是他工资的 `100%` ，否则奖金为 `0` 。

返回的结果按照 `employee_id` 排序。

返回结果格式如下面的例子所示。

**示例 1:**

<pre><strong>输入：</strong>
Employees 表:
+-------------+---------+--------+
| employee_id | name    | salary |
+-------------+---------+--------+
| 2           | Meir    | 3000   |
| 3           | Michael | 3800   |
| 7           | Addilyn | 7400   |
| 8           | Juan    | 6100   |
| 9           | Kannon  | 7700   |
+-------------+---------+--------+
<strong>输出：</strong>
+-------------+-------+
| employee_id | bonus |
+-------------+-------+
| 2           | 0     |
| 3           | 0     |
| 7           | 7400  |
| 8           | 0     |
| 9           | 7700  |
+-------------+-------+
<strong>解释：</strong>
因为雇员id是偶数，所以雇员id 是2和8的两个雇员得到的奖金是0。
雇员id为3的因为他的名字以'M'开头，所以，奖金是0。
其他的雇员得到了百分之百的奖金。</pre>


#### Answer

```
SELECT
    employee_id,
    IF(mod(employee_id,2)=1 AND left(name, 1)!='M', salary,0) as 'bonus'
FROM
    Employees
ORDER BY employee_id
```


### 1398. [购买了产品 A 和产品 B 却没有购买产品 C 的顾客](https://leetcode.cn/problems/customers-who-bought-products-a-and-b-but-not-c/)

#### Question

`Customers` 表：

```
+---------------------+---------+
| Column Name         | Type    |
+---------------------+---------+
| customer_id         | int     |
| customer_name       | varchar |
+---------------------+---------+
customer_id 是这张表中具有唯一值的列。
customer_name 是顾客的名称。
```

`Orders` 表：

```
+---------------+---------+
| Column Name   | Type    |
+---------------+---------+
| order_id      | int     |
| customer_id   | int     |
| product_name  | varchar |
+---------------+---------+
order_id 是这张表中具有唯一值的列。
customer_id 是购买了名为 "product_name" 产品顾客的id。
```


#### Answer

```
SELECT
    customer_id,
    customer_name
FROM(
SELECT
    o.customer_id,
    c.customer_name,
    group_concat(distinct product_name order by product_name) as 'product'
FROM
    Orders o LEFT JOIN Customers c ON c.customer_id = o.customer_id
GROUP BY o.customer_id) r
WHERE 
    product LIKE '%A%'
    AND product LIKE '%B%'
    AND product not LIKE '%C%'
```






## 高級主題： 窗口函數和公共表表達式(CTE)
