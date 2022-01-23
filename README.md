该项目是laravel、lumen的删减版，由于Laravel、Lumen框架太重, 本人感觉很臃肿，但是有些思想却是颠覆了以往一些框架的设计，使用起来特别方便。

本项目主要使用laravel组件，进行项目重组，删除非必须的组件，形成一个轻量级框架，大部分使用方式跟Laravel一样，上手切换快。

本项目引入Laravel的如下基础功能
- 容器,支持构造函数注入依赖，减少了代码中大量new实例
- 事件(Event/Listener)
- 服务提供者
- 门面   推荐只使用DB、Log、Redis、Storage门面，由于砍掉了一些非必要功能，所以不是所有门面可用，比如Queue、Hash、Auth等
- env配置
- 中间件
- Eloquent ORM
- REQUEST请求
- Response返回
- 命令行,引入了Laravel中的一些比较实用的命令行，并且支持自定义命令行Console
- 引入phpstan、phpcs等静态代码分析工具，便于代码整理

不包含其他辅助性功能，如果需要，需要使用者自己引入，或者实现，项目目标是最少集成，实现轻量级开发
