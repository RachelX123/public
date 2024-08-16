# NoSQL 非關係型數據庫

# NoSQL

它们设计用来处理大量的非结构化或半结构化数据，具有更高的灵活性和可扩展性。

它不以表格形式存儲數據

在處理大量數據和高負載係數時提供可拓展性。與關係數據庫假設數據將保留在一台機器上，非關係數據庫是在數據預計跨多台機器分區以進行拓展時設計的。

數據庫的選擇很大程度上取決於數據的性質和應用程序的需求。

> 关系数据库在数据完整性和复杂查询至关重要的结构化数据环境中表现出色
> 
> 
> 非关系数据库在需要可扩展性、数据模型灵活性以及跨分布式系统高性能的场景中表现出色。
> 

![image.png](NoSQL%20%E9%9D%9E%E9%97%9C%E4%BF%82%E5%9E%8B%E6%95%B8%E6%93%9A%E5%BA%AB%20d48f5e846c2a4695acad13660449a918/image.png)

## 文檔數據庫 Document Database

文档数据库将数据存储为文档，通常使用类似JSON、BSON或XML的格式。每个文档可以包含多个键值对，文档之间的结构可以不同，这使得文档数据库非常灵活

## 键值数据库 (Key-Value Store)

## 列族数据库 (Column-Family Store)

## 图数据库 (Graph Database)

## 时间序列数据库 (Time-Series Database)

## 对象数据库 (Object Database)

## 優缺點：

- **Scalability可扩展性**：能够轻松扩展，适合处理大规模数据和高并发。offering seamless **scalability** as data volumes and user loads increase.随着数据量和用户负载的增加提供无缝的**可扩展性**
- **Flexibility 灵活性**：支持非结构化和半结构化数据，灵活应对多种数据格式。
- **High-Performance高性能**：在特定的应用场景下，NoSQL数据库的读写性能通常高于关系型数据库optimized for specific use cases such as real-time data ingestion, high-speed [**transactions**](https://www.geeksforgeeks.org/transaction-in-dbms/), and rapid access to large volumes of data. They often outperform relational databases in these scenarios due to their distributed architecture and optimized data storage formats.针对特定用例进行了优化，例如实时数据摄取、高速[**事务**](https://www.geeksforgeeks.org/transaction-in-dbms/)和快速访问大量数据。由于其分布式架构和优化的数据存储格式，它们在这些场景中通常优于关系数据库
- **Schemaless Design 缺乏标准化**：不同的NoSQL数据库有不同的查询语言和操作方法，学习成本较高。allowing developers to evolve the data structure over time without downtime or complex migrations. This advantage is particularly beneficial in agile development environments and for handling diverse and **unpredictable** data types 隨著時間的推移不斷發展數據結構，而無需停機或複雜的遷移。 在敏感開發環境以及處理多樣化且不可測的數據類型時特別有益
- **Eventual Consistency 一致性问题**：许多NoSQL数据库选择在一致性与可用性之间进行权衡，可能会在某些场景下带来一致性问题。  Emphasizes availability and partition tolerance over strict immediate consistency across distributed nodes. 可用性和分區容錯性， 而不是分佈式節點之間嚴格的即時一致
- **功能有限**：相比关系型数据库，某些NoSQL数据库在复杂查询和事务处理方面可能功能不足。

## **Non-Relational Database Management Systems**

1. [**MongoDB**](https://www.geeksforgeeks.org/mongodb-an-introduction/)
2. [**Apache Cassandra**](https://www.geeksforgeeks.org/apache-cassandra-nosql-database/) 
3. [**Redis**](https://www.geeksforgeeks.org/introduction-to-redis-server/) 
4. [**Couchbase**](https://www.geeksforgeeks.org/difference-between-couchbase-and-mysql/) 
5. [**Apache HBase**](https://www.geeksforgeeks.org/apache-hbase/) 
6. [**Neo4j**](https://www.geeksforgeeks.org/difference-between-neo4j-and-couchdb/) 
7. Riak
8. [**Aerospike**](https://www.geeksforgeeks.org/difference-between-aerospike-and-altibase/)
9. OrientDB
10. ArangoDB

## Relational vs Non-Relational Database

| Feature 特征 | Relational Database 关系数据库 | Non-Relational Database 非关系型数据库 |
| --- | --- | --- |
| Data Structure 数据结构 | Tables with rows and columns具有行和列的表格 | Various formats (document, key-value, columnar, graph)多种格式（文档、键值、柱状、图表） |
| Schema 模式 | Structured schema enforced by schemas由模式强制执行的结构化模式 | Flexible schema, often schema-less or dynamic灵活的模式，通常是无模式或动态的 |
| Query Language 查询语言 | SQL (Structured Query Language)SQL（结构化查询语言） | Query languages specific to the database type (e.g., JSON query languages, graph traversal languages)特定于数据库类型的查询语言（例如，JSON 查询语言、图遍历语言） |
| ACID Compliance 酸性合规性 | ACID transactions 酸性事务 | May vary; some offer ACID compliance, others eventual consistency可能有所不同；有些提供 ACID 合规性，有些提供最终一致性 |
| Scalability 可扩展性 | Vertical and horizontal scaling options垂直和水平缩放选项 | Horizontal scaling typically easier and more flexible水平扩展通常更容易、更灵活 |
| Flexibility 灵活性 | Less flexible with rigid schema definitions僵化的模式定义不太灵活 | Highly flexible due to schema-less or dynamic schema由于无模式或动态模式而高度灵活 |
| Performance 表现 | Excellent for complex queries and joins非常适合复杂的查询和连接 | Optimal for hierarchical data storage and retrieval最适合分层数据存储和检索 |
| Examples 示例 | MySQL, PostgreSQL, SQL ServerMySQL、PostgreSQL、SQL Server | MongoDB, Cassandra, Redis, DynamoDBMongoDB、卡桑德拉、Redis、DynamoDB |

## Reference
[GeeksforGeeks](https://www.geeksforgeeks.org/non-relational-databases-and-their-types/?ref=roadmap)
[IBM NoSQL](https://www.ibm.com/topics/nosql-databases)
[https://www.youtube.com/watch?v=Q5aTUc7c4jg](https://www.youtube.com/watch?v=Q5aTUc7c4jg)