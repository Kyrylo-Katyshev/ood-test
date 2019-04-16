### Exists classes and an interface:
```php
class Server
{
    const PROTOCOL_V1 = 'v1';
    const PROTOCOL_V2 = 'v2';
    const PROTOCOL_V3 = 'v3';
    const PROTOCOL_V4 = 'v4';

    private $url;

    private $protocol;

    public function getUrl(){
        return $this->url;
    }

    public function getProtocol(){
        return $this->protocol;
    }
}
```

```php
class Message
{
    public $author;

    public $subject;

    public $text;
}
```

```php
interface MessageSender {

    public function send(Message $message, array $servers);
}
```

####Supported Protocol Formats:
#####V1:
```json
{
  'name': '@author',
  'value'': '@subject'
}
```

#####V2:
```json
{
  'author': '@author',
  'subject'': '@subject',
  'text': '@text'
}
```

#####V3:
```xml
<message>
    <title>@subject</title>     
    <body>@text</body>
</message>
```

###Task: Need to implement a class of MessageSender interface.