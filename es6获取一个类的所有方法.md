```javascript

 class say {
    constructor() {
    }

    sayHello() {
        console.log('hello');
    }

    get sayGoodbye() {
        console.log('goodbye');
    }

    static wocao() {
        console.log('wocao');
    }
}

Object.getOwnPropertyNames(say) // ["length", "name", "prototype", "wocao"] 获取静态的wocao

var x = new say
Object.getOwnPropertyNames(Object.getPrototypeOf(x)) // ["constructor", "sayHello", "sayGoodbye"]

```
