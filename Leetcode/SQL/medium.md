# Leetcode Medium


## [177. 第N高的薪水](https://leetcode.cn/problems/nth-highest-salary/)


### QUESTION

表: `Employee`

```
+-------------+------+
| Column Name | Type |
+-------------+------+
| id          | int  |
| salary      | int  |
+-------------+------+
在 SQL 中，id 是该表的主键。
该表的每一行都包含有关员工工资的信息。
```

查询 `Employee` 表中第 `n` 高的工资。如果没有第 `n` 个最高工资，查询结果应该为 `null` 。

查询结果格式如下所示。

**示例 1:**

<pre><strong>输入:</strong> 
Employee table:
+----+--------+
| id | salary |
+----+--------+
| 1  | 100    |
| 2  | 200    |
| 3  | 300    |
+----+--------+
n = 2
<strong>输出:</strong> 
+------------------------+
| getNthHighestSalary(2) |
+------------------------+
| 200                    |
+------------------------+
</pre>

**示例 2:**

<pre><strong>输入:</strong> 
Employee 表:
+----+--------+
| id | salary |
+----+--------+
| 1  | 100    |
+----+--------+
n = 2
<strong>输出:</strong> 
+------------------------+
| getNthHighestSalary(2) |
+------------------------+
| null                   |
+------------------------+</pre>


### ANSWER



#### Method 1

通过窗口函数排序后 直接WHERE 排序 来指定第N高的薪水

```
CREATE FUNCTION getNthHighestSalary(N INT) RETURNS INT
BEGIN
RETURN (
      # Write your MySQL query statement below.
       IFNULL( #判断是否为NULL值
            (SELECT 
                DISTINCT salary #只返回一个值，因为只需要salary 同样排名的时候薪水一样
            FROM
                (SELECT
                    salary,
                    DENSE_RANK() OVER(ORDER BY salary desc) as rank_salary #使用DENSE_RANK() 不跳过且不断连的排序
                    FROM 
                        Employee) h 
            WHERE h.rank_salary = N)
        ,null)
  );
END
```


#### Method 2

通过LIMIT 指定 (N-1)开始取1位 -> LIMIT (N-1), 1 来获取第N高的薪水

```
CREATE FUNCTION getNthHighestSalary(N INT) RETURNS INT
BEGIN
declare m INT;
set m = N-1;
RETURN (
      # Write your MySQL query statement below.
       IFNULL(
            (SELECT 
                DISTINCT salary
            FROM
                Employee
            ORDER BY salary DESC
            LIMIT m,1)
        ,null)
  );
END
```
