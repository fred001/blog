# twisted

from twisted.internet import protocol, reactor
from twisted.protocols import basic

## reactor
twisted.internet.reactor
  大概相当于 app的概念，处理最外层的主循环


## Protocol
  twisted.internet.protocol.Factory
  twisted.internet.protocol
  makeConnection
  connectionMade
  dataReceived
  connectionLost

  协议需要通过协议工厂来创造，大概协议仅仅处理本身
  协议工厂应用协议

## transport
  传输是真正用来传输时候用到的

  write
  writeSequence
  loseConnection
  getPeer
  getHost





## deferreds 异步帮助
  跟我之前在js中设想的callback 队列一样
  一连串的回调，若成功则一个接一个执行，若失败则找到对应的失败回调执行

## 其他
  其他很丰富，包括现成的http 协议

    




##  模拟HTTP请求需要使用 Agent
     from twisted.web.client import Agent

     agent = Agent(reactor)

     GET:
       d = agent.request('GET', "http://127.0.0.1/index.php?name=aaa")

     POST:
       post比较麻烦点，需要创建bodProductor,需要设置 headers的content-type, 否则php不会自动解析成数组
       示例代码没有设置header,大概 $_POST 是php内部处理的？其他web语言不会自动创建这种？

       d = agent.request('POST', "http://127.0.0.1/index.php",headers=... , bodyProductor=...)

    


