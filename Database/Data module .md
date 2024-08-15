# Data module

# **Data Models**

the concept of tools that are developed to summarize the description of the database为总结数据库描述而开发的工具的概念

数据模型为我们提供了透明的数据图片，帮助我们创建实际的数据库。它向我们展示了从数据的设计到数据的正确实现。

> 數據庫的類型是因為數據模型的不同
> 

## Type of Relational Models

1. Conceptual Data Model 概念数据模型
2. Representational Data Model 代表性数据模型
3. Physical Data Model 物理数据模型

![image.png](Data%20module%201539347d19904737a670f6edfde50d42/image.png)

### **Conceptual Data Model**

used in the requirement-gathering process. before the Database Designers start making a particular database. One such popular model is the [**entity/relationship model (ER model)**](https://www.geeksforgeeks.org/introduction-of-er-model/).

**Entity-Relationship Model:**

a high-level data model which is used to define the data and the relationships between them

1. [**Entity:**](https://www.geeksforgeeks.org/difference-between-entity-entity-set-and-entity-type/) An entity is referred to as a real-world object. It can be a name, place, object, class, etc. These are represented by a rectangle in an ER Diagram.实体被称为现实世界的对象。它可以是名称、地点、对象、类等。这些在 ER 图中用矩形表示。
2. [**Attributes:](https://www.geeksforgeeks.org/types-of-attributes-in-er-model/)** An attribute can be defined as the description of the entity. These are represented by Ellipse in an ER Diagram. It can be Age, Roll Number, or Marks for a Student.属性可以定义为实体的描述。这些在 ER 图中用椭圆表示。它可以是学生的年龄、学号或分数。
3. [**Relationship:](https://www.geeksforgeeks.org/relationships-in-er-model/)** Relationships are used to define relations among different entities. Diamonds and Rhombus are used to show Relationships.关系用于定义不同实体之间的关系。菱形和菱形用于表示关系。

![image.png](Data%20module%201539347d19904737a670f6edfde50d42/image%201.png)

![image.png](Data%20module%201539347d19904737a670f6edfde50d42/image%202.png)

![image.png](Data%20module%201539347d19904737a670f6edfde50d42/image%203.png)

### Representational Data Model

This type of data model is used to represent only the **logical** part of the database and does not represent the physical structure of the database

Relational model is popular representational model

The relational Model consists of [**Relational Algebra**](https://www.geeksforgeeks.org/introduction-of-relational-algebra-in-dbms/) and [**Relational Calculus**](https://www.geeksforgeeks.org/tuple-relational-calculus-trc-in-dbms/).

### **Physical Data Model 物理數據模型**

The physical Data Model is used to practically implement Relational Data Model.

[**Structured Query Language (SQL)**](https://www.geeksforgeeks.org/structured-query-language/) is used to practically implement Relational Algebra.

该数据模型描述了**如何**使用特定的 DBMS 系统来实现系统。该模型通常由 DBA 和开发人员创建。目的是数据库的实际实现。

## Con

- Data modeling is the process of developing data model for the data to be stored in a Database.数据建模是为要存储在数据库中的数据开发数据模型的过程。
- Data Models ensure consistency in naming conventions, default values, semantics, security while ensuring quality of the data.数据模型确保命名约定、默认值、语义、安全性的一致性，同时确保数据的质量。
- Data Model structure helps to define the relational tables, primary and foreign keys and stored procedures.数据模型结构有助于定义关系表、主键和外键以及存储过程。
- There are three types of conceptual, logical, and physical.可分为概念型、逻辑型和物理型三种。
- The main aim of conceptual model is to establish the entities, their attributes, and their relationships.概念模型的主要目的是建立实体、实体的属性及其关系。
- Logical data model defines the structure of the data elements and set the relationships between them.逻辑数据模型定义数据元素的结构并设置它们之间的关系。
- A Physical Data Model describes the database specific implementation of the data model.