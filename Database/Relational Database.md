# Relational Database

# RDBMS

为多用户设计的

*it is a subset of DBMS which involves insertion, retrieval, managing database by using relations or tables, tuples, key constraints.*

It also aids in the reduction of data redundancy and the preservation of database integrity.

![image.png](Relational%20Database%20f25d35d817a4424aad0bd0b92af5f808/image.png)

## Features of RDBMS

- Data must be stored in tabular form in DB file, that is, it should be organized in the form of rows and columns.  DB文件中的数据必须以行和列的形式组织。
- Each **row** of table is called [**record/tuple**](https://www.geeksforgeeks.org/tuple-in-dbms/) . Collection of such records is known as the ***cardinality*** of the table  表的每一行称为[**记录/元组**](https://www.geeksforgeeks.org/tuple-in-dbms/)。此类记录的集合称为表的基数  *以行為單位*
- Each **column** of the table is called an *attribute/field*. Collection of such columns is called the **arity** of the table.  表的每一列称为属性/字段。此类列的集合称为表的数量。
- **No two records of the DB table can be same**. Data duplicity is therefore avoided by using a candidate key. [**Candidate Key**](https://www.geeksforgeeks.org/candidate-key-in-dbms/) is a minimum set of attributes required to identify each record uniquely.  DB表中的两条记录不能相同。因此，通过使用候选键可以避免数据重复。[**候选键**](https://www.geeksforgeeks.org/candidate-key-in-dbms/)是唯一标识每条记录所需的最小属性集。
- Tables are related to each other with the help for foreign keys. 表借助外键相互关联。
- Database tables also allow NULL values, that is if the values of any of the element of the table are not filled or are missing, it becomes a NULL value, which is not equivalent to zero. (NOTE: [**Primary key**](https://www.geeksforgeeks.org/primary-key-in-dbms/) cannot have a NULL value).  数据库表还允许 NULL 值，即如果表的任何元素的值未填充或缺失，则该值将变为 NULL 值，该值不等于零。 （注意：[**主键**](https://www.geeksforgeeks.org/primary-key-in-dbms/)不能有 NULL 值）。

### Difference between **DBMS and RDBMS**

| DBMS | RDBMS |
| --- | --- |
| DBMS stores data as file.DBMS将数据存储为文件。 | RDBMS stores data in tabular form.RDBMS以表格形式存储数据。 |
| Data elements need to access individually.数据元素需要单独访问。 | Multiple data elements can be accessed at the same time.可以同时访问多个数据元素。 |
| No relationship between data.数据之间没有关系。 | Data is stored in the form of tables which are related to each other.数据以相互关联的表的形式存储。 |
| Normalization is not present.标准化不存在。 | Normalization is present.存在标准化。 |
| DBMS does not support distributed database.DBMS不支持分布式数据库。 | RDBMS supports distributed database. 支持分布式数据库。 |
| It stores data in either a navigational or hierarchical form.它以导航或分层形式存储数据。 | It uses a tabular structure where the headers are the column names, and the rows contain corresponding values.它使用表格结构，其中标题是列名称，行包含相应的值。 |
| It deals with small quantity of data.它处理少量数据。 | It deals with large amount of data.它处理大量数据。 |
| Data redundancy is common in this model.数据冗余在此模型中很常见。 | Keys and indexes do not allow Data redundancy.键和索引不允许数据冗余。 |
| It is used for small organization and deal with small data.它用于小型组织并处理小数据。 | It is used to handle large amount of data.它用于处理大量数据。 |
| Not all Codd rules are satisfied.并非所有 Codd 规则都得到满足。 | All 12 Codd rules are satisfied.所有 12 条 Codd 规则均得到满足。 |
| Security is less 安全性较低 | More security measures provided.提供更多安全措施。 |
| It supports single user. 它支持单用户。 | It supports multiple users.它支持多个用户。 |
| Data fetching is slower for the large amount of data.对于大量数据，数据获取速度较慢。 | Data fetching is fast because of relational approach.由于关系方法，数据获取速度很快。 |
| The data in a DBMS is subject to low security levels with regards to data manipulation.DBMS 中的数据在数据操作方面受到较低的安全级别的影响。 | There exists multiple levels of data security in a RDBMS.RDBMS 中存在多个级别的数据安全性。 |
| Low software and hardware necessities.软件和硬件要求低。 | Higher software and hardware necessities.对软硬件要求较高。 |
| Examples: XML, Window Registry, Forxpro, dbaseIIIplus etc.示例： XML 、Window 注册表、Forxpro、dbaseIIIplus 等。 | Examples: MySQL, PostgreSQL, SQL Server, Oracle, Microsoft Access etc.示例： MySQL 、 PostgreSQL 、 SQL Server、Oracle、Microsoft Access 等。 |

## **Architecture 架构**

![image.png](Relational%20Database%20f25d35d817a4424aad0bd0b92af5f808/image%201.png)

1. All data, data about data (metadata) and logs are stored in the Secondary Storage devices (SSD)
2. RDBMS has a compiler that converts the SQL commands to lower level language, processes it and stores it into the secondary storage device.
3. Job of Data Analyst is to use the Query Compiler and Query Optimizer (uses relational properties for executing queries) to manipulate the data in the database.数据分析师的工作是使用查询编译器和查询优化器（使用关系属性来执行查询）来操作数据库中的数据

### **Constraints 約束**

![image.png](Relational%20Database%20f25d35d817a4424aad0bd0b92af5f808/image%202.png)

## Types RDB

### 1. MySQL

- **简介**: MySQL 是最流行的开源关系型数据库之一，广泛应用于各种Web应用和企业系统。
- **特点**:
    - 支持 ACID 特性（原子性、一致性、隔离性、持久性）。
    - 提供多种存储引擎（如 InnoDB 和 MyISAM），InnoDB 支持事务处理。
    - 社区活跃，支持多种编程语言和平台。
- **应用场景**: Web应用、内容管理系统（如 WordPress、Drupal）、电子商务平台。

### 2. PostgreSQL

- **简介**: PostgreSQL 是一个功能强大且高度扩展的开源关系型数据库，支持高级 SQL 功能和扩展。
- **特点**:
    - 支持复杂查询、外键、触发器、视图、事务等高级数据库功能。
    - 支持 JSON 数据类型，适合处理非结构化数据。
    - 支持地理信息系统 (GIS) 扩展（PostGIS）。
- **应用场景**: 高度复杂的数据操作、地理信息系统、数据分析、企业级应用。

### 3. Oracle Database

- **简介**: Oracle Database 是由甲骨文公司开发的商业关系型数据库，广泛用于大型企业和关键任务系统。
- **特点**:
    - 强大的事务处理能力和高可用性，支持多版本并发控制 (MVCC)。
    - 支持分区、集群、备份和恢复、加密等企业级功能。
    - 提供全面的安全性和管理工具。
- **应用场景**: 大型企业资源计划 (ERP) 系统、银行和金融系统、数据仓库。

### 4. Microsoft SQL Server

- **简介**: Microsoft SQL Server 是微软开发的关系型数据库，主要用于 Windows 平台。
- **特点**:
    - 与微软的生态系统（如 .NET、Azure）集成良好。
    - 提供丰富的商业智能 (BI) 工具和分析功能，如 SQL Server Reporting Services (SSRS) 和 SQL Server Integration Services (SSIS)。
    - 支持事务处理、触发器、存储过程和视图。
- **应用场景**: 企业级应用、商业智能、数据分析、Web 和桌面应用。

### 5. SQLite

- **简介**: SQLite 是一个轻量级的嵌入式关系型数据库，广泛用于移动应用、嵌入式系统和浏览器中。
- **特点**:
    - 零配置，无需独立的服务器进程，数据存储在一个文件中。
    - 虽然轻量，但支持完整的 SQL 查询。
    - 开源，易于集成，具有小巧、快速的特点。
- **应用场景**: 移动应用（如 Android 和 iOS 应用）、嵌入式系统、轻量级 Web 应用。

### 6. MariaDB

- **简介**: MariaDB 是 MySQL 的一个开源分支，由 MySQL 的原始开发者创建，旨在保持对开源社区的支持。
- **特点**:
    - 完全兼容 MySQL，且不断加入新的功能和优化。
    - 支持多种存储引擎，如 Aria、TokuDB、MyRocks。
    - 提供更好的性能、可扩展性和高可用性选项。
- **应用场景**: 与 MySQL 类似的应用场景，但需要更多的开源支持或特定优化。

### 7. IBM Db2

- **简介**: IBM Db2 是 IBM 开发的关系型数据库，支持多种操作系统，主要用于企业级应用。
- **特点**:
    - 提供高度优化的性能，特别是在大型数据仓库环境中。
    - 支持高级 SQL 功能和数据分析功能。
    - 与 IBM 的其他软件（如 WebSphere、Cognos）集成良好。
- **应用场景**: 大型企业数据管理、商业智能、数据仓库、事务处理系统。

### 8. Amazon Aurora

- **简介**: Amazon Aurora 是由 AWS 提供的关系型数据库服务，兼容 MySQL 和 PostgreSQL。
- **特点**:
    - 提供高性能、自动扩展和高可用性，支持跨多个可用区的自动故障转移。
    - 完全托管的服务，减少了数据库管理的复杂性。
    - 与 AWS 生态系统集成良好，支持自动备份、监控和恢复。
- **应用场景**: 云原生应用、大规模 Web 应用、企业级应用。

## Operation

### Create database 创建数据库

```sql
CREATE DATABASE [Database name];
```

### Create table 创建数据表

```sql
CREATE TABLE `[table name]`(
	`ID` INT PRIMARY KEY,
	`Name` VARCHAR(50),
	`AGE` INT,
	`COURSE` VARCHAR(50),
	`[column name]` [value type[(length)]],
	...
)
```

### Insert data

```sql
INSERT INTO Students (ID, NAME, AGE, COURSE)
VALUES
    (1, 'MINAL', 22, 'COMPUTER SCIENCE'),
    (2, 'MRIDUL', 21, 'CIVIL'),
    (3, 'MARAM', 19, 'CHEMICAL'),
    (4, 'MOHAMMAD', 24, 'ELECTRICAL');
```

### Different Types of Database keys：

![image.png](Relational%20Database%20f25d35d817a4424aad0bd0b92af5f808/image%203.png)

- Candidate Key候选键
    
    the minimal set of attributes that can uniquely identify a tuple 可以唯一标识元组的最小属性集称为候选键
    
    - a minimal super key.这是一个最小的超级键。
    - it is a super key with no repeated data is called a candidate key它是一个没有重复数据的超级密钥，称为候选密钥。
    - The minimal set of attributes that can uniquely identify a record.
        
        可以唯一标识记录的最小属性集。
        
    - It must contain unique values(can be NULL values).它必须包含唯一的值（可以為NULL）
    - Every table must have at least a single candidate key.
        
        每个表必须至少有一个候选键。
        
    - 可以是復合的
- Primary Key主键
    
    主鍵只有一個並且沒有重復值並不為NULL
    
- Super Key超级钥匙
    
    ![image.png](Relational%20Database%20f25d35d817a4424aad0bd0b92af5f808/image%204.png)
    
- Alternate Key备用键
    - 主鍵以外的候選鍵都稱為備用鍵
    - 是輔助鍵
- Foreign Key外键
    
    ![image.png](Relational%20Database%20f25d35d817a4424aad0bd0b92af5f808/image%205.png)
    
- Composite Key复合键

## Reference:

[RDBMS Full Form - GeeksforGeeks](https://www.geeksforgeeks.org/rdbms-full-form/?ref=roadmap)

[Difference Between RDBMS and DBMS - GeeksforGeeks](https://www.geeksforgeeks.org/difference-between-rdbms-and-dbms/?ref=roadmap)

[RDBMS Architecture - GeeksforGeeks](https://www.geeksforgeeks.org/rdbms-architecture/?ref=roadmap)

[Types of Keys in Relational Model (Candidate, Super, Primary, Alternate and Foreign) - GeeksforGeeks](https://www.geeksforgeeks.org/types-of-keys-in-relational-model-candidate-super-primary-alternate-and-foreign/?ref=roadmap)

[Types of Keys in Relational Model (Candidate, Super, Primary, Alternate and Foreign) - GeeksforGeeks](https://www.geeksforgeeks.org/types-of-keys-in-relational-model-candidate-super-primary-alternate-and-foreign/?ref=roadmap)

[Mapping from ER Model to Relational Model - GeeksforGeeks](https://www.geeksforgeeks.org/mapping-from-er-model-to-relational-model/?ref=next_article)