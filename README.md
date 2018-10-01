<h1 align="center">Light Tips</h1>

<p align="center">
<a href="https://github.com/xx19941215/webBlog"><img src="https://img.shields.io/github/forks/xx19941215/webBlog.svg"></a>
<a href="https://github.com/xx19941215/webBlog"><img src="https://img.shields.io/github/stars/xx19941215/webBlog.svg"></a>
<a href="https://github.com/xx19941215/webBlog"><img src="https://img.shields.io/badge/php-7.0%2B-blue.svg""></a>
<a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/cocoapods/l/AFNetworking.svg" alt="License"></a>
</p>

> 记录Web开发所需要的一些基础知识，主要是PHP、MySQL、Javascript相关内容，还有一些基础的算法和数据结构。

> 收藏请点star，如发现有错误欢迎PR

### 数据结构和算法

#### 算法
- 排序
  - 简单排序
    1. [冒泡排序](algorithm/sort/bubbleSort/bubbleSort.php)
    2. [插入排序](algorithm/sort/insertionSort/insertionSort.php)
  - [希尔排序(插入排序的改进)](algorithm/sort/shellSort/shellSort.php)
  - [选择排序](algorithm/sort/selectionSort/selectionSort.php)
  - [堆排序(选择排序的改进)](algorithm/sort/heapSort/heapSort.php)
  - [归并排序](algorithm/sort/mergeSort/mergeSort.php)
  - [桶排序](algorithm/sort/bucketSort/bucketSort.php)
  - [基数排序](algorithm/sort/radixSort/radixSort.php)
  - [快速排序](algorithm/sort/quickSort/quickSort.php)

- 搜索/查找
  - [线性搜索](algorithm/search/linearSearch.php)
  - 二分搜索
    - [迭代版](algorithm/search/binarySearch.php)
    - [递归版](algorithm/search/binarySearchRecursion.php)
  - [插值搜索](algorithm/search/interpolationSearch.php)
  - [指数搜索](algorithm/search/exponentialSearch.php)
  - 树表查找

|算法|最快时间复杂度|平均时间复杂度|最坏时间复杂度|空间复杂度|是否稳定
|--|--|--|--|--|--|
|冒泡排序|Ω(n)|Θ(n2)|O(n2)|O(1)|稳定
|插入排序|Ω(n)|Θ(n2)|O(n2)|O(1)|稳定
|希尔排序|Ω(nlogn)|Θ(n(log(n))2)|O(n(log(n))2)|O(1)|不稳定
|选择排序|Ω(n2)|Θ(n2)|O(n2)|O(1)|不稳定
|堆排序|Ω(nlogn)|Θ(nlogn)|O(nlogn)|O(1)|不稳定
|归并排序|Ω(nlogn)|Θ(nlogn)|O(nlogn)|O(n)|稳定
|快速排序|Ω(nlogn)|Θ(nlogn)|O(nlogn)|O(logn)|不稳定
|基数排序|Ω(n+b)|Θ(n+b)|O(n+b)|O(n+k)|稳定

> O表示上界(小于等于)Ω表示下界(大于等于)Θ表示即是上界也是下界(等于)


#### 数据结构

1. [链表](dataStructure/LinkedList/LinkedList.php)
   - [双链表](dataStructure/DoubleLinkedList/DoubleLinkedList.php)
   - [环形链表](dataStructure/CircularLinkedList/CircularLinkedList.php)
2. [栈](dataStructure/Stack/StackInterface.php)
   - [链表实现](dataStructure/Stack/LinkedListStack.php)
   - [数组实现](dataStructure/Stack/ArrStack.php)
3. [队列](dataStructure/Queue/QueueInterface.php)
   - [链表实现](dataStructure/Queue/LinkedListQueue.php)
   - [数组实现](dataStructure/Queue/ArrQueue.php)
   - [优先队列](dataStructure/Queue/LinkedListPriorityQueue.php)
   - [环形队列](dataStructure/Queue/CircularQueue.php)
   - [双端队列](dataStructure/Queue/LinkedListDeQueue.php)   
4. [树](dataStructure/Tree/Tree.php)
   - [二叉树](dataStructure/Tree/BinaryTree.php)
   - [二叉搜索树](dataStructure/Tree/BST.php)

5. [最大堆](dataStructure/Heap/MaxHeap.php)
   - [最小堆](dataStructure/Heap/MinHeap.php)

6. 图

   
#### 《剑指Offer》

> 先用PHP解答一遍，稍后Javascript版本的奉上

- 链表
  - [从头到尾打印链表](offer/LinkedList/1.php)
  - [链表中倒数第k个节点](offer/LinkedList/2.php)
  - [反转链表](offer/LinkedList/3.php)
  - [合并两个排序的链表](offer/LinkedList/4.php)
  - [复杂链表的复制](offer/LinkedList/5.php)
  - [删除链表中重复的节点](offer/LinkedList/6.php)
  - [两个链表的第一个公共节点](offer/LinkedList/7.php)
  - [链表中环的入口节点](offer/LinkedList/8.php)
  
- 栈和队列 
  - [用两个栈来实现一个队列](offer/Stack&Queue/2.php)
  - [栈的压入、弹出序列](offer/Stack&Queue/1.php)

- 树
  - [重建二叉树](offer/Tree/1.php)
  - [树的子结构](offer/Tree/2.php)
  - [树的镜像](offer/Tree/3.php)
  - [从上往下打印二叉树](offer/Tree/4.php)
  - [二叉搜索树的后序序列](offer/Tree/5.php)
  - [二叉树中和为某一值的路径](offer/Tree/6.php)
  - [二叉搜索树与双向链表](offer/Tree/7.php)
  - [二叉树的深度](offer/Tree/8.php)
  - [平衡二叉树](offer/Tree/9.php)
  - [二叉树的下一个结点](offer/Tree/10.php)
  - [对称的二叉树](offer/Tree/11.php)
  - [按之字形顺序打印二叉树](offer/Tree/12.php)
  - [把二叉树打印成多行](offer/Tree/13.php)
  - [序列化二叉树](offer/Tree/14.php)
  - [二叉搜索树的第k个结点](offer/Tree/15.php)


### PHP

#### 新特性
1. [PHP新特性之命名空间、性状和生成器](https://github.com/xx19941215/webBlog/issues/1)
2. [PHP新特性之闭包、匿名函数](https://github.com/xx19941215/webBlog/issues/2)
3. [PHP新特性之字节码缓存和内置服务器](https://github.com/xx19941215/webBlog/issues/3)

#### 最佳实践

1. [PHP最佳实践系列之标准](https://github.com/xx19941215/webBlog/issues/4)
2. [PHP最佳实践之过滤、验证、转义和密码](https://github.com/xx19941215/webBlog/issues/5)
3. [PHP最佳实践之日期、时间和时区](https://github.com/xx19941215/webBlog/issues/6)
4. [PHP最佳实践之数据库](https://github.com/xx19941215/webBlog/issues/7)
5. [PHP最佳实践之多字节字符串、字符编码](https://github.com/xx19941215/webBlog/issues/8)
6. [PHP最佳实践之异常和错误](https://github.com/xx19941215/webBlog/issues/11)
7. [PHP最佳实践之上线准备](https://github.com/xx19941215/webBlog/issues/12)


### Javascript
1. [Javascript引擎内部的三种抽象操作](https://github.com/xx19941215/webBlog/issues/9)
2. [彻底弄懂Javascript闭包](https://github.com/xx19941215/webBlog/issues/10)

### MYSQL
1. [MySQL索引相关问题总结](https://github.com/xx19941215/webBlog/issues/13)
