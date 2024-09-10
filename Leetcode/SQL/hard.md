# Leetcode Hard

## 185. [部门工资前三高的所有员工](https://leetcode.cn/problems/department-top-three-salaries/)

### QUESTION

表: `Employee`

```
+--------------+---------+
| Column Name  | Type    |
+--------------+---------+
| id           | int     |
| name         | varchar |
| salary       | int     |
| departmentId | int     |
+--------------+---------+
id 是该表的主键列(具有唯一值的列)。
departmentId 是 Department 表中 ID 的外键（reference 列）。
该表的每一行都表示员工的ID、姓名和工资。它还包含了他们部门的ID。
```

表: `Department`

```
+-------------+---------+
| Column Name | Type    |
+-------------+---------+
| id          | int     |
| name        | varchar |
+-------------+---------+
id 是该表的主键列(具有唯一值的列)。
该表的每一行表示部门ID和部门名。
```

公司的主管们感兴趣的是公司每个部门中谁赚的钱最多。一个部门的 **高收入者** 是指一个员工的工资在该部门的 **不同** 工资中 **排名前三** 。

编写解决方案，找出每个部门中 **收入高的员工** 。

以 **任意顺序** 返回结果表。

返回结果格式如下所示。

**示例 1:**

<pre><strong>输入:</strong> 
Employee 表:
+----+-------+--------+--------------+
| id | name  | salary | departmentId |
+----+-------+--------+--------------+
| 1  | Joe   | 85000  | 1            |
| 2  | Henry | 80000  | 2            |
| 3  | Sam   | 60000  | 2            |
| 4  | Max   | 90000  | 1            |
| 5  | Janet | 69000  | 1            |
| 6  | Randy | 85000  | 1            |
| 7  | Will  | 70000  | 1            |
+----+-------+--------+--------------+
Department  表:
+----+-------+
| id | name  |
+----+-------+
| 1  | IT    |
| 2  | Sales |
+----+-------+
<strong>输出:</strong> 
+------------+----------+--------+
| Department | Employee | Salary |
+------------+----------+--------+
| IT         | Max      | 90000  |
| IT         | Joe      | 85000  |
| IT         | Randy    | 85000  |
| IT         | Will     | 70000  |
| Sales      | Henry    | 80000  |
| Sales      | Sam      | 60000  |
+------------+----------+--------+
<strong>解释:
</strong>在IT部门:
- Max的工资最高
- 兰迪和乔都赚取第二高的独特的薪水
- 威尔的薪水是第三高的

在销售部:
- 亨利的工资最高
- 山姆的薪水第二高
- 没有第三高的工资，因为只有两名员工</pre>


### ANSWER

```
SELECT
    Department,
    Employee,
    salary
FROM(
    SELECT
        Department.name as 'Department',
        Employee.name as 'Employee',
        salary as 'Salary',
        DENSE_RANK() OVER(PARTITION BY employee.departmentId ORDER BY salary DESC) as 'rank' #在各個部門內進行排序
    FROM
        Employee
    LEFT JOIN Department ON Department.id = Employee.departmentId) as a
WHERE
    a.rank <=3
```


#### Explain

Using DENSE_RANK() windows function to sort the salary of the employee in eache Department:  partition by departmentId -> in each Department  ORDER BY salary -> sorting in salary









## 262. [行程和用户](https://leetcode.cn/problems/trips-and-users/)

### QUESTION

表：`Trips`

```
+-------------+----------+
| Column Name | Type     |
+-------------+----------+
| id          | int      |
| client_id   | int      |
| driver_id   | int      |
| city_id     | int      |
| status      | enum     |
| request_at  | varchar  |   
+-------------+----------+
id 是这张表的主键（具有唯一值的列）。
这张表中存所有出租车的行程信息。每段行程有唯一 id ，其中 client_id 和 driver_id 是 Users 表中 users_id 的外键。
status 是一个表示行程状态的枚举类型，枚举成员为(‘completed’, ‘cancelled_by_driver’, ‘cancelled_by_client’) 。
```

表：`Users`

```
+-------------+----------+
| Column Name | Type     |
+-------------+----------+
| users_id    | int      |
| banned      | enum     |
| role        | enum     |
+-------------+----------+
users_id 是这张表的主键（具有唯一值的列）。
这张表中存所有用户，每个用户都有一个唯一的 users_id ，role 是一个表示用户身份的枚举类型，枚举成员为 (‘client’, ‘driver’, ‘partner’) 。
banned 是一个表示用户是否被禁止的枚举类型，枚举成员为 (‘Yes’, ‘No’) 。
```

**取消率** 的计算方式如下：(被司机或乘客取消的非禁止用户生成的订单数量) / (非禁止用户生成的订单总数)。

编写解决方案找出 `"2013-10-01"` 至 `"2013-10-03"` 期间非禁止用户（ **乘客和司机都必须未被禁止** ）的取消率。非禁止用户即 banned 为 No 的用户，禁止用户即 banned 为 Yes 的用户。其中取消率 `Cancellation Rate` 需要四舍五入保留 **两位小数** 。

返回结果表中的数据 **无顺序要求** 。

结果格式如下例所示。

**示例 1：**

<pre><strong>输入：</strong> 
Trips 表：
+----+-----------+-----------+---------+---------------------+------------+
| id | client_id | driver_id | city_id | status              | request_at |
+----+-----------+-----------+---------+---------------------+------------+
| 1  | 1         | 10        | 1       | completed           | 2013-10-01 |
| 2  | 2         | 11        | 1       | cancelled_by_driver | 2013-10-01 |
| 3  | 3         | 12        | 6       | completed           | 2013-10-01 |
| 4  | 4         | 13        | 6       | cancelled_by_client | 2013-10-01 |
| 5  | 1         | 10        | 1       | completed           | 2013-10-02 |
| 6  | 2         | 11        | 6       | completed           | 2013-10-02 |
| 7  | 3         | 12        | 6       | completed           | 2013-10-02 |
| 8  | 2         | 12        | 12      | completed           | 2013-10-03 |
| 9  | 3         | 10        | 12      | completed           | 2013-10-03 |
| 10 | 4         | 13        | 12      | cancelled_by_driver | 2013-10-03 |
+----+-----------+-----------+---------+---------------------+------------+
Users 表：
+----------+--------+--------+
| users_id | banned | role   |
+----------+--------+--------+
| 1        | No     | client |
| 2        | Yes    | client |
| 3        | No     | client |
| 4        | No     | client |
| 10       | No     | driver |
| 11       | No     | driver |
| 12       | No     | driver |
| 13       | No     | driver |
+----------+--------+--------+
<strong>输出：</strong>
+------------+-------------------+
| Day        | Cancellation Rate |
+------------+-------------------+
| 2013-10-01 | 0.33              |
| 2013-10-02 | 0.00              |
| 2013-10-03 | 0.50              |
+------------+-------------------+
<strong>解释：</strong>
2013-10-01：
  - 共有 4 条请求，其中 2 条取消。
  - 然而，id=2 的请求是由禁止用户（user_id=2）发出的，所以计算时应当忽略它。
  - 因此，总共有 3 条非禁止请求参与计算，其中 1 条取消。
  - 取消率为 (1 / 3) = 0.33
2013-10-02：
  - 共有 3 条请求，其中 0 条取消。
  - 然而，id=6 的请求是由禁止用户发出的，所以计算时应当忽略它。
  - 因此，总共有 2 条非禁止请求参与计算，其中 0 条取消。
  - 取消率为 (0 / 2) = 0.00
2013-10-03：
  - 共有 3 条请求，其中 1 条取消。
  - 然而，id=8 的请求是由禁止用户发出的，所以计算时应当忽略它。
  - 因此，总共有 2 条非禁止请求参与计算，其中 1 条取消。
  - 取消率为 (1 / 2) = 0.50</pre>

### ANSWER

```
SELECT
    total.Day,
    ifnull(ROUND(cancel/total,2),0) as 'Cancellation Rate'
FROM
    (SELECT
    request_at as 'Day',
    COUNT(id) as 'total'
FROM 
    Trips
WHERE
    driver_id IN (SELECT users_id FROM Users WHERE banned = 'No')
    AND client_id IN (SELECT users_id FROM Users WHERE banned = 'No')
GROUP BY Day ) total
LEFT JOIN 
    (SELECT
        request_at as 'Day',
        COUNT(id) as 'cancel'
    FROM
        Trips
    WHERE
        driver_id IN (SELECT users_id FROM Users WHERE banned = 'No')
        AND client_id IN (SELECT users_id FROM Users WHERE banned = 'No')
        AND status != 'completed'
    GROUP BY Day) cancel ON cancel.Day = total.Day
WHERE 
    total.Day BETWEEN '2013-10-01' AND '2013-10-03'
```

#### Explain

查詢所有的記錄

```
SELECT
    request_at as 'Day',
    COUNT(id) as 'total'
FROM 
    Trips
WHERE #有效用戶：客戶 + 司機
    driver_id IN (SELECT users_id FROM Users WHERE banned = 'No') 
    AND client_id IN (SELECT users_id FROM Users WHERE banned = 'No')
GROUP BY Day
```

查詢所有取消記錄

```
SELECT
    request_at as 'Day',
    COUNT(id) as 'cancel'
FROM
    Trips
WHERE
    driver_id IN (SELECT users_id FROM Users WHERE banned = 'No')
    AND client_id IN (SELECT users_id FROM Users WHERE banned = 'No')
    AND status != 'completed'
GROUP BY Day
```

LEFT JOIN 後cancel和total將在同一行記錄上 可以直接計算

### BETTER ANSWER

#### `IF()` 使用

`if()`函數可以用於判斷然後對結果進行改變 `IF( `

```
SELECT 
    request_at as 'Day',
    ROUND(COUNT(IF(status != 'completed',status,NULL))/COUNT(id),2) as 'Cancellation Rate'
FROM
    Trips
WHERE
    driver_id IN (SELECT users_id FROM Users WHERE banned = 'No') 
    AND client_id IN (SELECT users_id FROM Users WHERE banned = 'No')
    AND request_at BETWEEN '2013-10-01' AND '2013-10-03'
GROUP BY request_at
```


### 考點

IF() 函數判斷 IN()子查詢 ROUND(,2)保留2位小數





















```
SELECT

```
