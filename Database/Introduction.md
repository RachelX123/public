# Introduction介绍

# Introduction

A Database is an organized collection of data store （also called structured data 結構化數據 ） in a computer system and usually controlled by a database management system(DBMS)數據庫是存儲在計算機係統中的有組織的數據集 通常由數據庫管理系統控制

> DBMS (Database management system) It provides an interface between the database and the users or applications, allowing them to access and manage data efficiently.
> 
> 
> 適用於管理數據的軟件
> 
> ![image.png](Introduction%E4%BB%8B%E7%BB%8D%20dfd7310944464611945858473937828a/image.png)
> 
> Function：
> 
> 1. Data Definition:Defining the database structure(數據結構), including specifying data types, relationships between data elements, and constraints. 
> 2. **Data Manipulation操作:** Inserting, updating, deleting, and retrieving data from the database using queries and commands. 
> 3. **Data Security:** Enforcing access control to ensure that only authorized users can access and modify the data. 實施控制訪問控制， 確保只有授權用戶才能訪問和修改數據
> 4. **Data Integrity:** Maintaining the accuracy, consistency, and reliability of the data through validation rules and constraints.  通过验证规则和约束来保持数据的准确性、一致性和可靠性。
> 5. **Concurrency Control 並發控制:** Managing simultaneous access to the database by multiple users or applications to prevent conflicts 避免衝突and ensure data consistency一致性.
> 6. **Backup and Recovery:** Providing mechanisms for backing up data and recovering it in case of system failures or data corruption.

常見的數據庫：

| 關係型資料庫(SQL) | 非關係型資料庫(noSQL) | 內存數據庫(In-Memory) |
| --- | --- | --- |
| 使用表格來存儲數據，並通過關係來管理不同表之間的關聯 | 存儲非結構化或半結構化的數據 例如文檔 鍵值對 圖形數據等 | 将数据存储在内存中以实现极快的读写速度，通常用于缓存或高性能应用 |
| mySQL | MogoDB | Memcached |
| Oracle | Redis | Redis |
| PostgreSQL | DynamoDB |  |
| SQL Server | Elaticsearch |  |
| 關係型數據庫系統（RDBMS） | 非關係型數據庫系統（NRDBMS） |  |

關係型數據庫中表之間可以通過特定的列(通常是主鍵和外鍵)建立關係。 

## 數據庫分類

Differences in Storage Methods 存儲方式的差異

### 關係數據庫(Relational Database)：

![Untitled](Introduction%E4%BB%8B%E7%BB%8D%20dfd7310944464611945858473937828a/Untitled.png)

A relational database is made up of a set of tables（rows and columns） with data that fits into a *predefined category*.指定了所有數據輸入必須使用的格式化方式(表格形式)

After designing the conceptual model of the Database using [**ER diagram**](https://www.geeksforgeeks.org/introduction-of-er-model/), we need to convert the conceptual model into a relational model which can be implemented using any [**RDBMS**](https://www.geeksforgeeks.org/difference-between-rdbms-and-dbms/) language在使用 [**ER 图**](https://www.geeksforgeeks.org/introduction-of-er-model/)设计数据库的概念模型后，我们需要将概念模型转换为关系模型，可以使用任何 [**RDBMS**](https://www.geeksforgeeks.org/difference-between-rdbms-and-dbms/) 语言来实现

SQL ⇒ Structure Query Language for defining and manipulating data.

- [**MySQL**](https://www.geeksforgeeks.org/mysql-tutorial/)
- [**PostgreSQL**](https://www.geeksforgeeks.org/postgresql-tutorial/)
- **Oracle ([PL/SQL](https://www.geeksforgeeks.org/pl-sql-tutorial/), programming language extension for Oracle Database)**
- **SQL Server**
- [**SQLite**](https://www.geeksforgeeks.org/introduction-to-sqlite/)
- **MariaDB**
- **IBM Db2**

### 分佈式數據庫(**Distributed Database**)：

A [**distributed database**](https://www.geeksforgeeks.org/distributed-database-system/) is a database in which **portions of the database are stored in multiple physical locations(儲存在多個物理位置)**, and in which **processing is dispersed or replicated among different points in a network(處理是在網絡中的不同點之間分散或複製)**. 

### 雲數據庫(Cloud Database):

A cloud database is a database that typically runs on a cloud computing platform. Database service provides access to the database. Database services make the underlying software stack transparent to the user. 數據庫服務使底層軟件堆棧對用戶透明   A collection of organized or unorganized data that is housed on a private, public, or hybrid cloud computing platform is known as a cloud database. Cloud database models come in two flavors: traditional and [**database as a service (DBaaS)**](https://www.geeksforgeeks.org/overview-of-database-as-a-service/).    云环境中存储和管理数据的在线数据库

- **Amazon RDS (Relational Database Service)**
- **Amazon Aurora**
- **Azure SQL Database**
- **Google Cloud SQL**
- **Microsoft Azure SQL Database**
- **IBM Db2 on Cloud**
- **Amazon DynamoDB**
- **Azure Cosmos DB**
- **Cloud Firestore(Google Cloud Firebase)**

### 面相對象的數據庫(**Object-Oriented Databases**):

數據表示為對象

![image.png](Introduction%E4%BB%8B%E7%BB%8D%20dfd7310944464611945858473937828a/image%201.png)

- Berkeley DB software library(使用相同的概念來快速高效地響應來自嵌入式數據庫的數據庫查詢)

### 數據倉庫(**Data Warehouses**):

專門為快速查詢和分析而創建的數據庫  —— 數據的中央存儲庫

### 非關係型數據庫(NoSQL Database):

未指定格式化方式， 是存儲和操作非結構化或半結構化數據或結構化數據

提供數據存儲和*檢索機制*的數據庫

在線應用程序的普及性和複雜性導致了NoSQL數據庫的普及

[**NoSQL**](https://www.geeksforgeeks.org/introduction-to-nosql/) provide flexible schema designs and often offer [**horizontal scalability**](https://www.geeksforgeeks.org/horizontal-and-vertical-scaling-in-databases/).

![image.png](Introduction%E4%BB%8B%E7%BB%8D%20dfd7310944464611945858473937828a/image%202.png)

- **文档数据库(Document databases):** Store data in flexible, JSON-like documents.将数据存储在灵活的类似 JSON 的文档中。
    - [**MongoDB**](https://www.geeksforgeeks.org/mongodb-tutorial/)
    - **Couchbase**
- **键值存储(Key-value stores):** Simplest NoSQL databases, storing data as key-value pairs.最简单的 NoSQL 数据库，将数据存储为键值对。
    - **Redis**
    - **Amazon** **DynamoDB**.
- **列系列存储(Column-family stores):** Store data in columns rather than rows.将数据存储在列而不是行中。
    - **Apache Cassandra**
    - **HBase**.
- **图形数据库(Graph databases):** Optimize for data with complex relationships.针对具有复杂关系的数据进行优化。 Data is stored in a graph database using entities and their relationships.使用實體及數據存儲在圖形數據庫中
    - **Neo4j**
    - **Amazon Neptune**.

### OLTP 數據庫：

An [**OLTP database](https://www.geeksforgeeks.org/on-line-transaction-processing-oltp-system-in-dbms/)** is a quick, analytical database made to handle lots of transactions from several users at once.

### 内存数据库**In-Memory Databases：**

**store data** primarily in **RAM** rather than on disk  加快了访问速度

- **Redis**
- **Memcached**

### **分层数据库Hierarchical Databases：**

Hierarchical databases organize data in a **tree-like structure** where each record has one parent record and multiple child records, forming a hierarchy. Records are linked together in **parent-child relationships**, with each child record having only one parent.  遵循等級或級別分類的數據

![image.png](Introduction%E4%BB%8B%E7%BB%8D%20dfd7310944464611945858473937828a/image%203.png)

- **IMS (Information Management System)**

> not easily salable:  the addition of data elements requires a lengthy traversal through the database 添加數據元素需要在數據庫中進行長時間的遍歷
> 

### [**Centralized Database 集中式数据库](https://www.geeksforgeeks.org/comparison-centralized-decentralized-and-distributed-systems/)：**

A centralized database is basically a type of database that is **stored**, **located** as well as **maintained** at a **single location** and it is *more secure* when the user wants to fetch the data from the Centralized Database.  在單一位置進行：存儲 定位 和 維護

Advantages 

- Data Security
- Reduced Redundancy
- Consistency

Disadvantages 

- The size of the centralized database is large which increases the response and retrieval time.集中式数据库的规模很大，增加了响应和检索时间。
- It is not easy to modify, delete and update.修改、删除和更新并不容易。

## **Databases Cheat Sheet**

Cheat sheets are concise, quick-reference guides that provide key information about a particular topic. These are the cheat sheet of Different Databases.

## Reference

[Getting started with Databases : Essential Guide for Beginners - GeeksforGeeks](https://www.geeksforgeeks.org/getting-started-with-database-management-system/?ref=shm#what-are-data-databases)