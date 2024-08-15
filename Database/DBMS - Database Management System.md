# DBMS - Database Management System

# DBMS

A Database Management System (DBMS) is a *software system* that is designed to **manage** and **organize** data in a *structured manner(結構化的方式).* It allows users to ***create, modify,*** and ***query*** a database, as well as manage the *security* and *access* **controls** for that database.

DBMS provides an environment to ***store*** and ***retrieve*** the data in convenient and efficient manner.

## Principle

![image.png](DBMS%20-%20Database%20Management%20System%20de3803e91f1d496a9eb106e8850d1cd0/image.png)

### **Architecture 架構**

- 1-Tier Architecture
    
    the database is directly available to the user
    
    client, server, and Database are all present on the same machine
    
    ![image.png](DBMS%20-%20Database%20Management%20System%20de3803e91f1d496a9eb106e8850d1cd0/image%201.png)
    
    Adv：
    
    - simple: only need one machine to maintain
    - Cost-Effective
    - Easy to implement 易於部署
    
- 2-tier Architecture
    
    basic **client-server model**： The application at the client end directly communicates with the database on the server side. 
    
    *APIs like ODBC and JDBC are used for this interaction.*
    
    ![image.png](DBMS%20-%20Database%20Management%20System%20de3803e91f1d496a9eb106e8850d1cd0/image%202.png)
    
    Adv: 相對於 3-Tier Architecture
    
    - **Easy to Access:**
    - **Scalable:**  can scale the database easily, by adding clients or upgrading hardware
    - **Low Cost:**
    - **Easy Deployment:**
    - **Simple:**
    
    優點是易於維護和理解，並且與現有系統兼容， 但是當用戶數量較多時，該模型的性能較差
    
- [**3-Tier Architecture**](https://www.geeksforgeeks.org/introduction-of-3-tier-architecture-in-dbms-set-2/)
    
    there is another layer between the client and the server. The client does not directly communicate with the server.
    
    it interacts with an application server which further communicates with the database system and then the query processing and transaction management takes place. 該中間層充當服務器和客戶端之間交換部分處理的數據的媒介
    
    通常用於大型web應用程序
    
    ![image.png](DBMS%20-%20Database%20Management%20System%20de3803e91f1d496a9eb106e8850d1cd0/image%203.png)
    
    - First - Tier : Client-tier
    - Second - Tier: Application server -tier/middle-tier
    - Third -  Tier: Database-server-tier
    
    ![image.png](DBMS%20-%20Database%20Management%20System%20de3803e91f1d496a9eb106e8850d1cd0/image%204.png)
    
    Adv：
    
    - **Enhanced scalability:** Scalability is enhanced due to the distributed deployment of application servers. Now, individual connections need not be made between the client and server.由于应用服务器的分布式部署，增强了可扩展性。现在，客户端和服务器之间不需要建立单独的连接。
    - **Data Integrity:** 3-Tier Architecture maintains Data Integrity. Since there is a middle layer between the client and the server, data corruption can be avoided/removed. 3 层架构维护数据完整性。由于客户端和服务器之间存在中间层，因此可以避免/消除数据损坏。
    - **Security:** 3-Tier Architecture Improves Security. This type of model prevents direct interaction of the client with the server thereby reducing access to unauthorized data. 3 层架构提高安全性。这种类型的模型防止客户端与服务器的直接交互，从而减少对未经授权的数据的访问。
        
        客戶端無法直接訪問數據庫也消除了客戶端應用程序損壞信息的風險
        
    
    Disadv：
    
    - **More Complex:** 3-Tier Architecture is more complex in comparison to 2-Tier Architecture. Communication Points are also doubled in 3-Tier Architecture.与 2 层架构相比，3 层架构更复杂。三层架构中的通信点也加倍。
    - **Difficult to Interact:** It becomes difficult for this sort of interaction to take place due to the presence of middle layers.由于中间层的存在，这种交互变得很难发生。
    - 成本升高： 需要單獨的代理服務器，網絡流量會增加
    

### **Difference between File System and DBMS**

| Basics 基础知识 | File System 文件系统 | DBMS |
| --- | --- | --- |
| Structure 结构 | The file system is a way of arranging the files in a storage medium within a computer.文件系统是在计算机内的存储介质中排列文件的一种方式。 | DBMS is software for managing the database.DBMS是管理数据库的软件。 |
| Data Redundancy 数据冗余 | Redundant data can be present in a file system.文件系统中可以存在冗余数据。 | In DBMS there is no redundant data.DBMS 中没有冗余数据。 |
| Backup and Recovery 备份与恢复 | It doesn’t provide Inbuilt mechanism for backup and recovery of data if it is lost.它不提供内置的数据备份和恢复机制（如果数据丢失）。 | It provides in house tools for backup and recovery of data even if it is lost.它提供内部工具来备份和恢复数据，即使数据丢失也是如此。 |
| Query processing 查询处理 | There is no efficient query processing in the file system.文件系统中没有有效的查询处理。 | Efficient query processing is there in DBMS.DBMS 中有高效的查询处理。 |
| Consistency 一致性 | There is less data consistency in the file system.文件系统中的数据一致性较差。 | There is more data consistency because of the process of normalization.由于规范化过程，数据的一致性更高。 |
| Complexity 复杂 | It is less complex as compared to DBMS.与 DBMS 相比，它的复杂性较低。 | It has more complexity in handling as compared to the file system.与文件系统相比，它的处理更加复杂。 |
| Security Constraints 安全限制 | File systems provide less security in comparison to DBMS.与 DBMS 相比，文件系统提供的安全性较低。 | DBMS has more security mechanisms as compared to file systems.与文件系统相比，DBMS 具有更多的安全机制。 |
| Cost 成本 | It is less expensive than DBMS.它比 DBMS 便宜。 | It has a comparatively higher cost than a file system.它的成本比文件系统要高。 |
| Data Independence 数据独立性 | There is no data independence.不存在数据独立性。 | In DBMS data independence exists, mainly of two types:DBMS中存在数据独立性，主要有两种类型：1) Logical Data Independence.逻辑数据独立性。2)Physical Data Independence.物理数据独立性。 |
| User Access 用户访问 | Only one user can access data at a time.一次只有一个用户可以访问数据。 | Multiple users can access data at a time.多个用户可以同时访问数据。 |
| Meaning 意义 | The users are not required to write procedures.用户无需编写程序。 | The user has to write procedures for managing databases用户必须编写管理数据库的程序 |
| Sharing  分享 | Data is distributed in many files. So, it is not easy to share data.数据分布在许多文件中。因此，共享数据并不容易。 | Due to centralized nature data sharing is easy由于集中式的性质，数据共享很容易 |
| Data Abstraction 数据抽象 | It give details of storage and representation of data它给出了数据存储和表示的详细信息 | It hides the internal details of Database它隐藏了数据库的内部细节 |
| Integrity Constraints 完整性约束 | Integrity Constraints are difficult to implement完整性约束难以实施 | Integrity constraints are easy to implement完整性约束易于实现 |
| Attributes属性​ | To access data in a file , user requires attributes such as file name, file location.要访问文件中的数据，用户需要文件名、文件位置等属性。 | No such attributes are required.不需要这样的属性。 |
| Example 例子 | Cobol, C++  | Oracle, SQL Server  |

## Key Features:

### Data Modeling 數據建模:

provides tools for creating and modifying data models, which define the structure and relationships of the data in a database 創建和修改數據模型的工具  → 模型定義了數據庫的結構和關係

### Data Storage and Retrieval數據存儲和檢索：

responsible for storing and retrieving data from the database, and can provide various methods for searching and querying the data.

### **Concurrency control 並發控制：**

provides mechanisms(機制) for controlling *concurrent access(並發存取)* to the database, to ensure that multiple users can access the data without conflicting(矛盾) with each other.

### **Data integrity and security完整性和安全性：**

provides tools for enforcing data integrity and security constraints, such as constraints on the values of data and access controls that restrict who can access the data.  提供了强制执行数据完整性和安全性约束的工具

### **Backup and recovery：**

provides mechanisms for backing up and recovering the data in the event of a system failure.

## Type of DBMS：

| RDBMS | NoSQL DBMS | OODBMS |
| --- | --- | --- |
| Relational Database Management System | Non-Relational Database Management System | Object-Oriented Database Management System |
| Data is organized in the form of tables and each table has a set of rows and columns. The data are related to each other through primary and foreign keys. | Data is organized in the form of key-value pairs, documents, graphs, or column-based. These are designed to handle large-scale, high-performance scenarios. | stores data as objects, which can be manipulated using object-oriented programming languages. |
| SQL to manipulate the data |  |  |

## Database Language:

### Data Definition Language 數據定義語言（DDL）：

deals with database schemas and descriptions  →  how the data should reside in the database 數據在數據庫中的位置

- **CREATE:** to create a database and its objects like (table, index, views, store procedure, function, and triggers)创建数据库及其对象（表、索引、视图、存储过程、函数和触发器）
- **ALTER:** alters the structure of the existing database更改现有数据库的结构
- **DROP:** delete objects from the database从数据库中删除对象
- **TRUNCATE:** remove all records from a table, including all spaces allocated for the records are removed从表中删除所有记录，包括为记录分配的所有空间都被删除
- **COMMENT:** add comments to the data dictionary向数据字典添加注释
- **RENAME:** rename an object重命名对象

### Data Manipulation Language数据操作语言 (DML)

SQL is the most common DML

- **SELECT:** retrieve data from a database从数据库中检索数据
- **INSERT:** insert data into a table将数据插入表中
- **UPDATE:** updates existing data within a table更新表中的现有数据
- **DELETE:** Delete all records from a database table删除数据库表中的所有记录
- **MERGE:** UPSERT operation (insert or update)UPSERT 操作（插入或更新）
- **CALL:** call a PL/SQL or Java subprogram调用 PL/SQL 或 Java 子程序
- **EXPLAIN PLAN:** interpretation of the data access path数据访问路径的解释
- **LOCK TABLE:** concurrency Control并发控制

### Data Control Language 數據控制語言 (DCL)

as an access specifier to the database. 對用戶授權或者撤銷權限

- **GRANT:** grant permissions to the user for running DML(SELECT, INSERT, DELETE,…) commands on the table授予用户在表上运行 DML（SELECT、INSERT、DELETE...）命令的权限
- **REVOKE:** revoke permissions to the user for running DML(SELECT, INSERT, DELETE,…) command on the specified table撤销用户对指定表运行DML(SELECT、INSERT、DELETE、…)命令的权限

### Transactional Control Language事务控制语言 (TCL)

as an manager for all types of transactional data and all transactions. 充当所有类型事务数据和所有事务的管理器

### **Data Query Language (DQL):**

subset of DML 

⇒ SELECT statement

## Functions:

### **Data Definition**

helps in the creation, modification, and removal of definitions that define the organization of data in the database.  針對數據組織的定義進行 創建 修改和刪除

### **Data Updation**

### **Data Retrieval 檢索**

### **User Administration:**

**helps in registering and monitoring users, enforcing data security, monitoring performance, maintaining data integrity, dealing with concurrency control, and recovering information corrupted by unexpected failure.有助於註冊和監視用戶**

## **Advantages**

- **Data organization:** A DBMS allows for the organization and storage of data in a structured manner, making it easy to retrieve and query the data as needed.DBMS 允许以结构化方式组织和存储数据，从而可以轻松地根据需要检索和查询数据。
- **Data integrity:** A DBMS provides mechanisms for enforcing data integrity constraints, such as constraints on the values of data and access controls that restrict who can access the data.DBMS 提供了强制执行数据完整性约束的机制，例如对数据值的约束以及限制谁可以访问数据的访问控制。
- **Concurrent access:** A DBMS provides mechanisms for controlling concurrent access to the database, to ensure that multiple users can access the data without conflicting with each other. DBMS提供了控制对数据库并发访问的机制，以确保多个用户可以访问数据而不会互相冲突。
- **Data security:** A DBMS provides tools for managing the security of the data, such as controlling access to the data and encrypting sensitive data. DBMS 提供用于管理数据安全的工具，例如控制对数据的访问和加密敏感数据。
- **Backup and recovery:** A DBMS provides mechanisms for backing up and recovering the data in the event of a system failure.DBMS 提供在系统发生故障时备份和恢复数据的机制。
- **Data sharing:** A DBMS allows multiple users to access and share the same data, which can be useful in a collaborative work environment.DBMS 允许多个用户访问和共享相同的数据，这在协作工作环境中非常有用。

## **Disadvantages**

- **Complexity:** DBMS can be complex to set up and maintain, requiring specialized knowledge and skills.DBMS 的设置和维护可能很复杂，需要专门的知识和技能。
- **Performance overhead:** The use of a DBMS can add overhead to the performance of an application, especially in cases where high levels of concurrency are required.使用 DBMS 会增加应用程序的性能开销，特别是在需要高并发性的情况下。
- **Scalability:** The use of a DBMS can limit the scalability of an application, since it requires the use of locking and other synchronization mechanisms to ensure data consistency. DBMS 的使用会限制应用程序的可扩展性，因为它需要使用锁定和其他同步机制来确保数据一致性。
- **Cost:** The cost of purchasing, maintaining and upgrading a DBMS can be high, especially for large or complex systems.购买、维护和升级 DBMS 的成本可能很高，特别是对于大型或复杂的系统。
- **Limited Use Cases:** Not all use cases are suitable for a DBMS, some solutions don’t need high reliability, consistency or security and may be better served by other types of data storage.并非所有用例都适合 DBMS，某些解决方案不需要高可靠性、一致性或安全性，其他类型的数据存储可能会更好。

## Reference

[DBMS Archives - GeeksforGeeks](https://www.geeksforgeeks.org/category/dbms/)