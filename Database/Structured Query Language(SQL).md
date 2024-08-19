# Structured Query Language(SQL)

# Principal

結構化查詢語言 → 用於與關係數據庫系統交互的計算機語言。

## **characteristics**

- SQL is a non-procedural language.是一种非过程化语言。
- We can without difficulty create and replace databases in SQL. It isn’t a time-consuming process.可以轻松地用 SQL 创建和替换数据库。这不是一个耗时的过程。
- SQL is primarily based totally on **ANSI** standards.主要完全基于 ANSI 标准。
- SQL does now no longer have a continuation individual.现在不再有延续个体。
- SQL is entered into the SQL buffer on one or more lines.在一行或多行上输入 SQL 缓冲区。
- SQL makes use of a termination individual to execute instructions immediately. It makes use of features to carry out a few formatting.使用终止符来立即执行指令。它利用功能来执行一些格式化。
- It uses functions to perform some formatting.使用函数来执行一些格式化。

### **Parser 解析器**

The parser begins by replacing some of the words in the SQL statement with unique symbols, a process known as tokenization. 用唯一符号替换 SQL 语句中的一些单词  → 標記化

必須是分號;結尾 否則會報錯

### **Relational Engine 關係引擎**

query processor 查詢處理器

develops a strategy for efficiently retrieving, writing, or updating relevant data.开发一种有效检索、写入或更新相关数据的策略

Byte code, an intermediate-level representation of the SQL statement, is used to write the plan 字节码是 SQL 语句的中间级表示，用于编写计划   關係數據庫使用字節代碼

### **Storage Engine 存储引擎**

The software element that interprets the byte code and executes the intended SQL statement is known as the *storage engine*, also known as the *database engine*. The data in the database files on the physical disc storage is read and stored. 解释字节码并执行预期 SQL 语句的软件元素称为存储引擎，也称为**数据库引擎**。 The data in the database files on the physical disc storage is read and stored.  读取并存储物理磁盘存储上的数据库文件中的数据。  存儲引擎在完成後將結果傳遞給請求應用程序

## SQL Rules:

- A ‘;’ is used to end SQL statements.  “;”用于结束SQL语句。
- *Statements* may be split across lines, but *keywords* may not.  语句可以跨行分割，但关键字则不能。
- Identifiers, operator names, and literals are separated by one or more spaces or other delimiters.  标识符、运算符名称和文字由一个或多个空格或其他分隔符分隔。
- A comma (,) separates parameters without a clause.  不带子句的参数之间用逗号 (,) 分隔。
- A space separates a clause.  一个空格分隔子句。
- Reserved words cannot be used as identifiers unless enclosed with double quotes.  保留字不能用作标识符，除非用双引号引起来。
- Identifiers can contain up to 30 characters. 标识符最多可以包含 30 个字符。
- Identifiers must start with an alphabetic character. 标识符必须以字母字符开头。
- Characters and date literals must be enclosed within single quotes. 字符和日期文字必须用单引号引起来。
- Numeric literals can be represented by simple values. 数字文字可以用简单的值表示。
- Comments may be enclosed between /* and */ symbols and maybe multi-line.  注释可以包含在 /* 和 */ 符号之间，并且可以是多行。

![1724086072031](image/StructuredQueryLanguage(SQL)/1724086072031.png)

### DDL: **Data Definition Language**

SQL commands used to create the database structure are known as data definition language (DDL).

| Command  命令 | Description 描述                                                                                                                           | Syntax                                                                        |
| --------------- | ------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------- |
| CREATE          | Creates a new table, a view of a table, or other object in the database.在数据库中创建新表、表视图或其他对象。                              | CREATE TABLE [table_name]([column1] [data_type], [column2] [data_type], ...); |
| ALTER           | Modifies an existing database object, such as a table修改现有数据库对象，例如表                                                             | ALTER TABLE [table_name] ADD COLUMN column_name data_type;                    |
| DROP            | Deletes an entire table, a view of a table, or other objects in the database删除整个表、表的视图或数据库中的其他对象                        | DROP TABLE [table_name];                                                      |
| TRUNCATE        | Remove all records from a table, including all spaces allocated for the records are removed从表中删除所有记录，包括删除为记录分配的所有空间 | TRUNCATE TABLE [table_name];                                                  |
| COMMENT         | Add comments to the data dictionary向数据字典添加注释                                                                                       | COMMENT 'comment_text' ON TABLE [table_name];                                 |
| RENAME          | Rename an object existing in the database重命名数据库中现有的对象                                                                           | RENAME TABLE [old_table_name] TO [new_table_name];                            |

### DML: **Data Manipulation Language**

A relational database can be updated with new data using data manipulation language (DML) statements.

| Command                | Description                                                                      | Syntax                                                                                 |
| ---------------------- | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- |
| SELECT                 | Retrieves certain records from one or more tables.从一个或多个表中检索某些记录。 | SELECT [column1], [column2],… FROM [table name] …;                                   |
| INSERT                 | Creates a record. 创建一个记录。                                                | INSERT INTO [table_name] ([column1], [column2], ...) VALUES ([value1], [value2], ...); |
| UPDATE                 | Modifies records. 修改记录。                                                    | UPDATE [table_name] SET [column1] = [value1], [column2] = [value2] [WHERE condition];  |
| DELETE                 | Deletes records. 删除记录。                                                     | DELETE FROM [table_name] WHERE condition;                                              |
| LOCK                   | Table control concurrency 表控制并发                                             | LOCK TABLE [table_name] IN lock_mode;                                                  |
| CALL                   | Call a PL/SQL or JAVA subprogram调用 PL/SQL 或 JAVA 子程序                       | CALL procedure_name(arguments);                                                        |
| EXPLAIN PLAN 解释计划 | Describe the access path to data描述数据的访问路径                               | EXPLAIN PLAN FOR SELECT * FROM table_name;                                             |

刪除記錄需要謹慎

### DQL: **Data Query Language**

用于访问关系数据库。软件程序使用 SELECT 命令来过滤并返回 SQL 表中的特定结果。

### DCL: **Data Control language**

Data control language (DCL) is a programming language used by database administrators to control or grant other users access to databases.

| Command 命令 | Description 描述                                              | Syntax                                                                                                     |
| ------------- | -------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------- |
| GRANT         | Gives a privilege to the user.赋予用户特权。                   | GRANT privilege_type [(column_list)] ON [object_type] object_name TO user [WITH GRANT OPTION];             |
| REVOKE        | Takes back privileges granted by the user.收回用户授予的权限。 | REVOKE [GRANT OPTION FOR] privilege_type [(column_list)] ON [object_type] object_name FROM user [CASCADE]; |

SQL 是一種客戶端/服務器語言。 個人計算機程序使用SQL通過網絡與保存共享事實的數據庫服務器進行通信。

 SQL is Internet facts access language.

 SQL is a distributed database language.Distributed database control structures use SQL to assist distribute facts throughout many linked pc structures. The DBMS software program on every gadget makes use of SQL to speak with the opposite structures, sending requests for facts to get entry to. 分布式数据库控制结构使用 SQL 来帮助在多个链接的计算机结构中分发事实。每个设备上的 DBMS 软件都使用 SQL 与相反的结构进行通信，发送对要访问的数据的请求。

## SQL Injection： 防註入

## SQL vs NO SQL vs NEW SQL

| FEATURES                               | SQL                                                                                   | NO SQL 没有SQL                                                                 | NEW SQL 新的SQL                                                                          |
| -------------------------------------- | ------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------- |
| Schema 模式                           | It is schema-fix. 这是架构修复。                                                     | It is schema-free. 它是无模式的。                                              | It is both schema-fix and schema-free.它既是模式修复的又是无模式的。                      |
| Base Properties/Theorem 基本性质/定理 | It strictly follows ACID properties.它严格遵循 ACID 属性。                            | It follows the CAP theorem.它遵循 CAP 定理。                                    | It takes care of ACID properties.它负责 ACID 属性。                                       |
| Security 安全                         | It is secure. 这是安全的。                                                           | It is less secure. 它不太安全。                                                | It is moderately secure. 它是中等安全的。                                                |
| Databases 数据库                      | No distributed database. 没有分布式数据库。                                          | Distributed database. 分布式数据库。                                           | Distributed database. 分布式数据库。                                                     |
| Query Language 查询语言               | It supports SQL as a query language.它支持 SQL 作为查询语言。                         | It does not support old SQL but supports UQL.它不支持旧的 SQL，但支持 UQL。     | It supports SQL with improved functions and features.它支持 SQL，并具有改进的功能和特性。 |
| Scalability 可扩展性                  | It is vertically scalable.它是垂直可扩展的。                                          | It is only vertically scalable. 它只能垂直扩展。                               | It is both vertically and horizontally scalable.它可以垂直和水平扩展。                    |
| Types of database 数据库类型          | Relational database. 关系数据库。                                                    | Non-relational database. 非关系数据库。                                        | Relational database but not purely.但不纯粹是关系数据库。                                 |
| Online processing 在线加工            | Online transaction processing but not full functionality.在线交易处理，但功能不完整。 | Online analytical processing.在线分析处理。                                     | Online transaction processing with full functionality.具有完整功能的在线交易处理。        |
| Query Handling 查询处理               | Simple queries can be handled.可以处理简单的查询。                                    | Complex queries can be directed better than SQL.复杂查询可以比 SQL 更好地定向。 | Highly efficient for complex queries.对于复杂的查询非常高效。                             |
| Example 例子                          | MySQL                                                                                 | MongoDB                                                                         | Cockroach DB                                                                              |

# Operation

## Data Type:

### • Numeric Datatypes 數字型數據類型

| Data Type  | From                                                                   | To                                                                       |
| ---------- | ---------------------------------------------------------------------- | ------------------------------------------------------------------------ |
| BigInt     | -263 (-9,223,372,036,854,775,808)-2 63 (-9,223,372,036,854,775,808) | 263 -1 (9,223,372,036,854,775,807)2 63 -1 (9,223,372,036,854,775,807) |
| Int        | -231 (-2,147,483,648)-2 31 (-2,147,483,648)                         | 231-1 (2,147,483,647)2 31 -1 (2,147,483,647)                           |
| smallint   | -215 (-32,768)-2 15 (-32,768)                                       | 215-1 (32,767)2 15 -1 (32,767)                                         |
| tinyint    | 0                                                                      | 28-1 (255)2 8 -1 (255)                                                 |
| bit        | 0                                                                      | 1                                                                        |
| decimal    | -1038+1-10 38 +1                                                     | 1038-1                                                                   |
| numeric    | -1038+1-10 38 +1                                                     | 1038-1                                                                   |
| money      | -922,337,203,685,477.5808                                              | 922,337,203,685,477.5807                                                 |
| smallmoney | -214,748.3648                                                          | 214,748.3647                                                             |
| Float      | -1.79E+308                                                             | 1.79E+308                                                                |
| Real       | -3.40E+38                                                              | 3.40E+38                                                                 |

### • Date and Time Datatypes 日期和时间数据类型

| Data Type | Description                                                                                                        |
| --------- | ------------------------------------------------------------------------------------------------------------------ |
| DATE      | A data type is used to store the data of date in a record 数据类型用于在记录中存储日期数据                        |
| TIME      | A data type is used to store the data of time in a record数据类型用于在记录中存储时间数据                          |
| DATETIME  | A data type is used to store both the data,date, and time in the record.数据类型用于在记录中存储数据、日期和时间。 |
| TIMESTAMP | 詳細時間                                                                                                           |

### • String Datatypes 字符串数据类型

| Data Type      | Description                                                                                                                                                             |            |
| -------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------- |
| char           | The maximum length of 8000 characters.(Fixed-Length non-Unicode Characters)最大长度8000个字符。（固定长度非Unicode字符）                                                | MySQL      |
| varchar        | The maximum length of 8000 characters.(Variable-Length non-Unicode Characters)最大长度为 8000 个字符。（可变长度非 Unicode 字符）                                       | MySQL      |
| varchar(max)   | The maximum length of 231 characters(SQL Server 2005 only).(Variable Length non-Unicode data)最大长度为 231 个字符（仅限 SQL Server 2005）。（可变长度非 Unicode 数据） | MySQL      |
| text           | The maximum length of 2,127,483,647 characters(Variable Length non-Unicode data)最大长度 2,127,483,647 个字符（可变长度非 Unicode 数据）                                | MySQL, SQL |
| nchar          | The maximum length of 4000 characters(Fixed-Length Unicode Characters)最大长度 4000 个字符（固定长度 Unicode 字符）                                                     | MySQL      |
| Nvarchar       | The maximum length of 4000 characters.(Variable-Length Unicode Characters)最大长度为 4000 个字符。（可变长度 Unicode 字符）                                             | MySQL      |
| nvarchar(max)  | The maximum length of 231 characters(SQL Server 2005 only).(Variable Length Unicode data)最大长度为 231 个字符（仅限 SQL Server 2005）。（可变长度 Unicode 数据）       | MySQL      |
| Binary         | The maximum length of 8000 bytes(Fixed-Length binary data)最大长度8000字节（定长二进制数据）                                                                            | SQL        |
| varbinary      | The maximum length of 8000 bytes(Variable Length binary data)最大长度8000字节（可变长度二进制数据）                                                                     | SQL        |
| varbinary(max) | The maximum length of 231 bytes(SQL Server 2005 only).(Variable Length binary data)最大长度为231字节（仅限SQL Server 2005）。（可变长度二进制数据）                     | SQL        |

### •  Other Data Types

| DataType                                                                       | Description                                                                                                                                                               |
| ------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| XML Datatype                                                                   | A Datatype used to store data in the format of XML datatypeDatatype 用于以 XML 数据类型格式存储数据 (在SQL server)                                                        |
| Geometry (Spatial Dataype)                                                     | A datatype is used for storing planar spatial data, such as points, lines, and polygons, in a database table.数据类型用于在数据库表中存储平面空间数据，例如点、线和多边形                                             
| Array Datatype                                                                 | SQL Server does not have a built-in array datatype. But some new database have eg. MySQL MariaDB (This two need to defined in JSON ) PostgreSQL                           |
| Interval data types 區間數據                                                   | These are used to store intervals of time. Examples include INTERVAL YEAR, INTERVAL MONTH, and INTERVAL DAY. 这些用于存储时间间隔。示例包括 INTERVAL YEAR、INTERVAL MONTH 和 INTERVAL DAY。
| Boolean data type                                                              | This data type is used to store logical values. The only possible values are TRUE and FALSE. 该数据类型用于存储逻辑值。唯一可能的值为 TRUE 和 FALSE。 
| Binary data types 二进制数据类型                                              | These are used to store binary data, such as images or audio files. Examples include BLOB and BYTEA. 它们用于存储二进制数据，例如图像或音频文件。示例包括 BLOB 和 BYTEA。  

## Operator: 运算符

### **1. Arithmetic Operators算术运算符**

perform mathematical operations on numeric values in queries 在查詢中進行數學運算

| Operator             | Description                                                                                                                          |
| -------------------- | ------------------------------------------------------------------------------------------------------------------------------------ |
| +                    | The addition is used to perform an addition operation on the data values.加法用于对数据值执行加法运算。                              |
| –                   | This operator is used for the subtraction of the data values.该运算符用于数据值的减法。                                              |
| /                    | This operator works with the ‘ALL’ keyword and it calculates division operations.该运算符与“ALL”关键字一起使用，并计算除法运算。 |
| *                    | This operator is used for multiplying data values.该运算符用于将数据值相乘。                                                         |
| %                    | Modulus is used to get the remainder when data is divided by another.模数用于获取数据除以另一个数据时的余数。 同時還可以代替字符串

### 2. **Comparison Operators 比较运算符**

| Operator | Description            |
| -------- | ---------------------- |
| =        | Equal to.              |
| >        | Greater than.          |
| <        | Less than.             |
| >= >=   | Greater than equal to. |
| <= <=   | Less than equal to.    |
| <> <>   | Not equal to.          |

### **3. Logical Operators**

combine or manipulate conditions in SQL queries to retrieve or manipulate data based on specified criteria..

| Operator | Description                                                                                                                                                                           |
| -------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| AND      | Logical AND compares two Booleans as expressions and returns true when both expressions are true.逻辑 AND 将两个布尔值作为表达式进行比较，并在两个表达式都为 true 时返回 true。       |
| OR       | Logical OR compares two Booleans as expressions and returns true when one of the expressions is true.逻辑或将两个布尔值作为表达式进行比较，并在其中一个表达式为 true 时返回 true。    |
| NOT      | Not takes a single Boolean as an argument and change its value from false to true or from true to false.Not 将单个布尔值作为参数并将其值从 false 更改为 true 或从 true 更改为 false。 |

### 4. **Bitwise Operators按位运算符**

perform bitwise operations on binary values in SQL queries, manipulating individual bits to perform logical operations at the bit level.在 SQL 查詢中對二進位數值執行位運算，操作個別位以執行位層級的邏輯運算。

| Operator | Description                                               |
| -------- | --------------------------------------------------------- |
| &        | Bitwise AND operator 按位与运算符                        |
| \|       | Bitwise OR operator 按位或运算符                          |
| ^        | Bitwise XOR (exclusive OR) operator按位 XOR（异或）运算符 |
| ~        | Bitwise NOT (complement) operator按位 NOT（求反）运算符   |
| << <    | Left shift operator 左移运算符                           |
| >> >>   | Right shift operator 右移运算符                          |

### 5. **Compound Operators复合运算符**

| Operator | Description                            |
| -------- | -------------------------------------- |
| +=       | Add and assign 添加和分配             |
| -=       | Subtract and assign 减法和赋值        |
| *=       | Multiply and assign 乘法和赋值        |
| /=       | Divide and assign 划分和分配          |
| %=       | Modulo and assign 取模并赋值          |
| &=       | Bitwise AND and assign 按位与并赋值   |
| ^=       | Bitwise XOR and assign 按位异或并赋值 |

### 6. **Special Operators**

進行一些特定操作，例如比較值，檢查是否存在以及根據特定條件過濾。

| Operators | Description                                                                                                                                                                                                                                                                                                                                                                                       |
| --------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| ALL       | ALL is used to select all records of a SELECT STATEMENT. It compares a value to every value in a list of results from a query. The ALL must be preceded by the comparison operators and evaluated to TRUE if the query returns no rows.ALL 用于选择 SELECT STATEMENT 的所有记录。它将一个值与查询结果列表中的每个值进行比较。 ALL 前面必须有比较运算符，如果查询未返回任何行，则计算结果为 TRUE。 |
| ANY       | ANY compares a value to each value in a list of results from a query and evaluates to true if the result of an inner query contains at least one row. ANY 将某个值与查询结果列表中的每个值进行比较，如果内部查询的结果至少包含一行，则计算结果为 true。                                                                                                                                           |
| between   | The SQL BETWEEN operator tests an expression against a range. The range consists of a beginning, followed by an AND keyword and an end expression.SQL BETWEEN 运算符根据范围测试表达式。该范围由开头、后跟 AND 关键字和结束表达式组成。                                                                                                                                                           |
| IN        | The IN operator checks a value within a set of values separated by commas and retrieves the rows from the table that match.IN 运算符检查由逗号分隔的一组值中的值，并从表中检索匹配的行。                                                                                                                                                                                                          |
| exists    | The EXISTS checks the existence of a result of a subquery. The EXISTS subquery tests whether a subquery fetches at least one row. When no data is returned then this operator returns ‘FALSE’.  EXISTS 检查子查询结果是否存在。 EXISTS 子查询测试子查询是否至少获取一行。如果没有返回数据，则该运算符返回“FALSE”。                                                                           |
| some      | SOME operator evaluates the condition between the outer and inner tables and evaluates to true if the final result returns any one row. If not, then it evaluates to false.SOME 运算符评估外表和内表之间的条件，如果最终结果返回任意一行，则评估结果为 true。如果不是，则评估结果为 false。                                                                                                       |
| UNIQUE    | The UNIQUE operator searches every unique row of a specified table.UNIQUE 运算符搜索指定表的每个唯一行。                                                                                                                                                                                                                                                                                          |

## [**Query**]()

SELECT 語句

## Operate Database

### **INSERT** INTO

add new rows to a table in a database

two primary syntaxes:

1. only values

   仅指定要插入的数据的值，而不指定列名

   ```sql
   INSERT INTO [table_name]
   VALUES (value1, value2, vlaue3,...),
   			 (value1, value2, vlaue3,...),
   			 ...
   			 (value1, value2, vlaue3,...);
   ```
2. Column names and values both

   将指定要填充的列及其相应的值

   ```sql
   #一一對應
   INSERT INTO [table_name] (column1, column2, column3,...) 
   VALUES (value1, value2, value3,...),
   			 (value1, value2, value3,...),
   			 (value1, value2, value3,...),
   			 ...
   			 (value1, value2, value3,...); 
   ```

選擇特定的數據插入形成新的表格

```sql
INSERT INTO [new_table_name] 
SELECT [*] 
FROM [second_table]
[WHERE condition];
```

未包含的列將填充默認值，通常為NULL

### UPDATE

```sql
UPDATE [table_name]
SET [column1] = value1, 
column2 = value2,… 
WHERE condition;
```

### DELETE

```sql
DELETE FROM table_name
WHERE some_condition;
```

> **注意：**我们可以根据 WHERE 子句中提供的条件删除单个或多个记录。如果我们省略 WHERE 子句，那么所有记录将被删除，表将为空

# Reference

[What is SQL?](https://www.geeksforgeeks.org/what-is-sql/?ref=roadmap)

[SQL Operators - GeeksforGeeks](https://www.geeksforgeeks.org/sql-operators/?ref=next_article)

[SQL vs NO SQL vs NEW SQL - GeeksforGeeks](https://www.geeksforgeeks.org/sql-vs-no-sql-vs-new-sql/?ref=next_article)

[SQL Commands: DDL, DQL, DML, DCL and TCL With Examples](https://www.geeksforgeeks.org/sql-ddl-dql-dml-dcl-tcl-commands/?ref=roadmap)

[SQL Commands: DDL, DQL, DML, DCL and TCL With Examples](https://www.geeksforgeeks.org/sql-ddl-dql-dml-dcl-tcl-commands/?ref=roadmap)

[SQL INSERT INTO Statement](https://www.geeksforgeeks.org/sql-insert-statement/?ref=roadmap)

[SQL INSERT INTO 语句 | 菜鸟教程](https://www.runoob.com/sql/sql-insert.html)
