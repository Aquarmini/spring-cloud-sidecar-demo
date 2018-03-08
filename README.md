# SpringCloud Sidecar 测试

配置Sidecar
~~~
server.port=5678
sidecar.port=8887
sidecar.health-uri=http://sidecar.phalcon.xin:8887/health.json
~~~

启动Eureka
启动Sidecar
启动配置中心
查看Eureka sidecar服务
~~~
$ curl http://localhost:5678/hosts/bootstrap   
[{"host":"limxMacBook-Pro.local","port":8887,"serviceId":"BOOTSTRAP","uri":"http://limxMacBook-Pro.local:8887","secure":false}]%
$ curl http://limxMacBook-Pro.local:8887/
就可以看到调用结果
~~~

同样查看配置中心服务
~~~
$ curl http://localhost:5678/hosts/configserver
[{"host":"limxMacBook-Pro.local","port":8888,"serviceId":"CONFIGSERVER","uri":"http://limxMacBook-Pro.local:8888","secure":false}]%
~~~